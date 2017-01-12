<?php
namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller
{
    //登陆页面
    public function index()
    {
        $this->display();
    }

    //登陆验证
    public function login($username, $password)
    {
        $admin = D('Admin');
        $map = array(
            'username' => $username,
            'password' => md5($password),
        );
        $res = $admin->field('id')->where($map)->find();
        if ($res) {
            session('adminid', $res['id']);
            session('username', $username);
            $this->success('登录成功', U('Index/index'));
        } else {
            $this->error('用户名或者密码错误');
        }
    }

    //退出登陆
    public function logout()
    {
        $this->success('注销成功', U('Login/index'));
    }
}