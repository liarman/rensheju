<?php
error_reporting(0);
class WeixinAction extends Action
{
    private $token;
    private $fun;
    private $data = array();
    private $my = '小肥';
    public function index()
    {
        $this->token = $this->_get('token');
        $weixin      = new Wechat($this->token);
        $data        = $weixin->request();
        $this->data  = $weixin->request();
        $this->my    = C('site_my');
        list($content, $type) = $this->reply($data);
        $weixin->response($content, $type);
    }
    private function reply($data)
    {
        if ('CLICK' == $data['Event']) {
            $data['Content'] = $data['EventKey'];
        }
        if ('subscribe' == $data['Event']) {
            if ($data['home'] == 1) {
                return array(
                    '欢迎您关注谯城区人社局订阅号；您的关注是我们的不竭动力。',
                    'text'
                );
            } else {
                return array(
                    '欢迎您关注谯城区人社局订阅号；您的关注是我们的不竭动力。',
                    'text'
                );
            }
        } elseif ('unsubscribe' == $data['Event']) {

        }
        $key = $data['Content'];
        $imgs=M('Img')->where("keyword like '%".$key."%'")->order('createtime desc')->limit(8)->select();
        if (!(strpos($key, '我有意见') === FALSE)) {
            $data = M('Vote')->where(array())->order('createdate desc')->find();
            return array(
                '有意见请直接回复意见内容，本平台可以直接接受语音、图片、视频、文字。（点击菜单左边的小键盘按钮可以切换到输入模式）',
                'text'
            );
        }else if (!(strpos($key, '摄像头') === FALSE)) {
            return array(
                array(
                    array(
                        '数字化阵地',
                        '数字化阵地',
                        'http://zzb.qfant.com/22.jpg',
                        //C('site_url') . '/index.php?g=Wap&m=Vote&a=index&token=' . $this->token . '&wecha_id=' . $this->data['FromUserName'].'&id='.$data['id']
                         C('site_url') . '/index.php?g=Wap&m=Equipment&a=main&token=' . $this->token
                    )
                ),
                'news'
            );
        }else if(!(strpos($key, '标准化') === FALSE)){
			$imgsarray=array();
			$imgs=M('Img')->where("title like '%标准%'")->order('createtime desc')->limit(8)->select();
			foreach($imgs as $img){
                array_push($imgsarray,array($img['title'],$img['intro'],$img['cover'],C('site_url') . '/index.php?g=Wap&m=Img&a=index&token=' . $this->token.'&wecha_id=' . $this->data['FromUserName'].'&id=' .$img['id']));
            }
            return array(
                $imgsarray,
                'news'
            );
		}else if(!empty($imgs)){
            $imgsarray=array();
            foreach($imgs as $img){
                array_push($imgsarray,array($img['title'],$img['intro'],$img['cover'],C('site_url') . '/index.php?g=Wap&m=Img&a=index&token=' . $this->token.'&wecha_id=' . $this->data['FromUserName'].'&id=' .$img['id']));
            }
            return array(
                $imgsarray,
                'news'
            );
        }
        else {
            return array(
                '您的消息我们已经收到',
                'text'
            );
        }
    }
}
?>