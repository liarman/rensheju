<?php
namespace App\Controller;
use Common\Controller\AppBaseController;

/**
 * 认证控制器
 */
class InterfaceController extends AppBaseController{

    private $caesar;

    public function _initialize()
    {
        parent::_initialize();
        Vendor('Caesar.Caesar');
        $this->caesar = new \Caesar();
    }
    /**传参  pageNo  pageSize
     * 获取通知列表接口
     */
    public function getNotices(){
        if(IS_POST){
            $key = I("post.key");
            $b = I("post.b");
            if(!empty($key)||!empty($b)){
                $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_FAIL');
                $data['bstatus']['des'] = '获取失败！';
                $data['noticesResult'] = '';
            }else {

            }
            echo $this->caesar->clientEncode($key, json_encode($data));
        }

    }

    /**
     * 传参：pageNo  pageSize  villageId
     *获取企业用工人员列表
     */
    public function getWorkers(){
        if(IS_POST){
            $key = I("post.key");
            $b = I("post.b");
            if(!empty($key)||!empty($b)){
                $b = $this->caesar->clientdesode($key, $b);
                $param=json_desode($b,true);

                $login =  $this->checkIsLonginUser($param['cparam']['userId'], $param['cparam']['token']);
                if($login) {
                    $villageId =$param['villageId'];
                    $pageNo =$param['pageNo'];
                    $pageSize =$param['pageSize'];
                    $offset = ($pageNo - 1) * $pageSize;
                    $sql = "select * from qfant_worker n  where 1=1 and villageId='$villageId'";
                    $param = array();
                    $sql .= " limit %d,%d";
                    array_push($param, $offset);
                    array_push($param, $pageSize);
                    $workers = D('Worker')->query($sql, $param);

                    $data['bstatus']['code'] = 0;
                    $data['bstatus']['des'] = '获取成功';
                    $data['data']['personsResult'] = $workers;
                }else{
                    $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_NOT_LOGIN');
                    $data['bstatus']['des'] = '登录失效，请重新登录';
                }

                echo $this->caesar->clientEncode($key, json_encode($data));
            }


        }
    }

    /**
     * 传参：pageNo  pageSize
     *获取监控设备列表
     */
    public function getCameras(){
        if(IS_POST){
            $key = I("post.key");
            $b = I("post.b");
            if(!empty($key)||!empty($b)){
                $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_FAIL');
                $data['bstatus']['des'] = '获取失败！';
                $data['data']['camerasResult'] = '';

                echo $this->caesar->clientEncode($key, json_encode($data));
            }


        }
    }

    /**
     * 传参：id
     *获取监控设备详情
     */
    public function getCameraDetail(){
        if(IS_POST){
            $key = I("post.key");
            $b = I("post.b");
            if(!empty($key)||!empty($b)){
                $b = $this->caesar->clientdesode($key, $b);
                $param=json_desode($b,true);

                $login = $this->checkIsLonginUser($param['cparam']['userId'], $param['cparam']['token']);
                if($login) {
                    $pageNo = $param['pageNo'];
                    $pageSize = $param['pageSize'];
                    $offset = ($pageNo - 1) * $pageSize;
                    $sql = "select * from qfant_equipment n  where 1=1 ";
                    $param = array();
                    $sql .= " limit %d,%d";
                    array_push($param, $offset);
                    array_push($param, $pageSize);
                    $cameras = D('Equipment')->query($sql, $param);

                    $data['bstatus']['code'] = 0;
                    $data['bstatus']['des'] = '获取成功';
                    $data['data']['cameras'] = $cameras;
                }else{
                    $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_NOT_LOGIN');
                    $data['bstatus']['des'] = '登录失效，请重新登录';
                }
                echo $this->caesar->clientEncode($key, json_encode($data));
            }


        }

    }

}
