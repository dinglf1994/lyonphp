<?php

namespace core;
class lyon
{
    public static $classMap = array();
    public $assign = array();
    public static function run()
    {
        $route = new \core\lib\route();
        $ctrl = $route->ctrl;
        $action = $route->action;
        $ctrlFile = APP.'/ctrl/'.$ctrl.'Ctrl'.'.php';
        $ctrlClass = '\\'.MODULE.'\\ctrl\\'.$ctrl.'Ctrl';
        if(is_file($ctrlFile))
        {
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
        }
        else
        {
            throw new \Exception('找不到控制器'.$ctrlClass);
        }
    }

    public static function load($class)
    {
        //自动加载类库
        if(isset($classMap[$class]))
        {
            return true;
        }
        else
        {
            $class = '/'.str_replace('\\','/',$class);
            if(is_file(LYON.$class.'.php'))
            {
                include LYON.$class.'.php';
                self::$classMap[$class] = $class;
            }
            else
            {
                return false;
            }
        }

    }
    function assign($name,$value)
    {
        $this->assign[$name] = $value;
    }
    function display($file)
    {
        $file = APP.'/views/'.$file;
        if(is_file($file))
        {
            extract($this->assign);
            include $file;
        }
    }

}