## YiiFrame 2.0

模块化开发，完善的权限管理，响应式布局，通用的会员和API模块，丰富的应用市场

### 前言

YiiFrame支持模块化插件安装，通过灵活的功能插件，让企业搭建个性化的CRM、ERP、OA、进销存等系统，具有完善的权限管理，支持单企业版和多企业版。

YiiFrame 创建于 2020 年 4 月 16 日，基于 RF 快速开发引擎，目前正在成长中，经过 1.0 版本一年多的开源反馈磨合，以更加优秀的形态出现。对 1.0 的版本进行了重构优化完善，更好的面向开发者进行二次开发。2.0 版本更是优化了底层突出了服务层，分离业务逻辑，支持插件式开发，支持多企业。

### 特色

- 极强的可扩展性，应用化，模块化，插件化机制敏捷开发。
- 极致的插件机制，微核架构，良好的功能延伸性，功能之间是隔离，可定制性高，可以渐进式地开发，逐步增加功能，安装和卸载不会对原来的系统产生影响,强大的功能完全满足各阶段的需求，支持用户多端访问(后台、微信、Api、前台等)。
- 极完善的 RBAC 权限控制管理、无限父子级权限分组、可自由分配子级权限，且按钮/链接/自定义内容/插件等都可加入权限控制。
- 只做基础底层内容，不会在上面开发过多的业务内容，满足绝大多数的系统二次开发。
- 多入口模式，多入口分为 Backend (后台)、Merchant (企业端)、Frontend (PC前端)、Html5 (手机端)、Console (控制台)、Api (对内接口)、OAuth2 Server (对外接口)、MerApi (企业接口)、Storage (静态资源)，不同的业务，不同的设备，进入不同的入口。
- 对接微信公众号且支持小程序，使用了一款优秀的微信非官方 SDK Easywechat 4.x，开箱即用，预置了绝大部分功能，大幅度的提升了微信开发效率。
- 支持第三方登录，目前有 QQ、微信、微博、GitHub 等等。
- 支持第三方支付，目前有微信支付、支付宝支付、银联支付，二次封装为网关多个支付一个入口一个出口。
- 支持 RESTful API，支持前后端分离接口开发和 App 接口开发，可直接上手开发业务。
- 一键切换云存储，本地存储、腾讯 COS、阿里云 OSS、七牛云存储都可一键切换，且增加其他第三方存储也非常方便。
- 全面监控系统报错，报错日志写入数据库，方便定位错误信息。支持直接钉钉提醒。
- 快速高效的 Servises (服务层)，遵循 Yii2 的懒加载方式，只初始化使用到的组件服务。
- 丰富的表单控件(时间、日期、时间日期、日期范围选择、颜色选择器、省市区三级联动、省市区勾选、单图上传、多图上传、单文件上传、多文件上传、百度编辑器、百度图表、多文本编辑框、地图经纬度选择器、图片裁剪上传、TreeGrid、JsTree、Markdown 编辑器)和组件(二维码生成、Curl、IP地址转地区)，快速开发，不必再为基础组件而担忧。
- 快速生成 CURD ,无需编写代码，只需创建表设置路径就能出现一个完善的 CURD ,其中所需表单控件也是勾选即可直接生成。
- 正常开发只需要开发企业端，没有 Saas 的时候企业端就是总后台，有了 Saas，企业端就是子后台
- 完善的文档和辅助类，方便二次开发与集成。

### 应用架构流程
![image](https://wephp-unioa.oss-cn-shenzhen.aliyuncs.com/app-flow.png)

### 系统快照
![image](https://wephp-unioa.oss-cn-shenzhen.aliyuncs.com/%E5%BF%AB%E7%85%A71.webp)
![image](https://wephp-unioa.oss-cn-shenzhen.aliyuncs.com/%E5%BF%AB%E7%85%A72.png.webp)
![image](https://wephp-unioa.oss-cn-shenzhen.aliyuncs.com/%E5%BF%AB%E7%85%A73.png.webp)
![image](https://wephp-unioa.oss-cn-shenzhen.aliyuncs.com/%E5%BF%AB%E7%85%A74.webp)
![image](https://wephp-unioa.oss-cn-shenzhen.aliyuncs.com/%E5%BF%AB%E7%85%A75.webp)

### 开始之前

- 具备 PHP 基础知识
- 具备 Yii2 基础开发知识
- 具备 开发环境的搭建
- 仔细阅读文档，一般常见的报错可以自行先解决，解决不了再来提问
- 如果要做小程序或微信开发需要明白微信接口的组成，自有服务器、微信服务器、公众号（还有其它各种号）、测试号、以及通信原理（交互过程）
- 如果需要做接口开发(RESTful API)了解基本的 HTTP 协议，Header 头、请求方式（`GET\POST\PUT\PATCH\DELETE`）等
- 能查看日志和 Debug 技能

### 项目地址：

Gitee：https://gitee.com/hjp1011/yiiframe
Github:https://github.com/hjp1011/yiiframe

### 官网
http://www.yiiframe.com
### 文档
http://doc.yiiframe.com
### 插件下载
http://store.yiiframe.com

### 项目演示 见QQ群公告(1107210028)

### 问题反馈

在使用中有任何问题，欢迎反馈给我，可以用以下联系方式跟我交流

QQ：[21931118](http://wpa.qq.com/msgrd?v=3&uin=21931118&site=qq&menu=yes)

GitHub：https://github.com/hjp1011/yiiframe/issues

### 特别鸣谢

感谢以下的项目，排名不分先后

Yii：http://www.yiiframework.com

EasyWechat：https://www.easywechat.com

Bootstrap：http://getbootstrap.com

AdminLTE：https://adminlte.io

RF：http://www.rageframe.com
...

### 版权信息

YiiFrame 遵循 Apache2 开源协议发布，并提供免费使用。

本项目包含的第三方源码和二进制文件之版权信息另行标注。

版权所有Copyright © 2010-2028 by YiiFrame [www.yiiframe.com](https://www.yiiframe.com)

All rights reserved。