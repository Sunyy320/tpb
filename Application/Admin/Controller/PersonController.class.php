<?php
namespace Admin\Controller;

use Think\Controller;

class PersonController extends BaseController
{

    //人员管理首页
    public function index()
    {
        $this->assign("data", json_encode($this->getTree()));
        $this->display();
    }


    //得到树形菜单
    public function getTree()
    {

        $votepro = M("Votepro");
        $where['adminid'] = $_SESSION['adminid'];

        $list = $votepro->field("id,votename as name")->where($where)->select();

        //当没有列表的时候，暂时还未考虑

        return $this->createTree($list);
    }

    //构造组织结构子数
    private function createTree($data)
    {
        $array = array();

        foreach ($data as $val) {
             $temp = null;
             $tmp  = null;
            $temp = array(
                0 =>
                    array(
                        'text' => '候选人信息',
                        'tags' => array('hxr' . $val['id']) ,
                    ),
                1 =>
                    array(
                        'text' => '投票人信息',
                        'tags' => array('tpr' . $val['id']),
                    )
            );
             $tmp['text'] = $val['name'];
            $tmp['nodes'] = $temp;


            $array[] = $tmp;
        }

        return $array;
    }


    //通过判断text是tpr或者hxr,从不同的数据库表中选择数据
    public function getPerByProid()
    {

        $m = $_GET['id'];

        if(is_array($m)){
            $iswhich = substr($m[0], 0, 3);
            $proid = substr($m[0], 3);

        }else{
            $iswhich = substr($m, 0, 3);
            $proid = substr($m,3);
        }

        //file_put_contents("d:/mylog.log",$iswhich."-".$proid."\r\n",FILE_APPEND);

        if (empty($m)) {
            $this->ajaxReturn(array());
        } else if ($iswhich == "tpr") {
            $this->ajaxReturn($this->getJoinPer($proid));
        } else if ($iswhich == "hxr") {
            $this->ajaxReturn($this->getPer($proid));
        }

    }

    //查询投票人信息
    private function getJoinPer($id)
    {
        $join = M("Votetpr");

        $fields = array(
            'id',
            'joinflag',
            'personame',
            'daynums',
            'isfull',
            'department',
            'status',
            'votetime'
        );

        $where['proid'] = $id;

        $res = $join->field($fields)->where($where)->select();

        if (!$res) {
            foreach ($fields as $k => $v) {
                $res[0][$v] = "-";
            }
        } else {
            foreach ($res as $k => $v) {
                if ($res[$k]['isfull'] == '0') $res[$k]['isfull'] = '是';
                else if ($res[$k]['isfull'] == '1') $res[$k]['isfull'] = '否';
                else    $res[$k]['isfull'] = '-';

                if ($res[$k]['status'] == '0') $res[$k]['status'] = '有';
                else if ($res[$k]['status'] == '1') $res[$k]['status'] = '无';
                else    $res[$k]['status'] = '-';
            }
        }
        return $res;
    }

    // 获取候选人的信息
    private function getPer($id)
    {
        $join = M("Votehxr");

        $fields = array(
            'id',
            'joinflag',
            'personame',
            'brifintro',
            'perpic',
            'daynums',
            'department',
            'lables',
            'status'
        );

        $where['proid'] = $id;

        $res = $join->field($fields)->where($where)->select();

        if (!$res) {
            foreach ($fields as $k => $v) {
                $res[0][$v] = "-";
            }
        }else {
            foreach ($res as $k => $v) {
                if ($res[$k]['status'] == '0') $res[$k]['status'] = '有';
                else if ($res[$k]['status'] == '1') $res[$k]['status'] = '无';
                else    $res[$k]['status'] = '-';
            }
        }

        return $res;
    }


    //增加投票人
    public function addTpr(){

        //验证标识符的唯一性
        $votetpr=M("Votetpr");
        $m = $_POST['info'];
        $proid = substr($m, 3);

        $where['joinflag']=$_POST['joinflag'];
        $where['proid']=$proid;
        $res = $votetpr->where ( $where )->select();

       // file_put_contents("d:/mylog.log",var_export($res,true),FILE_APPEND);

        if(count($res)>0){
            $this->returnAjax(false,"该身份验证码已经存在！");
        }


        $data=array(
            'proid'=>$proid,
            'joinflag'=>$_POST['joinflag'],
            'personame'=>$_POST['personame'],
            'department'=>$_POST['department'],
            'status' =>$_POST['status'],
            'daynums'=>'0',
            'isfull'=>'0',
        );


        if($id=$votetpr->create($data)){
            if($votetpr->add()>0){
                $this->returnAjax(true,"添加成功");
            }
        }

    }


