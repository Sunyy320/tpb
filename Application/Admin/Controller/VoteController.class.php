<?php
namespace Admin\Controller;

use Think\Controller;

class VoteController extends BaseController
{
    //创建投票页面
    public function index()
    {
        $this->display();
    }


    //创建投票
    public function createVote()
    {

        $data = array(
            'adminid' => session("adminid"),
            'templetid' => $_POST['templateid'],
            'votename' => $_POST['votename'],
            'startime' => $_POST['startime'],
            'endtime' => $_POST['endtime'],
            'homepic' => session("homepic"),
            'picdes' => $_POST['picdes'],
            'voterule' => $this->trimall($_POST['voterule']),
            'voteway' => $_POST['voteway'],
            'votenums' => $_POST['votenums']
        );


        $vote = M('Votepro');

        if ($id = $vote->create($data)) {
            $res = $vote->add();
            if ($res) {
                $this->returnAjax(true, "发起投票成功！", $data);
            }
        }
        $this->returnAjax(false, "发起投票失败，原因：[" . $vote->getError() . "]");

    }


    //删除字符串中所有的空格
    public function trimall($str)
    {
        $rearch = array(" ", "\t", "\n", "\r");
        $replace = array("", "", "", "");
        return str_replace($rearch, $replace, $str);
    }


    //管理项目首页，我的项目显示
    public function manager()
    {
        $this->display();
    }

    //查询所有项目信息
    public function getAll()
    {
        $votepro = M("Votepro");

        $field = array(
            'id',
            'templetid',
            'votename',
            'startime',
            'endtime',
            'homepic',
            'picdes',
            'voterule',
            'voteway',
            'votenums'
        );

        $where['adminid'] = $_SESSION['adminid'];

        $res = $votepro->field($field)->where($where)->select();

        // file_put_contents("d:/mylog.log",var_export($res,true),FILE_APPEND);
        $this->ajaxReturn($res);


    }


    //删除项目
    public function deleteVote()
    {
        $id = $_POST['vote_id'];
        $votepro = M("Votepro");
        empty ($id) && $this->returnAjax(false, "错误请求!");
        $votepro->delete($id) ? $this->returnAjax(true, "删除成功") : $this->returnAjax(false, "删除失败");

    }

    //修改页面,，取出所有信息，进行页面初始化
    public function updateVote()
    {
        $id = $_GET['id'];

        $res = $this->getAllById($id);
        $this->assign("res", $res);

        $this->display();
    }

    //根据id,查询所有信息
    public function getAllById($id)
    {
        $votepro = M("Votepro");

        $field = array(
            'id',
            'templetid',
            'votename',
            'startime',
            'endtime',
            'homepic',
            'picdes',
            'voterule',
            'voteway',
            'votenums'
        );

        $where['id'] = $id;

        $res = $votepro->field($field)->where($where)->find();

        return $res;
    }


    //上传图片
    public function updateImg()
    {

        //重新上传了图片
        if ($_POST['isimg'] == "true") {
            if (!empty($_FILES['file2']['tmp_name'])) {
                $homepic = uploadImg($_FILES['file2']);
                session("homepic", $homepic);

                if ($homepic == "error") {
                    // file_put_contents("d:/mylog.log","err",FILE_APPEND);
                    $this->returnAjax(false, "图片上传错误，请重新上传！");
                }
            } else {
                //file_put_contents("d:/mylog.log","err22",FILE_APPEND);
                $this->returnAjax(false, "图片上传错误，请重新上传！");
            }
        } else {
            session("homepic", $_POST['isimg']);
        }

        // file_put_contents("d:/mylog.log", session("homepic"),FILE_APPEND);
        $this->returnAjax(true, "图片上传成功");


    }

    //更新操作
    public function saveUpdate()
    {

        $data = array(
            'adminid' => session("adminid"),
            'templetid' => $_POST['templateid'],
            'votename' => $_POST['votename'],
            'startime' => $_POST['startime'],
            'endtime' => $_POST['endtime'],
            'homepic' => session("homepic"),
            'picdes' => $_POST['picdes'],
            'voterule' => $this->trimall($_POST['voterule']),
            'voteway' => $_POST['voteway'],
            'votenums' => $_POST['votenums']
        );

        //file_put_contents("d:/mylog.log",var_export($data,true),FILE_APPEND);

        $where['id'] = $_POST['id'];


        $vote = M('Votepro');
        if ($vote->where($where)->save($data) === false) {
            $this->returnAjax(false, "更新投票失败，原因：[" . $vote->getError() . "]");
        } else {
            $this->returnAjax(true, "更新投票成功！", $data);
        }

    }


    private function returnAjax($status = true, $info = "", $content = null)
    {
        $info = $status ? (empty ($info) ? "操作成功" : $info) : (empty ($info) ? "操作失败" : $info);
        $this->ajaxReturn(array(
            "content" => $content,
            "info" => $info,
            "status" => $status
        ), "json");
    }
}