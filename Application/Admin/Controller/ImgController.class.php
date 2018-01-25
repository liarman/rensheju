<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 后台门店管理控制器
 */
class ImgController extends AdminBaseController{

    public function ajaxImgsAll(){
        $data=D('NewsImg')->getTreeData('tree','','text');
        $this->ajaxReturn($data,'JSON');
    }

	public function ajaxImgList(){
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
        $offset = ($page-1)*$rows;
        $countsql="select count(p.id) AS total from qfant_img where 1=1 ";
        $sql="select * from qfant_img where 1=1 ";
        $param=array();

        array_push($param,$offset);
        array_push($param,$rows);

        $data=D('Img')->query($countsql,$param);
        $result['total']=$data[0]['total'];
        $data=D('Img')->query($sql,$param);
        $result["rows"] = $data;
        $this->ajaxReturn($result,'JSON');
    }

    public function deleteImg(){
        $id=I('get.id');
        $map=array(
            'id'=>$id
        );
        $result=D('NewsImg')->deleteData($map);
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
    public function editImg(){
        if(IS_POST){
            $data['id']=I('post.id');
            $data['name']=I('post.name');
            $data['sort']=I('post.sort');
            $data['pid']=I('post.pid',0);
            $data['islink']=I('post.islink',0);
            $data['linkurl']=I('post.linkurl');
            $where['id']=$data['id'];
            $result=D('NewsImg')->editData($where,$data);
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
    public function addImg(){
        if(IS_POST){
            $data['name']=I('post.name');
            $data['sort']=I('post.sort');
            $data['pid']=I('post.pid',0);
            $data['islink']=I('post.islink',0);
            $data['linkurl']=I('post.linkurl');
            unset($data['id']);
            $result=D('NewsImg')->addData($data);
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
