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
        var addAdminUrl="<?php echo U('Admin/Rule/add_admin');?>";
        var editAdminUrl="<?php echo U('Admin/Rule/edit_admin');?>";
        var deleteAdminUrl="<?php echo U('Admin/Rule/delete_users');?>";
        var ajaxGroupAllUrl="<?php echo U('Admin/Rule/ajaxGroupAll');?>";
    </script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src="/rensheju1/tpl/Public/images/loading3.gif"/></h1>
</div>
<script src="/tpl/Admin/Public/js/admin_user_list.js" type="text/javascript" charset="utf-8"></script>
<table id="adminUserGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Rule/ajaxUserList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true">
    <thead>
    <tr>
        <th field="username" width="200" >账号</th>
        <th field="groupname" width="200" >用户组</th>
        <th field="email" width="200" >邮箱</th>
        <th field="phone" width="200" >电话</th>
        <th field="status" width="200" formatter="formatStatus">状态</th>
        <th field="last_login_time" width="200"  formatter="Common.TimeFormatter">登录时间</th>
        <th field="last_login_ip" width="200" >登录ip</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus" plain="true" onclick="addAdminUser()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit" plain="true" onclick="editAdminUser()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-remove" plain="true" onclick="destroyAdminUser()">删除</a>
</div>
<!-- 添加 -->
<div id="addAdminUser" class="easyui-dialog" title="添加" style="width:400px;padding:10px 20px;" closed="true" modal="true">
    <form id="addAdminUserForm" method="post">
        <table>
            <tr>
                <td>账号:</td>
                <td><input name="username" class="easyui-textbox" data-options="delay:1000,required:true,validType:'account[6,20]' " /></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input name="password"  class="easyui-passwordbox" data-options="delay:1000,required:true,validType:'password[6,20]' " /></td>
            </tr>
            <tr>
                <td>用户组:</td>
                <td><input id="cc" name="groups" value=""  data-options="delay:1000,required:true,multiple:true">
                    <input id="group_ids" name="group_ids" value="" type="hidden">
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <input type="radio" name="status" checked="checked" value="1" class="easyui-validatebox addstatus" /><label>可用</label>
                    <input type="radio" name="status" value="0" class="easyui-validatebox addstatus" /><label>不可用</label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addAdminUserSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addAdminUser').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editAdminUser" class="easyui-dialog" title="编辑" style="width:400px;padding:10px 20px;" closed="true" modal="true">
    <form id="editAdminUserForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>账号:</td>
                <td><input name="username" class="easyui-textbox" data-options="delay:1000,required:true,validType:'account[6,20]' " /></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input name="password" prompt="不填写则为原密码"  class="easyui-passwordbox" /></td>
            </tr>
            <tr>
                <td>用户组:</td>
                <td><input id="ccd" name="groups" value=""  data-options="delay:1000,required:true,multiple:true">
                    <input id="group_idsd" name="group_ids" value="" type="hidden">
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <input type="radio" name="status"
                           class="easyui-validatebox" checked="checked" value="1"><label>可用</label></input>
                    <input type="radio" name="status"
                           class="easyui-validatebox" value="0"><label>不可用</label></input>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editAdminUserSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editAdminUser').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>

</body>
</html>