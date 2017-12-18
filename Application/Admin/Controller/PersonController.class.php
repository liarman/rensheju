<?php
namespace Admin\Controller;

use Common\Controller\AdminBaseController;

/**
 * 后台菜单管理
 */
class PersonController extends AdminBaseController
{
    /**
     * 菜单列表
     */
    public function index()
    {
        $this->display();
    }

    public function ajaxPersonList()
    {
        $townid = $_SESSION['user']['townid'];
        if(empty($townid)){
            $data = D("Person")->select();
            foreach ($data as $k => $v){
                $res = D("Village")->where(array('id'=>$v['villageid']))->field('name')->find();
                $data[$k]['villagename'] = $res['name'];
            }
        }else{
            $data = D("Person")->where(array('townid'=>$townid))->select();
            foreach ($data as $k => $v){
                $res = D("Village")->where(array('id'=>$v['villageid']))->field('name')->find();
                $data[$k]['villagename'] = $res['name'];
                //print_r($data);
            }
        }
        $result["rows"] = $data;
        $this->ajaxReturn($result, 'JSON');
    }

    /**
     * 添加菜单
     */
    public function addPerson()
    {
        if(IS_POST){
            $townid = $_SESSION['user']['townid'];
            if($townid){
                $data["name"] = I("post.name");
                $data["age"] = I("post.age");
                $data["phone"] = I("post.phone");
                $data["address"] = I("post.address");
                $data["iden"] = I("post.iden");
                $data["bank"] = I("post.bank");
                $data["banknum"] = I("post.banknum");
                $data["headimg"] = I("post.headimg");
                $result = D('Person')->addData($data);

                if ($result) {
                     $message['status'] = 1;
                     $message['message'] = '添加成功';
                } else {
                    $message['status'] = 0;
                    $message['message'] = '添加失败';
                }
            }else{
                $message['status']=0;
                $message['message']='管理员账号不能添加六员一岗数据';
            }
            $this->ajaxReturn($message, 'JSON');
            }
    }

    /**
     * 修改菜单
     */
    public function editPerson()
    {
        if(IS_POST){
            $townid = $_SESSION['user']['townid'];
            if($townid) {
                $data['id'] = I('post.id');
                $data["name"] = I("post.name");
                $data["age"] = I("post.age");
                $data["phone"] = I("post.phone");
                $data["address"] = I("post.address");
                $data["iden"] = I("post.iden");
                $data["bank"] = I("post.bank");
                $data["banknum"] = I("post.banknum");
                $data["headimg"] = I("post.headimg");
                $where['id'] = $data['id'];
                $result = D('Person')->editData($where, $data);
                if ($result) {
                    $message['status'] = 1;
                    $message['message'] = '保存成功';
                } else {
                    $message['status'] = 0;
                    $message['message'] = '保存失败';
                }
            }else{
                $message['status']=0;
                $message['message']='管理员账号不能修改六员一岗数据';
            }
        }else {
            $message['status']=0;
            $message['message']='保存失败';
        }
        $this->ajaxReturn($message,'JSON');
    }

    /**
     * 删除菜单
     */
    public function deletePerson()
    {
        $townid = $_SESSION['user']['townid'];
        if($townid) {
            $id = I('get.id');
            $map = array(
                'id' => $id
            );
            $result = D('Person')->deleteData($map);
            if ($result) {
                $message['status'] = 1;
                $message['message'] = '删除成功';
            } else {
                $message['status'] = 0;
                $message['message'] = '删除失败';
            }
        }else{
            $message['status']=0;
            $message['message']='管理员账号不能删除六员一岗数据';

        }
        $this->ajaxReturn($message, 'JSON');
    }

    /**
     * 菜单排序
     */
    public function order()
    {
        $data = I('post.');
        D('Person')->orderData($data);
        $this->success('排序成功', U('Admin/Nav/index'));
    }


}
