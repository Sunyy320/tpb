<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    //初始化入口，所以访问必须先登陆
    public function _initialize()
    {
        if (!session('username'))
        {
            $this->redirect ("Index/index" );
        }
    }
}