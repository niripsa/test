/**
 * v3-b12
 */
var config = {};//数据库帐号设置

config['host']         = 'localhost';//数据库地址
config['port']         = '3306';//数据库端口
config['user']         = 'root';//数据库用户名
config['password']     = 'root';//数据库密码
config['database']     = '33hao';//mysql数据库名
config['tablepre']     = '33hao_';//表前缀
config['insecureAuth'] = true;//兼容低版本
config['debug']        = false;//默认false

exports.hostname = 'www.baidu.com';//把网址修改为你安装商城的域名，授权连接的域名或IP,为空不限制，
exports.port = 8090;//服务器所用端口号,默认8090
exports.config = config;
