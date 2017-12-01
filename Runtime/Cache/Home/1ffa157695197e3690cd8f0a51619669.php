<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="/Public/statics/css/reg.css" rel="stylesheet" type="text/css">
    <title>
        天运信息平台
    </title>
</head>
<body>
<form name="form1" method="post" action="" id="form1">
    <input type="hidden" name="__token__" value="<?php echo ($Request["token"]); ?>" />
    <div style="width: 790px; margin: 0px auto; background-color: #FFFFFF; height: 60px;">
        <a href="#" target="_blank">
            <img src="/Public/statics/images/logo.png" align="left" alt="会员注册窗口-天运信息平台"
                 title="物流，物流网，物流查询，国际物流，货源，车源，空运，海运，物流新闻，物流信息，物流公司，搬家公司，快递公司，物流加盟。"
                 width="198" height="55" border="0"></a>
        <div style="float: right; padding: 35px; padding-bottom: 0px;">
            <a href="#" title="天运信息平台">物信通</a>
            ｜ <a href="#" target="_blank">线路竞价</a> ｜
            <a href="#" target="_blank">黄金广告位</a>
            ｜ <a href="#" target="_blank" title="网站建设">企业建站</a> ｜
            <a href="#" target="_blank">在线帮助</a>
        </div>
    </div>

    <div style="width: 790px; margin: 0px auto; background-color: #E3F3FF; padding-top: 15px;
        height: 33px;">
        <div style="width: 139px; font-size: 14px; font-weight: bold; text-align: center;
            color: White; background-image: url(/Public/statics/css/img/zhucebg2.gif); height: 23px; padding-top: 10px;
            margin-left: 30px; float: left">
            ① 选择会员类型
        </div>
        <div style="width: 139px; font-size: 14px; text-align: center; height: 23px; padding-top: 10px;
            margin-left: 10px; float: left">
            ② 填写帐户信息
        </div>
        <div style="width: 129px; text-align: center; height: 23px; padding-top: 10px; color: #FF0000;
            float: right">
            * 表示必填项！
        </div>
    </div>
    <div style="width: 790px; margin: 0px auto; padding: 0px; padding-bottom: 5px; background-color: #E3F3FF;">
        <div style="width: 94%; margin: 10px; margin-top: 0px; border: 2px solid #0B77B9;
            text-align: center; background-color: White; border-top: 4px solid #0B77B9; padding: 20px 10px 5px 10px;
            line-height: 1.5em;">
            <table class="table_bg" cellspacing="0" cellpadding="2" width="100%" border="0" height="400">
                <tbody>
                <tr>
                    <td colspan="4" align="left">
                        尊敬的用户，欢迎您注册天运信息平台会员。首先，<font color="#FF0000">请选择适合的会员类型注册</font>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="left" class="top_line" height="1">&nbsp;

                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="13" onmouseover="this.bgColor='#FFF9ED'"
                        onmouseout="this.bgColor='#f5fafe'" bgcolor="#f5fafe">
                        <table width="100%">
                            <tbody>
                            <tr>
                                <td align="left" width="32">
                                    <strong>
                                        <input value="1" name="type" type="radio" id="senders"></strong>
                                </td>
                                <td align="left" class="px14" width="120">
                                    <strong>货&nbsp;&nbsp;&nbsp;&nbsp;主</strong>
                                </td>
                                <td height="45" align="left">
                                    需要发货的个人。可免费发布货物运输信息，免费查询运输车辆及物流公司信息。
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="3">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="13" onmouseover="this.bgColor='#FFF9ED'"
                        onmouseout="this.bgColor='#f5fafe'" bgcolor="#f5fafe">
                        <table width="100%">
                            <tbody>
                            <tr>
                                <td align="left" width="32">
                                    <strong>
                                        <input value="2" name="type" type="radio" id="carowners"></strong>
                                </td>
                                <td align="left" class="px14" width="120">
                                    <strong>车&nbsp;&nbsp;&nbsp;&nbsp;主</strong>
                                </td>
                                <td height="45" align="left">
                                    提供物流运输服务且具备营运资格的车队或个体车主。<br>
                                    可免费发布车辆信息，线路信息，免费查询货源信息。
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="3">
                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="13" onmouseover="this.bgColor='#FFF9ED'"
                        onmouseout="this.bgColor='#e9f5fe'" bgcolor="#e9f5fe">
                        <table width="100%">
                            <tbody>
                            <tr>
                                <td align="left" width="32">
                                    <strong>
                                        <input value="3" name="type" type="radio" id="company" ></strong>
                                </td>
                                <td align="left" width="120" class="px14">
                                    <strong>物流公司</strong>
                                </td>
                                <td height="45" align="left">
                                    提供国内第三方物流运输服务的公司。<br>
                                    可免费发布各省、地、县收货、提货的网点，免费发布物流线路信息，免费查询车源、货源信息。
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" align="left" class="top_line">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" height="45">
                            <tbody>
                            <tr>
                                <td align="center">
                                    &nbsp;<input type="submit" name="bttreg" value="" onclick="return Finish();"
                                                 id="bttreg" class="agree" style="height:33px;width:108px;">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
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
        function Finish() {
            var isok = false;
            for (var i = 0; i < document.getElementsByTagName("input").length; i++) {
                if (document.getElementsByTagName("input").item(i).type == "radio") {
                    if (document.getElementsByTagName("input").item(i).checked) {
                        isok = true;
                        return true;
                    }
                }
            }
            alert("请选择会员类型。");
            return false;
        }
    </script>

</form>


</body>
</html>