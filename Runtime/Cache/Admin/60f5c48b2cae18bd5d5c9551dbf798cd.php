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
        var addGroupUrl="<?php echo U('Admin/Rule/add_group');?>";
        var editGroupUrl="<?php echo U('Admin/Rule/edit_group');?>";
        var ajaxAuthTreeUrl="<?php echo U('Admin/Rule/ajaxAuthTree');?>";
        var ruleGroupUrl="<?php echo U('Admin/Rule/rule_group');?>";
        var deleteGroupUrl="<?php echo U('Admin/Rule/delete_group');?>";
	</script>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
	<h1><image src="/rensheju1/tpl/Public/images/loading3.gif"/></h1>
</div>
<script src="/tpl/Admin/Public/js/group.js" type="text/javascript" charset="utf-8"></script>
<table id="groupGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Rule/ajaxGroup');?>" pagination="true"  toolbar="#toolbar" singleSelect="true">
	<thead>
	<tr>
		<th field="title" width="200" >用户组名称</th>
	</tr>
	</thead>
</table>
<div id="toolbar">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus" plain="true" onclick="addGroup()">添加</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit" plain="true" onclick="editGroup()">编辑</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-remove" plain="true" onclick="destroyGroup()">删除</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-lock" plain="true" onclick="giveAuth()">分配权限</a>
</div>
<!-- 添加 -->
<div id="addGroup" class="easyui-dialog" title="添加" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="addGroupForm" method="post">
		<table>
			<tr>
				<td>用户组名称:</td>
				<td><input name="title" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addGroupSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addGroup').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<div id="editGroup" class="easyui-dialog" title="编辑" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="editGroupForm" method="post">
		<input type="hidden" name="id" value="">
		<table>
			<tr>
				<td>名称:</td>
				<td><input name="title" class="easyui-textbox" data-options="delay:1000,required:true,height:30" id="editRuleTitle"/></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editGroupSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editGroup').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<div id="giveAuthGroup" class="easyui-dialog" title="分配权限" style="width:400px;padding:10px 20px;height: 600px;" closed="true" modal="true">
	<form id="giveAuthForm" method="post">
		<ul id="authtree" class="easyui-tree" ></ul>

	</form>
</div>

</body>
</html>