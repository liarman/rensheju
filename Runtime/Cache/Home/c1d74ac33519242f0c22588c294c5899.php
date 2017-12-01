<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="/Public/statics/css/reg.css" rel="stylesheet" type="text/css">
    <link href="/Public/statics/css/common.css" rel="stylesheet" type="text/css">
    <title>
        天运信息平台
    </title>
</head>
<body>
<script src="/Public/statics/js/jquery-1.10.2.min.js"></script>    
<script src="/Public/statics/validate/jquery.validate.js"></script>    
<script src="/Public/statics/validate/jquery.validate.extend.js"></script>    
<script src="/Public/statics/validate/messages_zh.js"></script>    

<table width="942" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="200">
            <a href="#" target="_blank">
                <img src="/Public/statics/images/logo.png" width="198" height="55" border="0"/></a>
        </td>
        <td width="8">
            <img src="/Public/statics/images/xian_05.gif" width="8" height="67"/>
        </td>
        <td width="200">
            <div style="padding-left: 10px; padding-top: 10px; font-size: 36px; font-weight: bold;">
                会员注册
            </div>
        </td>
        <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="35" valign="bottom" align="right">
                        <a href="#" target="_blank" style="color: #006EB2">返回首页</a>
                        | <a href="#" target="_blank" style="color: #006EB2">
                        客服中心</a>&nbsp;
                    </td>
                </tr>
                <tr>
                    <td height="25" align="right" valign="bottom">
                        如注册遇到问题，请拨打客服热线：
                        <img src="/Public/statics/images/icon_phone.gif" width="19" height="13"/>
                        <font style="color: #f60">88888888</font>&nbsp;&nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width="946" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="10">
        </td>
    </tr>
    <tr>
        <td height="10" bgcolor="#E3F3FF">
        </td>
    </tr>
</table>
<table width="946" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#E3F3FF">
    <tr>
        <td width="30">&nbsp;

        </td>
        <td width="120">
            <a href="<?php echo U('Home/Reg/selecttype');?>"><span style="font-size: 14px; color: Black">① 选择会员类型</span></a>
        </td>
        <td width="20">&nbsp;

        </td>
        <td width="139" height="33" background="/Public/statics/css/img/zhucebg2.gif" style="font-size: 14px;
                font-weight: bold; text-align: center; color: White;">
            ② 填写帐户信息
        </td>
        <td width="20">&nbsp;

        </td>
        <td style="font-size: 14px;">&nbsp;

        </td>
        <td width="100">
            <span style="color: #FF0000; font-size: 18px; padding-right: 10px">*</span><font
                color="#FF0000">表示必填项！</font>
        </td>
    </tr>
