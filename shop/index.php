<?php
/**
 * 商城板块初始化文件
 *
 *
 * * by 33hao www.haoid.cn 运营版 */
//define和const都可以定义常量，有什么区别？
//define可以加表达式，const不能
//define("PI",3.14159);
//const PI = 3.14159;
define('APP_ID','shop');
define('BASE_PATH',str_replace('\\','/',dirname(__FILE__)));
//__FILE__:当前文件的目录和文件名			__DIR__
//D:\Code\SHOPNC\shopnc\shop\index.php
//D:\Code\SHOPNC\shopnc↓ 2次dirname
if (!@include(dirname(dirname(__FILE__)).'/global.php')) exit('global.php isn\'t exists!');
//↑错误级别 判断安装 定义常量
//BASE_PATH:D:/Code/SHOPNC/shopnc/shop
//一堆controller↓
if (!@include(BASE_PATH.'/control/control.php')) exit('control.php isn\'t exists!');
//BASE_CORE_PATH:	D:/Code/SHOPNC/shopnc/core
if (!@include(BASE_CORE_PATH.'/33hao.php')) exit('33hao.php isn\'t exists!');

	$wapurl = WAP_SITE_URL;
	//http://127.0.0.1/wap
	$agent = $_SERVER['HTTP_USER_AGENT'];
	//echo $agent;exit;
	//判断如果是手机访问，则进入手机专用的界面
	if(strpos($agent,"comFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS")){
		global $config;
        if(!empty($config['wap_site_url'])){
            $url = $config['wap_site_url'];
            switch ($_GET['act']){
			case 'goods':
			  $url .= '/tmpl/product_detail.html?goods_id=' . $_GET['goods_id'];
			  break;
			case 'store_list':
			  $url .= '/shop.html';
			  break;
			case 'show_store':
			  $url .= '/tmpl/product_store.html?store_id=' . $_GET['store_id'];
			  break;
			}
        } else {
            $header("Location:$wapurl");
        }
        header('Location:' . $url);
        exit();	
	}
define('APP_SITE_URL',SHOP_SITE_URL);
define('TPL_NAME',TPL_SHOP_NAME);
define('SHOP_RESOURCE_SITE_URL',SHOP_SITE_URL.DS.'resource');
define('SHOP_TEMPLATES_URL',SHOP_SITE_URL.'/templates/'.TPL_NAME);
define('BASE_TPL_PATH',BASE_PATH.'/templates/'.TPL_NAME);

Base::run();
?>
