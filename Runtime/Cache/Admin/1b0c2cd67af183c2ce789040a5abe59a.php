<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
	<link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
	<link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
	<script src="/Public/statics/easyui/jquery.min.js"></script>
	<script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
	<script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
	<script src="/Public/statics/easyui/common.js"></script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
	<h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<table id="buildingGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Building/ajaxBuildingList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true">
	<thead>
	<tr>
		<th field="name" width="200" >楼幢名称</th>
		<th field="dname" width="200" >所属小区</th>
	</tr>
	</thead>
</table>
<div id="toolbar">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addBuilding()">添加</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editBuilding()">编辑</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyBuilding()">删除</a>
	名称: <input class="easyui-textbox" style="width:110px" name="namesearch"id="namesearch">
	小区:
	<input  class="easyui-combobox" panelHeight="auto"id="districtsearch" style="width:100px" data-options="valueField:'id',textField:'name',url:'<?php echo U('Admin/District/ajaxDistrictAll');?>'">
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="doSearch()" iconCls="icon-search">搜索</a>
</div>
<!-- 添加 -->
<div id="addBuilding" class="easyui-dialog" title="添加" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="buildingAddForm" method="post">
		<table>
			<tr>
				<td>名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>小区:</td>
				<td>
					<input  class="easyui-combobox"name="district_id" panelHeight="auto" style="width:100px" data-options="required:true,valueField:'id',textField:'name',url:'<?php echo U('Admin/District/ajaxDistrictAll');?>'">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addBuildingSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addBuilding').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>
	</form>
</div>
<div id="editBuilding" class="easyui-dialog" title="编辑" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="buildingEditForm" method="post">
		<input type="hidden" name="id" value="">
		<table>
			<tr>
				<td>名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>小区:</td>
				<td>
					<input  class="easyui-combobox"name="district_id" panelHeight="auto" style="width:100px" data-options="required:true,valueField:'id',textField:'name',url:'<?php echo U('Admin/District/ajaxDistrictAll');?>'">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editBuildingSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editBuilding').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<script type="text/javascript">
	var url;
	function addBuilding(){
		$('#addBuilding').dialog('open').dialog('setTitle','添加');
		$('#buildingAddForm').form('clear');
		url="<?php echo U('Admin/Building/add');?>";
	}
	function addBuildingSubmit(){
		$('#buildingAddForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#addBuilding').dialog('close');
					$('#buildingGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#addBuilding').dialog('close');
					$('#buildingGrid').datagrid('reload');
				}
			}
		});
	}
	function editBuildingSubmit(){
		$('#buildingEditForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#editBuilding').dialog('close');
					$('#buildingGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#editBuilding').dialog('close');
					$('#buildingGrid').datagrid('reload');
				}
			}
		});
	}
	//编辑会员对话窗
	function editBuilding(){
		var row = $('#buildingGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
		}
		if (row){
			$('#editBuilding').dialog('open').dialog('setTitle','编辑');
			$('#buildingEditForm').form('load',row);
			url ="<?php echo U('Admin/Building/edit');?>"+'/id/'+row.id;
		}
	}
	function destroyBuilding(){
		var row = $('#buildingGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要删除的行", 'info');return false;
		}
		if (row){
			$.messager.confirm('删除提示','真的要删除?',function(r){
				if (r){
					var durl="<?php echo U('Admin/Building/delete');?>";
					$.getJSON(durl,{id:row.id},function(result){
						if (result.status){
							$('#buildingGrid').datagrid('reload');    // reload the user data
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
	function doSearch(){
		$('#buildingGrid').datagrid('load',{
			name: $('#namesearch').val(),
			district_id: $('#districtsearch').combobox('getValue')
		});
	}
</script>
</body>
</html>