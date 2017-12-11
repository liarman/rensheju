<?php
namespace App\Controller;
use Common\Controller\WapController;
/**
 * 认证控制器
 */
class EquipmentController extends WapController{
    public function _initialize(){
        parent::_initialize();
		$binduser=D('Binding')->where(array('wecha_id'=>$this->wecha_id))->find();
		//print_r($this->wecha_id);die;
		if(empty($binduser)){
			$this->redirect("App/Bind/bind",array('wecha_id'=>$this->wecha_id));
		}
		
		$this->assign('wecha_id',$this->wecha_id);
    }
   
    public function district(){

		$wecha_id=$this->wecha_id;
		$data1=D('Binding')->where(array('wecha_id'=>$wecha_id))->find();
				//print_r($this->wecha_id);die;
		//print_r($data1);die;
		if($data1['bkey_id']){
			$data=D('Bindkey')->where(array('id'=>$data1['bkey_id']))->find();
			//print_r($data);die;
			if($data['dizhi']==0){
				$this->display();
			}else{
				$this->redirect('App/Equipment/listcamera', array('type' =>$data['dizhi']));
			}
		}
    }
	public function listcamera(){
		$type=I("get.type",1);
		$cameras=D("Equipment")->where(array('areaid'=>$type))->select();
		$this->assign('cameras',$cameras);
        $this->display();
    }
	public function camera(){
		$id=I("get.id",0);
		$camera=D("Equipment")->where(array('id'=>$id))->find();
		$this->assign('camera',$camera);
        $this->display();
    }
}
