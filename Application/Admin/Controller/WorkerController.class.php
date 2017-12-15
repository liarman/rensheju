<?php
namespace Admin\Controller;

use Common\Controller\AdminBaseController;


class WorkerController extends AdminBaseController
{
    /**
     * 列表
     */
    public function index()
    {
        $this->display();
    }

    public function ajaxWorkerList()
    {
        $townid = $_SESSION['user']['townid'];
        if(empty($townid)){
            $result["total"]=D('Worker')->count();
            $data = D("Worker")->select();
            foreach ($data as $k => $v){
                $res = D("Village")->where(array('id'=>$v['villageid']))->field('name')->find();
                $res1 = D("Town")->where(array('id'=>$v['townid']))->field('name')->find();
                $data[$k]['townname'] = $res1['name'];
                $data[$k]['villagename'] = $res['name'];
            }
        }else{
            $result["total"]=D('Worker')->where(array('townid'=>$townid))->count();
            $data = D("Worker")->where(array('townid'=>$townid))->select();
            foreach ($data as $k => $v){
                $res = D("Village")->where(array('id'=>$v['villageid']))->field('name')->find();
                $res1 = D("Town")->where(array('id'=>$v['townid']))->field('name')->find();
                $data[$k]['townname'] = $res1['name'];
                $data[$k]['villagename'] = $res['name'];
            }
        }
        $result["rows"] = $data;
        $this->ajaxReturn($result, 'JSON');
    }

    /**
     * 添加
     */
    public function add()
    {
        if(IS_POST){
            $townid = $_SESSION['user']['townid'];
            $data['townid']=$townid;
            $data["name"] = I("post.name");
            $data["age"] = I("post.age");
            $data["phone"] = I("post.phone");
            $data["address"] = I("post.address");
            $data["iden"] = I("post.iden");
            $data["bank"] = I("post.bank");
            $data["banknum"] = I("post.banknum");
            $data["headimg"] = I("post.headimg");
            $result = D('Worker')->addData($data);

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
     * 修改
     */
    public function edit()
    {
        $data = I('post.');
        $map = array(
            'id' => $data['id']
        );
        $result = D('Worker')->editData($map, $data);
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
        $result = D('Worker')->deleteData($map);
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
     * 排序
     */
    public function order()
    {
        $data = I('post.');
        D('Worker')->orderData($data);
        $this->success('排序成功', U('Admin/Nav/index'));
    }


}
