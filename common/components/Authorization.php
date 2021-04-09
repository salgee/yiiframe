<?php

namespace common\components;

/**
 * Class Authorization
 * @package common\components
 * @author YiiFrame <21931118@qq.com>
 */
class Authorization
{
    public function getTopDomainhuo(){
        $url   = $_SERVER['HTTP_HOST'];
        $data = explode('.', $url);
        $co_ta = count($data);
        //判断是否是双后缀
        $zi_tow = true;
        $host_cn = 'com.cn,net.cn,org.cn,gov.cn';
        $host_cn = explode(',', $host_cn);
        foreach($host_cn as $host){
            if(strpos($url,$host)){
                $zi_tow = false;
            }
        }
        //如果是返回FALSE ，如果不是返回true
        if($zi_tow == true){
            $host = $data[$co_ta-2].'.'.$data[$co_ta-1];
        }else{
            $host = $data[$co_ta-3].'.'.$data[$co_ta-2].'.'.$data[$co_ta-1];
        }
        return $host;

    }

    public function authorization(){
        $domain= $this->getTopDomainhuo();
        $real_domain='baidu.com'; //本地检查时 用户的授权域名 和时间
        $http_type = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
        $check_host = ''.$http_type.'weiqing.tuangou.today/api/';
        $client = '&client='.base64_encode(str_replace(" ","+",'unioa'));//这里改为你的产品名称
        $client_check = $check_host . '?a=client_check&u=' . trim($_SERVER['HTTP_HOST']).$client;
        $check_message = $check_host . '?a=check_message&u=' . trim($_SERVER['HTTP_HOST']).$client;
        $check_info=file_get_contents($client_check);
        $message = file_get_contents($check_message);

        $ben_string = trim(getTopDomainhuo()).$real_domain;
        $shaben = sha1($ben_string);
        $robotstrben =  substr(md5($shaben), 0, 8);

        if($check_info==$robotstrben){
            $get_string = trim(getTopDomainhuo()).$real_domain;
        }else{
            $get_string = trim($_SERVER['HTTP_HOST']).$real_domain;
        }
        $sha = sha1($get_string);
        $robotstr =  substr(md5($sha), 0, 8);


        if($check_info=='1'){
            header("Content-Type: text/html;charset=utf-8");
            echo '<link href="'.$check_host.'css/sq.css" rel="stylesheet" type="text/css" />';
            echo '<div class="wrapper">';
            echo '<div class="main">';
            echo '<div class="title">授权信息</div>';
            echo '<div class="content">';
            echo '<p><font color=red>您的特征码：' . $robotstr . '</font></p>';
            echo '<p><font color=red>' . $message . '</font></p>';
            echo '</div>';
            echo '<div class="footer">维博网络授权系统';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            die;
        }elseif($check_info=='2'){
            header("Content-Type: text/html;charset=utf-8");
            echo '<link href="'.$check_host.'css/sq.css" rel="stylesheet" type="text/css" />';
            echo '<div class="wrapper">';
            echo '<div class="main">';
            echo '<div class="title">授权状态</div>';
            echo '<div class="content">';
            echo '<p><font color=red>' . $message . '</font></p>';
            echo '</div>';
            echo '<div class="footer">维博网络授权系统';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            die;
        }elseif($check_info=='3'){
            header("Content-Type: text/html;charset=utf-8");
            echo '<link href="'.$check_host.'css/sq.css" rel="stylesheet" type="text/css" />';
            echo '<div class="wrapper">';
            echo '<div class="main">';
            echo '<div class="title">授权状态</div>';
            echo '<div class="content">';
            echo '<p><font color=red>' . $message . '</font></p>';
            echo '</div>';
            echo '<div class="footer">维博网络授权系统';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            die;
        }elseif($check_info=='4'){
            header("Content-Type: text/html;charset=utf-8");
            echo '<link href="'.$check_host.'css/sq.css" rel="stylesheet" type="text/css" />';
            echo '<div class="wrapper">';
            echo '<div class="main">';
            echo '<div class="title">授权状态</div>';
            echo '<div class="content">';
            echo '<p><font color=red>' . $message . '</font></p>';
            echo '</div>';
            echo '<div class="footer">维博网络授权系统';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            die;
        }elseif($check_info=='5'){
            header("Content-Type: text/html;charset=utf-8");
            echo '<link href="'.$check_host.'css/sq.css" rel="stylesheet" type="text/css" />';
            echo '<div class="wrapper">';
            echo '<div class="main">';
            echo '<div class="title">授权状态</div>';
            echo '<div class="content">';
            echo '<p><font color=red>' . $message . '</font></p>';
            echo '</div>';
            echo '<div class="footer">维博网络授权系统';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            die;
        }
        $result = $check_info;
        if(empty($result)){
            $result_info = '0';
        }
        elseif(!empty($result)){
            $result_info = $check_info;
        }

        if($robotstr!==$result_info){ // 远程检查失败的时候 本地检查
            if($domain!==$real_domain){
                header("Content-Type: text/html;charset=utf-8");
                echo '<link href="'.$check_host.'css/sq.css" rel="stylesheet" type="text/css" />';
                echo '<div class="wrapper">';
                echo '<div class="main">';
                echo '<div class="content">';
                echo '<p><font color=red>远程检查失败了。请联系授权提供商。</font></p>';
                echo '</div>';
                echo '<div class="footer">维博网络授权系统';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                die;
            }
        }
    }

}