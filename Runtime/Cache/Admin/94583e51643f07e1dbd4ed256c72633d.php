<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <script src="/Public/statics/easyui/jquery.min.js"></script>
    <script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
    <script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
    <link rel="stylesheet" href="/Public/statics/easyui/super/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/statics/easyui/super/superRed.css" id="themeCss">
    <script src="/Public/statics/easyui/super/super.js"></script>
    <script src="/tpl/Admin/Public/js/index.js" type="text/javascript" charset="utf-8"></script>
    <link href="/Public/statics/css/admin.css" rel="stylesheet" />
    <script src="/Public/statics/easyui/common.js"></script>
    <script src="/Public/statics/easyui/formatter.js"></script>
    <script src="/Public/statics/easyui/extend/validate.js"></script>
    <script src="/Public/statics/kindeditor/kindeditor-all.js"></script>
    <script src="/Public/statics/kindeditor/lang/zh-CN.js"></script>
    <script type="text/javascript">
        var addTownUrl="<?php echo U('Admin/Town/addTown');?>";
        var editTownUrl="<?php echo U('Admin/Town/editTown');?>";
        var deleteTownUrl="<?php echo U('Admin/Town/deleteTown');?>";
    </script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src="/rensheju1/tpl/Public/images/loading3.gif"/></h1>
</div>
<script src="/tpl/Admin/Public/js/town.js" type="text/javascript" charset="utf-8"></script>
<table id="townGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Town/ajaxTownList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true" idField="id" treeField="name" pageSize="20">
    <thead>
    <tr>
        <th field="name" width="200" >名称</th>
        <th field="longitude" width="200" >经度</th>
        <th field="latitude" width="200" >纬度</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus" plain="true" onclick="addTown()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit" plain="true" onclick="editTown()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-remove" plain="true" onclick="destroyTown()">删除</a>
</div>
<!-- 添加 -->
<div id="addTown" class="easyui-dialog" title="添加" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="addTownForm" method="post">
        <table>
            <tr>
                <td>标题:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>经度:</td>
                <td>
                    <input name="longitude" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" />
                </td>
            </tr>
            <tr>
                <td>纬度:</td>
                <td><input name="latitude" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" /></td>
            </tr>
            <tr>
                <td>基本信息:</td>
                <td><textarea name="baseinfo" class="baseinfo" style="width:600px;height:400px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addTownSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addTown').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editTown" class="easyui-dialog" title="编辑" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="editTownForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>标题:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>经度:</td>
                <td>
                    <input name="longitude" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" />
                </td>
            </tr>
            <tr>
                <td>纬度:</td>
                <td><input name="latitude" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" /></td>
            </tr>
            <tr>
                <td>基本信息:</td>
                <td><textarea name="baseinfo" class="editbaseinfo" style="width:600px;height:400px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editTownSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editTown').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
</body>

</html>