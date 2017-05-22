<?php
//echo PHP_OS.PHP_EOL.PHP_VERSION;
//windows内核一直都是windowsNT
//ini_set ini_get 分别设置一些配置，但是并不能改变php.ini，仅本次能用
//gd:graphis 图片处理 如生成验证码
//disk_free_space()

//ntfs fat32 fat16 c + 汇编 形式语言 自然语言(自然语言处理)
//isset empry在底层不叫一个函数，实际上是语言片段(编译原理)
//计算机四大课：编译原理 数据结构 计算机网络 操作系统
//var_dump(function_exists('isset')); //false

//CMS:content management system 内容管理系统 框架：php_cms

//pc端页面 + wap页面 + app

//1.如果你不登陆，还可以添加购物车，这个信息存在哪里? -- cookie
//2.如果登陆了，怎么办? -- 数据库 member_id---cart_id
//3.websocket---页面即时聊天 node.js/swoole
//4.三个角色 1是前台 顾客 2是入驻商家 3是系统总后台
//5.√shopnc ecshop tpshop magneto √wordpress phpvod phpcms discuzz uchome √drupal
//6.登陆 token 防止csrf攻击
//7.appkey appsecret
//8.URL：tp:/index.php/home/index/index   shopnc:/index.php?act=index&op=index
//9.商品goods   会员member   订单order

//update dt_payment set payment_state=1 where payment_code in ('alipay','wxpay');

#order order_goods order_pay   真实主键与业务主键
#sku:Stock Keeping Unit 库存量单位

/*+----------------+---------------------+------+-----+---------+-------+
| Field          | Type                | Null | Key | Default | Extra |
+----------------+---------------------+------+-----+---------+-------+
| payment_id     | tinyint(1) unsigned | NO   | PRI | NULL    |       |
| payment_code   | char(10)            | NO   |     | NULL    |       |
| payment_name   | char(10)            | NO   |     | NULL    |       |
| payment_config | text                | YES  |     | NULL    |       |
| payment_state  | enum('0','1')       | NO   |     | 0       |       |
+----------------+---------------------+------+-----+---------+-------+*/

// tinyint(1) unsigned		unsigned:无符号
// tinyint:小型int,1个字节  mediumint:2个字节  int:4个字节  bigint:8/16字节
// 1个字节=8bit  有符号(默认): -128 ~ 127     unsigned:0 ~ 255
//char(10):即便长度不到10,也占10个位置
//varchar(10):如果不到10,就占用实际空间,最大10个,缺点是要算
//text——大文本,会自动动态调整
//enum()枚举类型,只能从设置的值中取 enumerate

//logic 是model的更上一层 mvc-model[-logic-]view-controller
//$_GET/POST/COOKIE/SESSION/SERVER/ENV/GLOBAL/FILE

/*$name = "gaoxugang";

function getName(){
	echo $GLOBALS['name'];
}
getName();*/
/*$arr=[1,2];
var_dump(array_pad($arr, 5, 5)); //[1,2,5,5,5]
var_dump($arr);*/ //[1,2]

/*function myfunction($a,$b){
	return $a."#".$b;
}
$a = array("a","b","c");
print_r(array_reduce($a, 'myfunction'));*/
/*$a = [6,1,1,2,1];
print_r(array_search(1, $a));*/
/*$a = [0,1,2,3,4,5,6,7,8,9];
var_dump(array_slice($a,0,2));*/
/*$a = [5,2,2,7,6,5,1,8];
array_unique($a);
print_r($a);*/

//1.搞清楚支付是往哪个接口送
//2.支付要告诉第三方支付接口哪些信息？
//	需要支付的money数	数据库
//	支付的订单号		paysn
//	商户号(给谁)		商户密钥
//	安全参数
//	URL参数 return_url(用户体验)  notify_url 支付回调url(写一个接口,用于对方通知支付结果)
//	回调验证的是1.一定是支付宝回调 2.验证结果是否真的是成功

//md5(key . "someMessage") someMessage ->支付宝 md5(key . "someMessage") 是否==

//对称加密：加密和解密用同一把钥匙，需要好好保存这把钥匙 凯撒加密 des
//非对称加密：加密和解密用的不是同一把钥匙，加密用私钥，解密用公钥（或相反） 拿到公钥或私钥都很难推导出另一把钥匙 RSA md5    https既用到了对称加密,也用到了非对称加密
//费马小定理 欧拉定理

//虽然都叫支付宝/微信支付
//1.表现形式不一样
//2.返回的值不一样

//php对于不认识的文件统一放到 php://input,↓有时候也会放到这里
//微信支付 XML $GLOBALS['HTTP_RAW_POST_DATA'];


//merchantID:商户id

#var_dump(class_exists('stdClass'));
//new stdClass：new一个标准对象
/*$obj = new stdClass;
$obj->name = 'gaoxugang';
$obj->age = 29;*/
//对象转化成数组：
//1.(array)$obj类型强制转换
//var_dump((array)$obj);
//2.json_encode + json_decode($obj,TRUE)
//var_dump(json_decode(json_encode($obj),true));

//simplexml_load_string($xmlString,$className):把XML字符串载入对象中
//返回类SimpleXMLElement的一个对象,该对象的属性包含XML文档中的数据。如果失败,则返回false
/*$xmlstring = <<<XML
<?xml version="1.0" encoding="ISO-8859-1"?>
<note>
<to>George</to>
<from>John</from>
<heading>Reminder</heading>
<body>Don't forget the meeting!</body>
</note>
XML;

$xml = simplexml_load_string($xmlstring);

var_dump($xml);*/

//微信 支付宝要求回调notify_url 告诉它success 阶梯式重试