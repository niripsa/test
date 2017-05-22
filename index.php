<?php
/**
 * 入口
 *
 *
 *
 * by 33hao 好商城V3  www.haoid.cn 开发
 */
	//favicon.ico 网站图标

//strtolower | strtoupper
//strpos | strrpos
//strpos($str,$str1)返回$str1在$str中第一次出现的位置[索引]
//strrpos($str,$str1)返回$str1在$str中最后一次出现的位置[索引]
$site_url = strtolower('http://'.$_SERVER['HTTP_HOST'].substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/index.php')).'/shop/index.php');
//http://127.0.0.1/shop/index.php
//@header('Location: '.$site_url);

include('shop/index.php');

//include既可以当做函数用，又可以加空格
//exit;echo