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
    public function add()
    {
        if(IS_POST){
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
                 $message['message'] = '添加菜单成功';
            } else {
                $message['status'] = 0;
                $message['message'] = '添加菜单失败';
            }
            $this->ajaxReturn($message, 'JSON');
            }
    }

    /**
     * 修改菜单
     */
    public function edit()
    {
        $data = I('post.');
        $map = array(
            'id' => $data['id']
        );
        $id = I('post.id');
        $kind = I('post.kind');
        $dataKind = D('Person')->field('kind')->where(array('id' => $id))->select();
        if ($kind != $dataKind[0]) {
            if ($kind == 1 || $kind == 2) {
                $data['title'] = "";
                $data['description'] = "";
                $data['linkurl'] = "";
                $data['upload'] = "";
            } else if ($kind == 3) {
                $data['kindcontent'] = "";
            } else {
                $data['title'] = "";
                $data['description'] = "";
                $data['linkurl'] = "";
                $data['upload'] = "";
                $data['kindcontent'] = "";
            }
        }
        $result = D('Person')->editData($map, $data);
        if ($result) {
            $message['status'] = 1;
            $message['message'] = '修改成功';
        } else {
            $message['status'] = 0;
            $message['message'] = '修改失败';
        }
        $this->ajaxReturn($message, 'JSON');
    }

    /**
     * 删除菜单
     */
    public function delete()
    {
        $id = I('get.id');
        $map = array(
            'id' => $id
        );
        $result = D('Person')->deleteData($map);
        if ($result) {
            $message['status'] = 1;
            $message['message'] = '删除菜单成功';
        } else {
            $message['status'] = 0;
            $message['message'] = '删除菜单失败';
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
