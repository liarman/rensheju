<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
    <link href="/Public/statics/kindeditor/themes/default/default.css" rel="stylesheet" />
    <script src="/Public/statics/easyui/jquery.min.js"></script>
    <script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
    <script src="/Public/statics/easyui/extend/validate.js"></script>
    <script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
    <script src="/Public/statics/easyui/common.js"></script>
    <script src="/Public/statics/kindeditor/kindeditor-all-min.js"></script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<form id="configForm" method="post">
    <table>
        <tr>
            <td>物业费价格:</td>
            <td><input name="wuyeprice" class="easyui-textbox" value="<?php echo ($data["configvalue"]); ?>" data-options="delay:1000,required:true,validType:'checkFloat',height:30" /></td>
        </tr>
        <tr>
            <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="configSubmit()" style="width:90px">保存</a></td>
        </tr>
    </table>

</form>
<script type="text/javascript">
    var url;
    url="<?php echo U('Admin/Config/index');?>";
    function configSubmit(){
        $('#configForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                }
            }
        });
    }
</script>
</body>
</html>