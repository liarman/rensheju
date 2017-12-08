<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 后台门店管理控制器
 */
class VillageController extends AdminBaseController{
	public function ajaxVillageList(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$offset = ($page-1)*$rows;
		$result["total"]=D('Village')->count();

		$data=D('Village')->query("select v.*,t.name as tname from qfant_village v left JOIN  qfant_town t ON v.townid=t.id  limit %d,%d" ,array($offset,$rows));
		foreach($data as $key=>$basevalue){
			$data[$key]['baseinfo']=htmlspecialchars_decode($basevalue['baseinfo']);
		}
		$result["rows"] = $data;
        $this->ajaxReturn($result,'JSON');
	}
	/**
	 * 删除
	 */
	public function deleteVillage(){
		$id=I('get.id');
		$map=array(
			'id'=>$id
		);
		$result=D('Village')->deleteData($map);
		if($result){
			$message['status']=1;
			$message['message']='删除成功';
		}else {
			$message['status']=0;
			$message['message']='删除失败';
		}
		$this->ajaxReturn($message,'JSON');
	}
	/**
	 * 添加
	 */
	public function editVillage(){
		if(IS_POST){
			$data['id']=I('post.id');
			$data['name']=I('post.name');
			$data['contact']=I('post.contact');
			$data['tel']=I('post.tel');
			$data['baseinfo']=I('post.baseinfo');
			$data['townid']=I('post.townid');
			$where['id']=$data['id'];
			$result=D('Village')->editData($where,$data);
			if($result){
				$message['status']=1;
				$message['message']='保存成功';
			}else {
				$message['status']=0;
				$message['message']='保存失败';
			}
		}else {
			$message['status']=0;
			$message['message']='保存失败';
		}
		$this->ajaxReturn($message,'JSON');
	}
	/**
	 * 添加
	 */
	public function addVillage(){
		if(IS_POST){
			$data['name']=I('post.name');
			$data['contact']=I('post.contact');
			$data['tel']=I('post.tel');
			$data['intro']=I('post.intro');
			$data['baseinfo']=I('post.baseinfo');
			$data['townid']=I('post.townid');
			unset($data['id']);
			$result=D('Village')->addData($data);
			if($result){
				$message['status']=1;
				$message['message']='保存成功';
			}else {
				$message['status']=0;
				$message['message']='保存失败';
			}
		}else {
			$message['status']=0;
			$message['message']='保存失败';
		}
		$this->ajaxReturn($message,'JSON');
	}
}