</table>
<div style="width: 936px; margin: 0px auto; padding: 5px; padding-top: 0px; background-color: #E3F3FF;">
    <div style="width: 95%; margin: 8px; margin-top: 0px; border: 2px solid #0B77B9;
            text-align: center; background-color: White; border-top: 4px solid #0B77B9; padding: 20px 10px 5px 10px;
            line-height: 1.5em;">
        <table width="882" border="0" cellspacing="0" cellpadding="0">
            <input type="hidden" name="__token__" value="<?php echo ($Request["token"]); ?>" />
            <tr>
                <td height="28" align="left" valign="top"><font color="black" style="font-size: 14px;"><img
                        src="/Public/statics/images/ico6_7.gif" width="22" height="22"/>
                    &nbsp;感谢您注册&nbsp;<b style="color:red"><?php if($type == 1): ?>货主<?php elseif($type == 2): ?>车主<?php else: ?>物流公司<?php endif; ?></b>，&nbsp;请您准确填写注册信息。如需改变注册会员类型，请点击&nbsp;<a
                            href="<?php echo U('Home/Reg/selecttype');?>" style="color: red; text-decoration: underline">上一步</a>选择会员类型！</font>
                </td>
            </tr>
            <tr>
                <td align="left" height="28">
                    <div style="padding-left:16px; font-size:14px;"><span class="regc">*&nbsp;</span>提醒：物流公司必须提供真实网点信息和具有物流公司的相关资质。
                    </div>

                </td>
            </tr>
            <tr>
                <td align="left">
                    <img src="/Public/statics/images/tb.gif" width="11" height="11"/>
                    <span style="font-size: 14px; font-weight: bold;">填写您的帐户信息</span>
                </td>
            </tr>
            <tr>
                <td height="5">
                </td>
            </tr>
            <tr>
                <td height="1"
                    style="border-bottom: 1px dashed #999999; background: url(/Public/statics/images/xiaobiao.gif)">
                </td>
            </tr>
        </table>
        <form name="form1" method="post" action="" id="form1">
            <table id="Table1" cellpadding="0" cellspacing="0" width="100%" border="0" align="center"
                   style="margin-top: 10px;">
                <tr>
                    <td align="right" width="220" height="40">
                        <span class=font14>会员登录名：</span> <span style="color: #FF0000; font-size: 18px;">*</span>
                    </td>
                    <td align="left">
                        <input name="tbUserName" type="text" id="tbUserName" class="textBox1 required" tip="请输入用户名"/>
                    </td>
                </tr>
                <tr>
                    <td align="right" height="45">
                        <span class=font14>输入登录密码：</span> <span style="color: #FF0000; font-size: 18px">*</span>
                    </td>
                    <td height="45" align="left">
                        <input name="tbPwd" type="password" id="tbPwd" class="textBox1 required" tip="请输入密码"/>
                    </td>
                </tr>
                <tr>
                    <td align="right" height="45">
                        <span class=font14>确认登录密码： </span><span style="color: #FF0000; font-size: 18px">*</span>
                    </td>
                    <td height="45" align="left">
                        <input name="tbEnterPwd" type="password" id="tbEnterPwd" class="textBox1"/>
                    </td>
                </tr>
                <?php if($type == 2): ?><tr>
                        <td height="45" align="right">
                            <span class=font14><label for="carowner">车辆所有人</label>：</span> <span
                                style="color: #FF0000; font-size: 18px">*</span>
                        </td>
                        <td height="45" align="left">
                            <input name="tbRegMan" type="text" id="carowner" class="textBox1"/>
                        </td>
                    </tr>
                    <tr>
                        <td height="45" align="right">
                            <span class=font14><label for="carposition">车辆所在地</label>：</span> <span
                                style="color: #FF0000; font-size: 18px">*</span>
                        </td>
                        <td height="45" align="left">
                            <input name="tbRegMan" type="text" id="carposition" class="textBox1"/>
                        </td>
                    </tr><?php endif; ?>
                <tr>
                    <td height="45" align="right">
                        <span class=font14><label id="lbname">注册人姓名</label>：</span> <span
                            style="color: #FF0000; font-size: 18px">*</span>
                    </td>
                    <td height="45" align="left">
                        <input name="tbRegMan" type="text" id="tbRegMan" class="textBox1"/>
                    </td>
                </tr>

                <tr>
                    <td height="45" align="right">
                        <span class=font14>注册人手机：</span> <span style="color: #FF0000; font-size: 18px">*</span>
                    </td>
                    <td height="45" align="left">
                        <input name="tbRegTel" type="text" id="tbRegTel" class="textBox1"/>
                    </td>
                </tr>
                <?php if($type == 1): ?><tr>
                        <td height="45" align="right">
                            <span class=font14><label for="position">个人所在地</label>：</span> <span
                                style="color: #FF0000; font-size: 18px">*</span>
                        </td>
                        <td height="45" align="left">
                            <input name="tbRegMan" type="text" id="position" class="textBox1"/>
                        </td>
                    </tr><?php endif; ?>
                <tr>
                    <td height="45" align="right">
                        <span class=font14>注册人邮箱：</span><span style="color: #FF0000; font-size: 18px">*</span>
                    </td>
                    <td height="45" align="left">
                        <input name="tbRegMail" type="text" id="tbRegMail" class="textBox1"/>
                    </td>
                </tr>
                <?php if($type == 3): ?><tr>
                        <td height="45" align="right">
                            <span class=font14><label for="companyname">
                                公司名称</label>：</span><span style="color: #FF0000; font-size: 18px">*</span>
                        </td>
                        <td height="45" align="left">
                            <input name="companyname" type="text" id="companyname" class="textBox1"/>
                        </td>
                    </tr>
                    <tr>
                        <td height="45" align="right">
                        <span class=font14><label for="companyposition">
                            公司所在地</label>：</span><span style="color: #FF0000; font-size: 18px">*</span>
                        </td>
                        <td height="45" align="left">
                            <input name="companyposition" type="text" id="companyposition" class="textBox1"/>
                        </td>
                    </tr><?php endif; ?>
                <tr>
                    <td height="45" align="right">
                        <span class=font14><label for="code">
                            验证码</label>：</span><span style="color: #FF0000; font-size: 18px">*</span>
                    </td>
                    <td height="45" align="left" valign="top">
                        <input name="code" type="text" id="code" class="textBox1" style="margin-top: 0px"/>
                        <img id="verify_img" alt="点击更换" title="点击更换" src="<?php echo U('Home/Reg/verify',array());?>" class="m">
                    </td>
                </tr>
                <tr>
                    <td align="right"></td>
                    <td align="left" height="15" >
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td align="left" >
                        <div class="font1" style=" padding-left:10px;">
                            <input type="submit" name="btReg" value="" id="btReg" class="buttontj"/>
                            <p style=" width:146px; text-align:center;font-size:12px; line-height:30px;">
                                <a href="<?php echo U('Home/Reg/agreement');?>" target="_blank"><span style="color:#333">《用户服务协议》</span></a></p>
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<div style="width: 800px; margin: 10px auto; text-align: center; line-height: 30px;">
    <a href="#" target="_blank">关于我们</a>
    | <a href="#" title="挑错有礼" target="_blank"><font
        color="#F83636">挑错有礼</font></a> | <a href="#"
                                             title="招聘英才" target="_blank">诚聘英才</a> | <a
        href="#"
        target="_blank">服务与产品</a> | <a href="#" target="_blank">使用与帮助</a>
    | <a href="#" target="_blank">服务条款</a>
    | <a href="#" target="_blank">加盟我们</a>
    | <a href="#" target="_blank">付款方式</a> |
    <a href="#" target="_blank">友情链接</a> | <a
        href="#" target="_blank">客服中心</a> |
    <a href="#" target="_blank">联系我们</a>
    <br/>
    <span style="color: #999999">天运信息平台 &copy; 2007-2016 客服免费电话:8888888888 许可证号 皖ICP备08010544号</span>
</div>
<script type="text/javascript">
    $("#verify_img").click(function() {
        var verifyURL = "<?php echo U('Home/Reg/verify',array());?>";
        var time = new Date().getTime();
        $("#verify_img").attr({
            "src" : verifyURL + "/" + time
        });
    });
    $("#btReg").click(function() {
        alert($("#form1").validate());
    });
</script>
</body>
</html>