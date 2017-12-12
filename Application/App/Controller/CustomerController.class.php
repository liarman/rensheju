<?php
namespace App\Controller;

use Common\Controller\AppBaseController;

/**
 * 认证控制器
 */
class CustomerController extends AppBaseController
{
    private $caesar;

    public function _initialize()
    {
        parent::_initialize();
        Vendor('Caesar.Caesar');
        $this->caesar = new \Caesar();
    }

    /**传参  phone  password
     * 登录接口
     */

    public function Login()
    {
        //if(IS_POST){
        $key = I("post.key");
        $b = I("post.b");
        if(empty($key)||empty($b)){
            $data['bstatus']['code'] = '变量获取失败';
            $data['data'] = '';
        }else{
            $b = $this->caesar->clientDecode($key, $b);
            $param = json_decode($b,true);
            $phone = $param['phone'];
            $pass = $param['password'];
            $token = uniqid();
            $user = D("Customer")->where(array('phone' => $phone, 'password' => md5($pass)))->find();
            $res['customer_Id'] = $user['id'];
            $res['loginIden'] = $token;
            $res['loginTime'] = date("Y-m-d H:i:s", time());
            if ($user) {
                $login = D("LoginLogger")->where(array('customer_Id' => $user['id']))->find();
                if ($login) {
                    D("LoginLogger")->where(array('customer_Id' => $user['id']))->save($res);
                    $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_SUCCESS');
                    $data['bstatus']['des'] = '登录成功';
                    $data['data']['token'] = $token;
                    $data['data']['userId'] = $user['id'];
                    $data['data']['phone'] = $user['phone'];
                }else{
                    D("LoginLogger")->add($res);
                    $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_SUCCESS');
                    $data['bstatus']['des'] = '登录成功';
                    $data['data']['token'] = $token;
                    $data['data']['userId'] = $user['id'];
                    $data['data']['phone'] = $user['phone'];
                }
            }else {
                $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_NOT_LOGIN');
                $data['bstatus']['des'] = '登录失败';
                $data['data'] = '';
            }
        }
            echo $this->caesar->clientEncode($key, json_encode($data));
            //}
    }

    /**
     * 退出登录接口
     */

    public function logout(){
        //if(IS_POST){
            $key = I("post.key");
            $b = I("post.b");
        if(empty($key)||empty($b)){
            $data['bstatus']['code'] = '变量获取失败';
            $data['data'] = '';
        }else {
            $b = $this->caesar->clientDecode($key, $b);
            $param = json_decode($b,true);
            D("LoginLogger")->where(array('customer_Id' => $param['cparam']['userId']))->delete();
            $data['bstatus']['code'] = 0;
            $data['bstatus']['des'] = '退出成功！';
            $data['data'] = '';
        }
            echo $this->caesar->clientEncode($key, json_encode($data));
        //}
    }

    /**
     * 获取村镇接口
     */
    public function towns()
    {
        $key = I("post.key");
        $b = I("post.b");
        if(empty($key)||empty($b)){
            $data['bstatus']['code'] = '变量获取失败';
            $data['data'] = '';
        }else {
            $b = $this->caesar->clientDecode($key, $b);
            $param = json_decode($b,true);
            $islogin = $this->checkIsLonginUser($param['cparam']['userId'], $param['cparam']['token']);
            if ($islogin) {
                $towns = D("Town")->field("id,name")->select();
                foreach ($towns as $key => $val) {
                    $village = D('Village')->where(array('townid' => $val['id']))->select();
                    foreach ($village as $k => $v) {
                        $towns[$key]['village'][$k]['id'] = $v['id'];
                        $towns[$key]['village'][$k]['name'] = $v['name'];
                    }
                }
                $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_SUCCESS');
                $data['bstatus']['des'] = '获取成功！';
                $data['data']['towns'] = $towns;
            } else {
                $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_FAIL');
                $data['bstatus']['des'] = '获取失败！';
                $data['data'] = '';
            }
        }
        echo $this->caesar->clientEncode($key, json_encode($data));
    }
    /**
     * 六员一岗接口
     */
    public function person(){
        $key = I("post.key");
        $b = I("post.b");
        if(empty($key)||empty($b)){
            $data['bstatus']['code'] = '变量获取失败';
            $data['data'] = '';
        }else {
            $b = $this->caesar->clientDecode($key, $b);
            $param = json_decode($b,true);
            $islogin = $this->checkIsLonginUser($param['cparam']['userId'], $param['cparam']['token']);
            if ($islogin) {
                $villageid = I("post.villageid");
                $pageSize = I("post.pageSize");
                $pageNo = I("post.pageNo");
                $person = D('Person')->where(array('villageid' => $villageid ))->limit($pageSize)->page($pageNo)->select();
                foreach ($person as $k => $v){

                    $res['personsResult']['id'] = $person[$k]['id'];
                    $res['personsResult']['name'] = $person[$k]['name'];
                    $res['personsResult']['age'] = $person[$k]['age'];
                    $res['personsResult']['phone'] = $person[$k]['phone'];
                    $res['personsResult']['address'] = $person[$k]['address'];
                    $res['personsResult']['iden'] = $person[$k]['iden'];
                    $res['personsResult']['bank'] = $person[$k]['bank'];
                    $res['personsResult']['banknum'] = $person[$k]['banknum'];
                    $res['personsResult']['headimg'] = $person[$k]['headimg'];
                    $result[] = $res['personsResult'];
                }
                $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_SUCCESS');
                $data['bstatus']['des'] = '获取成功！';
                $data['data']['personsResult'] = $result;

            }else {
                $data['bstatus']['code'] = C('APP_STATUS.STATUS_CODE_FAIL');
                $data['bstatus']['des'] = '获取失败！';
                $data['data'] = '';
            }

            }

        echo $this->caesar->clientEncode($key, json_encode($data));

    }


