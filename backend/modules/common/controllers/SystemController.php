<?php

namespace backend\modules\common\controllers;

use common\helpers\Html;
use Yii;
use common\helpers\FileHelper;
use backend\controllers\BaseController;
use common\helpers\PclZip;
/**
 * Class SystemController
 * @package backend\modules\base\controllers
 * @author YiiFrame <21931118@qq.com>
 */
class SystemController extends BaseController
{
    /**
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionInfo()
    {
        // 禁用函数
        $disableFunctions = ini_get('disable_functions');
        $disableFunctions = !empty($disableFunctions) ? explode(',', $disableFunctions) : '未禁用';
        // 附件大小
        $attachmentSize = FileHelper::getDirSize(Yii::getAlias('@attachment'));
        //版本检测
        $ver = Yii::$app->debris->version()['version'];
        $http_type = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
        $updatehost = ''.$http_type.'weiqing.tuangou.today/api/';
        $lastver = file_get_contents(($updatehost . '?a=check&v=') . $ver);
        if($lastver !== $ver){
            $updateinfo = ('<span class="red">最新版本为： ' . $lastver) . '
		   <a href="./update" onclick="rfTwiceAffirm(this, \'确认更新吗？\', \'升级前请一定先行备份好数据库或系统文件。\');return false;">点击这里下载升级包</a>
           </span>';
            $chanageinfo = file_get_contents(($updatehost . '?a=chanage&v=') . $lastver);
        }else{
            $updateinfo = ('<span class="red">最新版本为： ' . $lastver) . ' 已经是最新系统 不需要升级</span>';
        }
        //授权日期
        $hosturl = $_SERVER['HTTP_HOST'];
        $http_type = (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443') ? 'https://' : 'http://';
        $updatehost = ''.$http_type.'weiqing.tuangou.today/api/';
        $updatehosturl = $updatehost . '?a=client_check_time&v=' . $ver . '&u=' . $hosturl;
        $domain_time = file_get_contents($updatehosturl);
        if($domain_time == '2'){
            $domain_time = '[授权版本：授权已过期，请联系客服QQ:21931118]';
        }else{
            $domain_time = '授权版本：服务截止' . date("Y-m-d", $domain_time);
        }
        return $this->render('info', [
            'mysql_size' => Yii::$app->services->backend->getDefaultDbSize(),
            'attachment_size' => $attachmentSize ?? 0,
            'disable_functions' => $disableFunctions,
            'updateinfo' => $updateinfo,
            'domain_time' => $domain_time,
        ]);
    }
    public function actionUpdate()
    {
//        include('common\helpers\PclZip');
        $ver = Yii::$app->debris->version()['version'];
        $hosturl = $_SERVER['HTTP_HOST'];
        $updatehost = 'http://weiqing.tuangou.today/api/';
        $updatehosturl = $updatehost . '?a=update&v=' . $ver . '&u=' . $hosturl;
        $updatenowinfo = file_get_contents($updatehosturl);

        if (strstr($updatenowinfo, 'zip')){
            $pathurl = $updatehost . '?a=down&f=' . $updatenowinfo;
            $updatedir = Yii::getAlias('@attachment');
//            $this->delDirAndFile($updatedir);
            if($this->get_file($pathurl, $updatenowinfo, $updatedir))
                return $this->message('升级成功，升级包在'.$updatedir, $this->redirect(['info']));
            else return $this->message('升级文件不存在', $this->redirect(['info']));
//            $updatezip = $updatedir . '/' . $updatenowinfo;
//            $archive = new PclZip($updatezip);
//            if ($archive->extract(PCLZIP_OPT_PATH, $updatedir)== 0){
//                $updatenowinfo = "远程升级文件不存在，升级失败了，请联系客服手动升级！";
//                return $this->message($updatenowinfo, $this->redirect(['info']));
//            }else{
//                $updatenowinfo = "升级完成刷新查看是否还有升级包";
//                return $this->message($updatenowinfo, $this->redirect(['info']));
//            }
        }
        else return $this->message($updatenowinfo, $this->redirect(['info']));

    }
    //循环删除目录和文件函数
    public function delDirAndFile($dirName)
    {
        if ($handle = opendir("$dirName")) {
            while (false !== ($item = readdir($handle))) {
                if ($item != "." && $item != "..") {
                    if (is_dir("$dirName/$item")) {
                        Self::delDirAndFile("$dirName/$item");
                    } else {
                        unlink("$dirName/$item");
                    }
                }
            }
            closedir($handle);
            //rmdir($dirName);
        }
    }

    public function get_file($url,$name,$folder = './')
    {
        set_time_limit((24 * 60) * 60);
        // 设置超时时间
        $destination_folder = $folder . '/';
        // 文件下载保存目录，默认为当前文件目录
        if (!is_dir($destination_folder)) {
            // 判断目录是否存在
            $this->mkdirs($destination_folder);
        }
        $newfname = $destination_folder.$name;
        // 取得文件的名称
        $file = fopen($url, 'rb');
        // 远程下载文件，二进制模式
        if ($file) {
            // 如果下载成功
            $newf = fopen($newfname, 'wb');
            // 远在文件文件
            if ($newf) {
                // 如果文件保存成功
                while (!feof($file)) {
                    // 判断附件写入是否完整
                    fwrite($newf, fread($file, 1024 * 8), 1024 * 8);
                }
            }
        }
        if ($file) {
            fclose($file);
        }
        if ($newf) {
            fclose($newf);
        }
        return true;
    }
    public function mkdirs($path, $mode = '0777')
    {
        if (!is_dir($path)) {
            // 判断目录是否存在
            Self::mkdirs(dirname($path), $mode);
            // 循环建立目录
            mkdir($path, $mode);
        }
        return true;
    }
}