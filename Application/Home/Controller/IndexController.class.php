<?php
namespace Home\Controller;

use Think\Controller;

// 投票控制器
class IndexController extends BaseController {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
    /**
     * 投票用户验证身份
     * @param
     * [
     *  'id'       => 项目 ID
     *  'userId'   => 投票用户ID
     *  'userCard' => 投票用户身份证号
     * ]
     * @return true|false 验证通过返回true 否则返回 false
     */
    public function Verify(){
    	$id = I('id');
    	$userId = I('userId');
    	$userCard = I('userCard');
    	
    	
    }
    
    /**
     * 获取项目 名称&规则
     * @param
     * [
     *  'id' => 项目ID
     * ]
     * @return false|array 项目不存在返回false 否则返回array
     */
    public function getProjectInfo(){
    	$id = I('id'); // 活动ID
    	$res = M('votepro')->where('id',$id)->field('votename as name,voterule as rule')->find();
    	if ($res) {
    		return $res;
    	} else {
    		return false;
    	}
    }
    
    /**
     * 候选人信息
     * @param
     * [
     * 	'id' => 项目ID
     * ]
     * @return array|false  候选人信息
     */
    public function getUserInfo(){
    	$proid = I('id');
    	$res = M('votehxr')->where('proid',$proid)->select();
    	if ($res) {
    		return $res;
    	} else {
    		return false;
    	}
    }
    
    /**
     * 点击投票
     * 
     */
    public function Vote(){
    	
    }
}