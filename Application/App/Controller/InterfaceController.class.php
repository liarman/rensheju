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
            if(empty($key)||empty($b)){
                $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_FAIL');
                $data['bstatus']['desc'] = '获取失败！';
                $data['noticesResult'] = '';
            }else {
                $b = $this->caesar->clientDecode($key, $b);
                $param=json_decode($b,true);

                $login = $this->checkIsLonginUser($param['cparam']['userId'], $param['cparam']['token']);
                if($login) {
                    $pageNo = $param['pageNo'];
                    $pageSize = $param['pageSize'];
                    $offset = ($pageNo - 1) * $pageSize;
                    $sql = "select * from qfant_notice n  where 1=1";
                    $param = array();
                    $sql .= " limit %d,%d";
                    array_push($param, $offset);
                    array_push($param, $pageSize);
                    $notice = D('Notice')->query($sql, $param);

                    $data['bstatus']['code'] = 0;
                    $data['bstatus']['message'] = '获取成功';
                    $data['noticesResult'] = $notice;
                }else{
                    $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_NOT_LOGIN');
                    $data['bstatus']['message'] = '登录失效，请重新登录';
                }
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
             if(empty($key)||empty($b)){
                 $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_FAIL');
                 $data['bstatus']['desc'] = '获取失败！';
                 $data['personsResult'] = '';
             }else {
                 $b = $this->caesar->clientDecode($key, $b);
                 $param=json_decode($b,true);

                $login =  $this->checkIsLonginUser($param['cparam']['userId'], $param['cparam']['token']);
                if($login) {
                    $villageId =$param['villageId'];
                    $pageNo =$param['pageNo'];
                    $pageSize =$param['pageSize'];
                    $offset = ($pageNo - 1) * $pageSize;
                    $sql = "select * from qfant_workers n  where 1=1 and villageId='$villageId'";
                    $param = array();
                    $sql .= " limit %d,%d";
                    array_push($param, $offset);
                    array_push($param, $pageSize);
                    $workers = D('Worker')->query($sql, $param);

                    $data['bstatus']['code'] = 0;
                    $data['bstatus']['message'] = '获取成功';
                    $data['personsResult'] = $workers;
          }else{
                    $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_NOT_LOGIN');
                    $data['bstatus']['message'] = '登录失效，请重新登录';
                }
         }

            echo $this->caesar->clientEncode($key, json_encode($data));
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
             if(empty($key)||empty($b)){
                 $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_FAIL');
                 $data['bstatus']['desc'] = '获取失败！';
                 $data['camerasResult'] = '';
             }else {
                 $b = $this->caesar->clientDecode($key, $b);
                 $param=json_decode($b,true);

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
                    $data['bstatus']['message'] = '获取成功';
                    $data['data']['cameras'] = $cameras;
               }else{
                    $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_NOT_LOGIN');
                    $data['bstatus']['message'] = '登录失效，请重新登录';
                }
             }

            echo $this->caesar->clientEncode($key, json_encode($data));
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
             if(empty($key)||empty($b)){
                 $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_FAIL');
                 $data['bstatus']['desc'] = '获取失败！';
                 $data['data'] = '';
             }else {
                 $b = $this->caesar->clientDecode($key, $b);
                 $param=json_decode($b,true);

                $login = $this->checkIsLonginUser($param['cparam']['userId'], $param['cparam']['token']);
                if($login) {
                    $equipment=D("Equipment")->where(array('id'=> $param['id']))->find();
                    $param['method']='liveplay';
                    $param['deviceid']=$equipment['deviceid'];
                    $param['shareid']=$equipment['shareid'];
                    $param['uk']=$equipment['uk'];
                    $param['type']='rtmp';
                    if($param['deviceid'] && $param['shareid'] && $param['uk']){
                        $data=http("https://api.iermu.com/v2/pcs/device",$param);
                        $data=json_decode($data,true);
                        $result['rtmp']=$data['url'];
                        $result['status']=$data['status'];
                        if($equipment['status']==0){
                            $data['bstatus']['code']=-2;
                            $data['bstatus']['des']='设备已离线或取消分享';
                           }else {
                            $data['bstatus']['code']=0;
                            $data['bstatus']['des']='获取成功';
                            $data['data']=$result;
                        }
                    }else {
                        $data['bstatus']['code']=-1;
                        $data['bstatus']['des']='设备号为空,暂时无法播放';
                    }
            }else{
                    $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_NOT_LOGIN');
                    $data['bstatus']['message'] = '登录失效，请重新登录';
                }
             }

            echo $this->caesar->clientEncode($key, json_encode($data));
        }

    }

}
