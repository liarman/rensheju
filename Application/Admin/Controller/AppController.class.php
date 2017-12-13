<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class AppController extends AdminBaseController{
	/**
	 * 首页
	 */
	public function index(){
		$this->display();
	}

    public function ajaxCustomerList(){
        $data = D("Customer")->select();
        foreach ($data as $k => $v){
            $res = D("Village")->where(array('id'=>$v['villageid']))->field('name')->find();
            $data[$k]['villagename'] = $res['name'];
        }
        $result["rows"] = $data;
        $this->ajaxReturn($result, 'JSON');
    }

    public function ajaxVillageList(){
        $townid = $_SESSION['user']['townid'];
        $result = D("Village")->where(array('townid'=>$townid))->select();
        $this->ajaxReturn($result,'JSON');
    }
	/**
	 * elements
	 */
	public function add(){
	    $data['username'] = I('post.username');
        $data['password'] = md5(I('post.password'));
        $data['villageid'] = I('post.villageid');
        $result=D('Customer')->addData($data);
        if($result){
            $message['status']=1;
            $message['message']='添加成功';
        }else {
            $message['status']=0;
            $message['message']='添加失败';
        }
        $this->ajaxReturn($message,'JSON');
	}

    public function edit(){
        $data['id'] = I('post.id');
        $data['username'] = I('post.username');
        $data['password'] = md5(I('post.password'));
        $data['villageid'] = I('post.villageid');
        $map=array(
            'id'=>$data['id']
        );
        $result=D('Customer')->editData($map,$data);
        if($result){
            $message['status']=1;
            $message['message']='修改成功';
        }else {
            $message['status']=0;
            $message['message']='修改失败';
        }
        $this->ajaxReturn($message,'JSON');
    }

    public function delete(){

        $id=I('get.id');
        $result=D('Customer')->where(array('id'=>$id))->delete();
        if($result){
            $message['status']=1;
            $message['message']='删除菜单成功';
        }else {
            $message['status']=0;
            $message['message']='删除菜单失败';
        }
        $this->ajaxReturn($message,'JSON');
    }
	
	/**
	 * welcome
	 */
	public function welcome(){
	    $this->display();
	}



}