    public function villages()
    {
        if (IS_POST) {
            $key = I("post.key");
            $b = I("post.b");
            $b = $this->caesar->clientDecode($key, $b);
            $param = json_decode($b);
            $town = D("Town")->where(array('id' => $param['id']))->find();
            $villages = D("Village")->where(array('townid' => $param['id']))->select();
            foreach ($villages as $k => $val) {
                $villages[$k]['principal'] = $town['contact'];//负责人
                $villages[$k]['mobile'] = $town['mobile'];//负责人电话
                $villages[$k]['boundary'] = D("VillageBoundary")->where(array('villageid' => $val['id']))->select();
            }
            $data['bstatus']['code'] = 0;
            $data['bstatus']['des'] = '获取成功';
            $data['data'] = $villages;
            echo $this->caesar->clientEncode($key, json_encode($data));
        }
    }

    public function consult()
    {
        if (IS_POST) {
            $key = I("post.key");
            $b = I("post.b");
            $b = $this->caesar->clientDecode($key, $b);
            $param = json_decode($b);
            $consult['villageid'] = $param['villageid'];
            $consult['content'] = $param['content'];
            $result = D("VillageConsult")->add($consult);
            if ($result) {
                $data['bstatus']['code'] = 0;
                $data['bstatus']['des'] = '添加成功';
            } else {
                $data['bstatus']['code'] = -1;
                $data['bstatus']['des'] = '添加失败';
            }
            echo $this->caesar->clientEncode($key, json_encode($data));
        }
    }

    public function weather()
    {
        if (IS_POST) {
            $key = I("post.key");
            $b = I("post.b");
            $b = $this->caesar->clientDecode($key, $b);
            $param = json_decode($b);
            $w = $this->http("https://api.seniverse.com/v3/weather/now.json?key=fguvd3ahk6eneabr&location=Bozhou&language=zh-Hans&unit=c");
            $w = json_decode($w);
            $data['bstatus']['code'] = 0;
            $data['bstatus']['des'] = '获取成功';
            $data['data'] = $w->results;
            //print_r( json_encode($data));die;
            echo $this->caesar->clientEncode($key, json_encode($data));
        }
    }

