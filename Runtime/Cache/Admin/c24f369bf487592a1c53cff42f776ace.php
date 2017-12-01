<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>管理后台</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
    <link href="/Public/statics/css/admin.css" rel="stylesheet" />
    <script src="/Public/statics/easyui/jquery.min.js"></script>
    <script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
    <script src="/Public/statics/easyui/plugins/jquery.messager.js"></script>
    <script src="/Public/statics/easyui/common.js"></script>
    <script src="/Public/statics/easyui/extend/validate.js"></script>
    <script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
</head>
<body class="easyui-layout" style="overflow-y: hidden" scroll="no">
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<noscript>
    <div style="position: absolute; z-index: 100000; height: 2046px; top: 0px; left: 0px;
            width: 100%; background: white; text-align: center;">
        <img src="images/noscript.gif" alt='抱歉，请开启脚本支持！' />
    </div>
</noscript>
<div data-options="region:'north',border:false" style="height:60px;background:#438EB9;padding-top:10px">
    <div class="topLine">
        <p class="fl">党建后台管理系统</p>
        <p class="fr">
            <span class="welcome">欢迎您：<?php echo ($_SESSION['user']['username']); ?></span><br/>
            <a  title="更新缓存" href="javascript:void(0)" onclick="clearCache()"> <span class="icon icon-arrow_refresh">&nbsp;</span></a>
            <a title="消息" href="#"><span class="icon icon-email">&nbsp;</span></a>
            <a title="设置" href="#" onclick="openSet()"><span class="icon icon-set">&nbsp;</span></a>
            <a title="退出" href="<?php echo U('Admin/Login/logout');?>"><span class="icon icon-door_out">&nbsp;</span></a>
        </p>
    </div>
</div>
<div data-options="region:'west',split:true,title:'菜单',border:false" style="width:150px;padding:10px;">
    <ul id="tt" class="easyui-tree tree">
        <?php if(is_array($data)): foreach($data as $key=>$v): if(empty($v['_data'])): ?><li data-options="iconCls:'<?php echo ($v['ico']); ?>'">
                    <span href="<?php echo U($v['mca']);?>" data-options="iconCls:'icon-add'">
                        <?php echo ($v['name']); ?>
                    </span>
                </li>
                <?php else: ?>
                <li data-options="iconCls:'<?php echo ($v['ico']); ?>'">
                    <span href="#" data-options="iconCls:'icon-add'">
                        <?php echo ($v['name']); ?>
                    </span>
                    <ul>
                        <?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><li data-options="iconCls:'<?php echo ($v['ico']); ?>'" >
                                <span data-options="iconCls:'icon-add'">
                                    <a href="javascript:void(0);" onclick="showTab('<?php echo U($n['mca']);?>','<?php echo ($n['name']); ?>')"><?php echo ($n['name']); ?></a>
                                </span>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </li><?php endif; endforeach; endif; ?>
    </ul>
</div>
<div data-options="region:'center',title:'',border:false,fit:'true'" class="easyui-tabs" id="qfantTabs" style="overflow: hidden">
    <div title="首页" style="padding:20px">

    </div>
</div>
<div id="editInfo" class="easyui-dialog" title="修改信息" style="width:300px;height:250px;" closed="true" modal="true" >
    <form id="editInfoForm" method="post">
        <input type="hidden" name="id" value="">
        <div style="margin-bottom:20px">
            登录账号:<?php echo ($_SESSION['user']['username']); ?>
        </div>
        <div style="margin-bottom:20px">
            <input class="easyui-passwordbox" id="infoPassword"name="password" style="width:100%" data-options="label:'密码:',required:true,validType:'password[6,20]'">
        </div>
        <div style="margin-bottom:20px">
            <input class="easyui-passwordbox" name="password2" style="width:100%" data-options="label:'密码确认:',required:true,validType:'equalTo[\'#infoPassword\']'">
        </div>
        <div style="text-align:center;padding:5px 0">
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="setinfo()" style="width:80px">提交</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" onclick="clearform()" style="width:80px">取消</a>
        </div>
    </form>
</div>
<script>
    function showTab(url,title){
        if ($('#qfantTabs').tabs('exists', title)){
            $('#qfantTabs').tabs('select', title);
        } else {
            var content = '<iframe scrolling="no" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
            $('#qfantTabs').tabs('add',{
                title:title,
                content:content,
                fit:true,
                closable:true
            });
        }

    }
    //清除缓存
    function clearCache(){
        var url="<?php echo U('Admin/System/clearCache');?>";
        $.ajax({
            async:false,
            type:"get",
            url:url,
            success: function(result){
                if(result.status) $.messager.confirm('提示消息','缓存更新成功!',function(r){location.href="<?php echo U('Admin/Login/index');?>";});

            }
        });
    }
    function openSet(){
        $('#editInfo').dialog('open').dialog('setTitle','修改信息');

    }
    //清除缓存
    function setinfo(){
        var url="<?php echo U('Admin/User/setPassword');?>";
        $.ajax({
            async:false,
            type:"post",
            url:url,
            success: function(result){
                if(result.status) $.messager.confirm('提示消息','缓存更新成功!',function(r){location.href="<?php echo U('Admin/Login/index');?>";});

            }
        });
    }
    function clearform(){
        $("#editInfoForm").form('clear');
        $('#editInfo').dialog('close');
    }
</script>
</body>

</html>