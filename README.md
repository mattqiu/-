ci
==
使用轻量级框架codeigniter制作的一个无登录功能的新闻发布系统

使用方法：
1、在mysql下导入SQL文件夹下的test.sql.gz,创建好表之后设置好application\config\config.php中程序的路径
   $config['base_url']	= '程序的路径';
2、在system\application\config\database.php中填好数据库相关信息
3、访问"你程序的路径/index.php/news" 即可