    /**
     * 发送HTTP请求方法
     * @param  string $url 请求URL
     * @param  array $params 请求参数
     * @param  string $method 请求方法GET/POST
     * @return array  $data   响应数据
     */
    function http($url, $params, $method = 'GET', $header = array(), $multi = false)
    {
        $opts = array(
            CURLOPT_TIMEOUT => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER => $header
        );
        /* 根据请求类型设置特定参数 */
        switch (strtoupper($method)) {
            case 'GET':
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否传输文件
                $params = $multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL] = $url;
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new Exception('不支持的请求方式！');
        }
        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) throw new Exception('请求发生错误：' . $error);
        return $data;
    }

    public function news()
    {
        $catid = I("get.catid", 0);
        if ($catid > 0) {
            $cat = D('Newscat')->field('name')->where(array('id' => $catid))->find();
            $catname = $cat['name'];
            $cats = D('Newscat')->where(array('pid' => $catid))->select();
            //print_r($cats);die;
            $this->assign("catname", $catname);
            if (empty($cats)) {
                $news = D('News')->where(array('catid' => $catid))->select();
                $this->assign("news", $news);
                $this->display("newslist");
            } else {
                $this->assign("cats", $cats);

                $this->display();
            }
        } else {
            $catname = '新闻列表';
            $cats = D('Newscat')->where(array('pid' => 0))->select();
            $this->assign("cats", $cats);
            $this->assign("catname", $catname);
            $this->display();
        }
    }

    public function baseinfo()
    {
        $id = I("get.id", 0);
        if ($id > 0) {
            $town = D('Town')->where(array('id' => $id))->find();
            $town['baseinfo'] = htmlspecialchars_decode($town['baseinfo']);
            $villages = D('Village')->where(array('townid' => $id))->select();
            $this->assign("villages", $villages);
            $this->assign("town", $town);
            $this->display();
        }
    }

    public function village()
    {
        $id = I("get.id", 0);
        if ($id > 0) {
            $village = D('Village')->where(array('id' => $id))->find();
            $village['baseinfo'] = htmlspecialchars_decode($village['baseinfo']);
            $this->assign("village", $village);
//            print_r($village);die;
            $this->display();
        }
    }

    public function newsdetail()
    {
        $id = I("get.id", 0);
        if ($id > 0) {
            $news = D('News')->where(array('id' => $id))->find();
            $news['content'] = htmlspecialchars_decode($news['content']);
            $this->assign("news", $news);
            // print_r($news);die;
            $this->display();
        }
    }

	 public function equipments(){
        if(IS_POST){
            $key=I("post.key");
            $b=I("post.b");
            $b=$this->caesar->clientDecode($key,$b);
            $param=json_decode($b,true);
            $equipments=D("Equipment")->where(array('areaid'=>$param['type']))->select();
            $data['bstatus']['code']=0;
            $data['bstatus']['des']='获取成功';
            $data['data']['equimpents']=$equipments;
            echo  $this->caesar->clientEncode($key,json_encode($data));
        }
    }
	public function equipment(){
        if(IS_POST){
            $key=I("post.key");
            $b=I("post.b");
            $b=$this->caesar->clientDecode($key,$b);
            $param=json_decode($b,true);
            $equipment=D("Equipment")->where(array('id'=> $param['id']))->find();
						
			$param['method']='liveplay';
			$param['deviceid']=$equipment['deviceid'];
			$param['shareid']=$equipment['shareid'];
			$param['uk']=$equipment['uk'];
			$param['type']='rtmp';
			if($param['deviceid'] && $param['shareid'] && $param['uk']){
				$data=http("https://api.iermu.com/v2/pcs/device",$param);
				$data=json_decode($data,true);
				$equipment['rtmp']=$data['url'];
				$equipment['status']=$data['status'];
				if($equipment['status']==0){
					$data['bstatus']['code']=-2;
					$data['bstatus']['des']='设备已离线或取消分享';
				}else {
					$data['bstatus']['code']=0;
					$data['bstatus']['des']='获取成功';
					$data['data']=$equipment;	
				}				
			}else {
				$data['bstatus']['code']=-1;
				$data['bstatus']['des']='设备号为空,暂时无法播放';
			}
			//print_r($data);
            echo  $this->caesar->clientEncode($key,json_encode($data));
        }
    }

    /**
     * openinfo
     * 党支部管理的公开信息
     */
    /*  public function openinfo1(){
          $vilage_id=I("get.id",0);
          if($vilage_id>0){
              $openinfo=D('Openinfo')->where(array('villageid'=>$vilage_id))->select();
              $this->assign("openinfo",$openinfo);
              $this->display();
          }
      }*/
    public function openinfo()
    {
        $id = I("get.id", 0);
        if ($id > 0) {
            $param = array();
            array_push($param, $id);
            $sql = " select v.name as vname,o.* from qfant_village v  LEFT JOIN qfant_openinfo o ON o.villageid=v.id where  o.villageid=%d";
            $openinfo = D('Openinfo')->query($sql, $param);
            $this->assign("openinfo", $openinfo);
            $this->display();
        }

    }

    /**
     * lookOpeninfo
     * 查看党支部个人的公开信息
     */
    public function lookOpeninfo()
    {
        $id = I("get.id", 0);
        if ($id > 0) {
            $lookOpenInfo = D('Openinfo')->where(array('id' => $id))->find();
            $this->assign("lookOpenInfo", $lookOpenInfo);
            $this->display();
        }
    }

    public function groupindex()
    {
        $this->display();
    }

    public function standard()
    {
        $this->display();
    }

    public function grouplife()
    {
        $this->display();
    }

    public function photo()
    {
        $photo = D('Photo')->select();
        $this->assign("photo", $photo);
        $this->display();
    }
}
