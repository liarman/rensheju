<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>管理后台</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="/Public/statics/easyui/jquery.min.js"></script>
    <script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
    <script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
    <link href="/Public/statics/css/admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Public/statics/easyui/super/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/statics/easyui/super/superRed.css" id="themeCss">
    <script src="/Public/statics/easyui/super/super.js"></script>
    <script src="/tpl/Admin/Public/js/index.js" type="text/javascript" charset="utf-8"></script>


    <script src="/Public/statics/easyui/common.js"></script>
    <script src="/Public/statics/easyui/formatter.js"></script>
    <script src="/Public/statics/easyui/extend/validate.js"></script>
    <script type="text/javascript">
        var LogoutUrl= "<?php echo U('Admin/Login/logout');?>";
        var LoginUrl= "<?php echo U('Admin/Login/index');?>";
    </script>
    <script src="/tpl/Admin/Public/js/index.js" type="text/javascript" charset="utf-8"></script>

</head>
<body id="main" class="easyui-layout">

<!--顶部-->
<div data-options="region:'north',border:false" class="super-north">
    <!--顶部-->
    <div class="super-navigation">
        <!--系统名称-->
        <div class="super-navigation-title">后台管理系统</div>
        <!--自定义导航-->
        <div class="super-navigation-main">
            <div class="super-setting-left">
                <ul>

                </ul>
            </div>
            <div class="super-setting-right">
                <ul>
                    <li>
                        <div class="super-setting-icon" style="width: 100%;height: 100%;display: flex;align-items: center;justify-content: center;">
                            <i class="fa fa-gears"></i>
                        </div>
                        <div id="mm" class="easyui-menu">
                            <div id="clearCache"><a ></a>更新缓存</div>
                            <div id="set"> <a ></a>设置</div>
                            <div id="themeSetting">主题</div>
                            <div class="menu-sep"></div>
                            <div id="logout"><a onclick="logout()"></a>退出</div>
                        </div>
                    </li>
                    <li class="user">
                        <span class="user-icon">欢迎您：<?php echo ($_SESSION['user']['username']); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--左侧菜单-->
<div data-options="region:'west',title:'菜单',border:false" class="super-west">
    <div class="easyui-accordion" data-options="border:false,fit:true,selected:true">
        <?php if(is_array($data)): foreach($data as $key=>$v): if(empty($v['_data'])): ?><div title= "<?php echo ($v['name']); ?>" data-options="iconCls:'<?php echo ($v['ico']); ?>'"></div>
                <?php else: ?>
                <div  title= <?php echo ($v['name']); ?> data-options="iconCls:'<?php echo ($v['ico']); ?>'">
                    <ul>
                        <?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><li data-url="<?php echo U($n['mca']);?>" >
                                <?php echo ($n['name']); ?>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div><?php endif; endforeach; endif; ?>
    </div>
</div>


</div>
<div data-options="region:'center'" style="padding-top: 2px;">
    <!--主要内容-->
    <div id="qfantTabs" class="easyui-tabs" data-options="border:false,fit:true">
        <div title="首页" data-options="iconCls:'fa fa-home'">

        </div>
    </div>
</div>
<div data-options="region:'south'" class="super-south">
    <!--页脚-->
    <div class="super-footer-info">
        <!--<span><i class="fa fa-info-circle"></i></span>-->
        <span><i class="fa fa-copyright"></i>启凡科技 CopyRight 2017 版权所有 <i class="fa fa-caret-right"></i></span>
    </div>
</div>


<!--主题设置弹窗-->
<div id="win">
    <div class="themeItem">
        <ul>
            <li>
                <div class="superGreen" style="background: #1abc9c;">green</div>
            </li>
            <li class="themeActive">
                <div class="superBlue" style="background: #3498db;">blue</div>
            </li>
            <li>
                <div class="superGray" style="background: #95a5a6;">gray</div>
            </li>
            <li>
                <div class="superAmethyst" style="background: #9b59b6;">amethyst</div>
            </li>
            <li>
                <div class="superBlack" style="background: #34495e;">black</div>
            </li>
            <li>
                <div class="superYellow" style="background: #e67e22;">yellow</div>
            </li>
            <li>
                <div class="superEmerald" style="background: #2ecc71;">emerald</div>
            </li>
            <li>
                <div class="superRed" style="background: #e74c3c;">red</div>
            </li>
        </ul>
    </div>
</div>

<div id="editInfo" class="easyui-dialog" title="修改信息" style="width:460px;height:300px;" closed="true" modal="true" >
    <form id="editInfoForm" method="post">
        <input type="hidden" name="id" value="">
        <div style="margin-bottom:20px">
            <input class="easyui-textbox" id="username"name="name" style="width:80%" data-options="label:'登录账号:'" value=" <?php echo ($_SESSION['user']['username']); ?>" disabled="true" >

        </div>
        <div style="margin-bottom:20px">
            <input class="easyui-passwordbox" id="infoPassword"name="password" style="width:80%" data-options="label:'密码:',required:true,validType:'password[6,20]'">
        </div>
        <div style="margin-bottom:20px">
            <input class="easyui-passwordbox" name="password2" style="width:80%" data-options="label:'密码确认:',required:true,validType:'equalTo[\'#infoPassword\']'">
        </div>
        <div style="text-align:center;padding:5px 0">
            <a id="submit"    class="easyui-linkbutton" style="width:80px">提交</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearform()" style="width:80px">取消</a>
        </div>
    </form>
</div>

</body>

</html>