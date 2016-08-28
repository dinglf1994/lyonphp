<?php
    /*
     * 入口文件
     * 1.定义常量
     * 2.加载函数库
     * 3.启动框架
     */
define('LYON',realpath('./'));
define('CORE',LYON.'/core');
define('APP',LYON.'/app');
define('MODULE','app');

define('DEBUG',true);

if(DEBUG)
{
    ini_set('display_errors',on);
}
else
{
    ini_set('display_errors',off);
}

include CORE.'/common/function.php';

include CORE.'/lyon.php';

spl_autoload_register('\core\lyon::load');
\core\lyon::run();