<?php

namespace core\lib;

class route
{
    public $ctrl;
    public $action;
    public function __construct()
    {
        //p('hello route');
        //xxx.com/index/index
        //隐藏index.php
        //p($_SERVER);
        if(isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/')
        {
            $path = $_SERVER['PATH_INFO'];
            $patharr = explode('/',trim($path,'/'));
            if(isset($patharr[0]))
            {
                $this->ctrl = $patharr[0];
                unset($patharr[0]);
            }
            if(isset($patharr[1]))
            {
                $this->action = $patharr[1];
                unset($patharr[1]);

            }
            else
            {
                $this->action = 'index';
            }
            $count = count($patharr) + 2;
            $i = 2;
            while($i < $count)
            {
                if(isset($patharr[$i + 1]))
                {
                    $_GET[$patharr[$i]] = $patharr[$i + 1];
                    $i += 2;
                }
                else
                {
                    break;
                }
            }
        }
        else
        {
            $this->ctrl = 'index';
            $this->action = 'index';
        }
    }
}