    //增加候选人
    public function addHxr(){
        // file_put_contents("d:/mylog.log",var_export($_POST,true),FILE_APPEND);


        //验证标识符的唯一性
        $votehxr=M("Votehxr");
        $m = $_POST['iswhich'];
        $proid = substr($m, 3);
        $where['joinflag']=$_POST['joinflag'];
        $where['proid']=$proid;
        $res = $votehxr->where ( $where )->select();

        //

        if(count($res)>0){
            $this->returnAjax(false,"该身份验证码已经存在！");
        }

        //上传图片
        if ($_POST['isimg'] == "true") {
            if (!empty($_FILES['file2']['tmp_name'])) {
                $perpic = uploadImg($_FILES['file2']);
                if ($perpic == "error") {
                    $this->returnAjax(false, "图片上传错误，请重新上传！");
                }
            } else {
                $this->returnAjax(false, "图片上传错误，请重新上传！");
            }
        }


        $data=array(
            'proid'=>$proid,
            'joinflag'=>$_POST['joinflag'],
            'personame'=>$_POST['personame'],
            'department'=>$_POST['department'],
            'status' =>$_POST['status'],
            'lables'=>$_POST['lables'],
            'brifintro'=>$_POST['brifintro'],
            'perpic'=>$perpic,
            'daynums'=>'0'
        );

        //file_put_contents("d:/mylog.log",var_export($data,true),FILE_APPEND);


        if($id=$votehxr->create($data)){
            if($votehxr->add()>0){
                $this->returnAjax(true,"添加成功");
            }
        }

        $this->returnAjax(false,"出现莫名错误啦！");


    }


    //删除投票人或者候选人
    public function deletePer(){
//        file_put_contents("d:/mylog.log",var_export($_POST,true),FILE_APPEND);
        $id=$_POST['id'];
        $iswhich=$_POST['iswhich'];

        if(substr($iswhich,0,3)=="tpr"){
            $votetpr=M("Votetpr");
            $votetpr->delete ($id ) ? $this->returnAjax ( true, "删除成功" ) : $this->returnAjax ( false, "删除失败" );
        }else{
            $votehxr=M("Votehxr");
            $votehxr->delete ($id) ? $this->returnAjax ( true, "删除成功" ) : $this->returnAjax ( false, "删除失败" );
        }

    }


    //更新投票人
    public function updateTpr(){
       // file_put_contents("d:/mylog.log",var_export($_POST,true),FILE_APPEND);


        $votetpr=M("Votetpr");
        $m = $_POST['iswhich'];
        $proid = substr($m, 3);

        $where['joinflag']=$_POST['joinflag'];
        $where['proid']=$proid;
        $where['id']=array("neq",$_POST['id']);
        $res = $votetpr->where ( $where )->select();


        if(count($res)>0){
            $this->returnAjax(false,"该身份验证码已经存在！");
        }


        $arr=array(
            'personame'=>$_POST['personame'],
            'joinflag'=>$_POST['joinflag'],
            'isfull'=>$_POST['isfull'],
            'daynums'=>$_POST['daynums'],
            'status'=>$_POST['status'],
            'department'=>$_POST['department']
        );

        $where2['id']=$_POST['id'];

        $votetpr=M("Votetpr");

        if($votetpr->where($where2)->save($arr)===false){
            $this->returnAjax ( false, "编辑投票人失败！" );
        }else{
            $this->returnAjax ( true, "编辑投票人成功！");
        }
    }


    //更新候选人
    public function updateHxr(){
        //file_put_contents("d:/mylog.log",var_export($_POST,true),FILE_APPEND);
        $votehxr=M("Votehxr");
        $m = $_POST['iswhich'];
        $proid = substr($m, 3);

        $where['joinflag']=$_POST['joinflag'];
        $where['proid']=$proid;
        $where['id']=array("neq",$_POST['id']);
        $res = $votehxr->where ( $where )->select();


        if(count($res)>0){
            $this->returnAjax(false,"该身份验证码已经存在！");
        }


        $arr=array(
            'personame'=>$_POST['personame'],
            'joinflag'=>$_POST['joinflag'],
            'lables'=>$_POST['lables'],
            'daynums'=>$_POST['daynums'],
            'status'=>$_POST['status'],
            'department'=>$_POST['department'],
            'brifintro'=>$_POST['brifintro'],
        );


        //如果图片上传发生改变
        if ($_POST['isimg'] == "true") {
            if (!empty($_FILES['file2']['tmp_name'])) {
                $perpic = uploadImg($_FILES['file2']);
                if ($perpic == "error") {
                    $this->returnAjax(false, "图片上传错误，请重新上传！");
                }
                $arr['perpic']=$perpic;
            } else {
                $this->returnAjax(false, "图片上传错误，请重新上传！");
            }
        }




        $where2['id']=$_POST['id'];


        if($votehxr->where($where2)->save($arr)===false){
            $this->returnAjax ( false, "编辑候选人失败！" );
        }else{
            $this->returnAjax ( true, "编辑候选人成功！");
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