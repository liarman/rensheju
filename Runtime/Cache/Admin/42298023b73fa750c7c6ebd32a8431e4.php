<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
	<link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
	<link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
	<script src="/Public/statics/easyui/jquery.min.js"></script>
	<script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
	<script src="/Public/statics/easyui/common.js"></script>
	<script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
	<h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<table id="districtGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/District/ajaxDistrictList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true">
	<thead>
	<tr>
		<th field="name" width="200" >小区名称</th>
	</tr>
	</thead>
</table>
<div id="toolbar">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addDistrict()">添加</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editDistrict()">编辑</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyDistrict()">删除</a>
</div>
<!-- 添加 -->
<div id="addDistrict" class="easyui-dialog" title="添加" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="addDistrictForm" method="post">
		<table>
			<tr>
				<td>小区名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addDistrictSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addDistrict').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<div id="editDistrict" class="easyui-dialog" title="编辑" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="editDistrictForm" method="post">
		<input type="hidden" name="id" value="">
		<table>
			<tr>
				<td>名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" id="editRuleTitle"/></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editDistrictSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editDistrict').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<script type="text/javascript">
	var url;
	function addDistrict(){
		$('#addDistrict').dialog('open').dialog('setTitle','添加');
		$('#addDistrictForm').form('clear');
		url="<?php echo U('Admin/District/add');?>";
	}
	function addDistrictSubmit(){
		$('#addDistrictForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#addDistrict').dialog('close');
					$('#districtGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#addrule').dialog('close');
					$('#districtGrid').datagrid('reload');
				}
			}
		});
	}
	function editDistrictSubmit(){
		$('#editDistrictForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#editDistrict').dialog('close');
					$('#districtGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#editDistrict').dialog('close');
					$('#districtGrid').datagrid('reload');
				}
			}
		});
	}
	//编辑会员对话窗
	function editDistrict(){
		var row = $('#districtGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
		}
		if (row){
			$('#editDistrict').dialog('open').dialog('setTitle','编辑');
			$('#editDistrictForm').form('load',row);
			url ="<?php echo U('Admin/District/edit');?>"+'/id/'+row.id;
		}
	}
	function destroyDistrict(){
		var row = $('#districtGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要删除的行", 'info');return false;
		}
		if (row){
			$.messager.confirm('删除提示','真的要删除?',function(r){
				if (r){
					var durl="<?php echo U('Admin/District/delete');?>";
					$.getJSON(durl,{id:row.id},function(result){
						if (result.status){
							$('#districtGrid').datagrid('reload');    // reload the user data
						} else {
							$.messager.alert('错误提示',result.message,'error');
						}
					},'json').error(function(data){
						var info=eval('('+data.responseText+')');
						$.messager.confirm('错误提示',info.message,function(r){});
					});
				}
			});
		}
	}
	function getChecked(nodes){
		var s = '';
		for (var i = 0; i < nodes.length; i++) {
			if (s != '')
				s += ',';
			s += nodes[i].id;
		}
		return s;
	}
</script>
</body>
</html>