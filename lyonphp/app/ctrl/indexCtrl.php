<?php

namespace app\ctrl;

class indexCtrl extends \core\lyon
{
    public function index()
    {
        //p('hello ctrl');
        $model = new \core\lib\model();
        $sql = "select * from info";
        $info = $model->query($sql);
        //p($info->fetchAll());
        $name = 'hello world';
        $title = 'lyonphp';
        $this->assign('title',$title);
        $this->assign('name',$name);
        $this->display('index.html');
        //include APP.'/views/'.'index.html';
    }
}