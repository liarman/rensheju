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
<table id="menuGrid" class="easyui-treegrid" style="width:92%;height:800px" url="<?php echo U('Admin/Nav/Menus');?>" toolbar="#toolbar" pagination="true" idField="id" treeField="name" >
	<thead>
	<tr>
		<th field="name" width="200">菜单名称</th>
		<th field="mca" width="200">链接地址</th>
		<th field="ico" width="100">菜单图标</th>
		<th field="description" width="200">菜单描述</th>
		<th field="order_number" width="100">菜单排序</th>
	</tr>
	</thead>
</table>
<div id="toolbar">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newMenu()">添加</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMenu()">编辑</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMenu()">删除</a>
</div>
<!-- 添加 -->
<div id="dlg" class="easyui-dialog" title="添加菜单" style="width:400px;padding:10px 20px"
	 closed="true" buttons="#dlg-buttons"  modal="true">
	<form id="fm" method="post">
		<table>
			<tr>
				<td>菜单名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>上级菜单:</td>
				<td>
					<input id="pid" name="pid" url="<?php echo U('Admin/Nav/menuLevel',array('pid'=>0));?>" valueField="id" textField="name">
				</td>
			</tr>
			<tr>
				<td>链接:</td>
				<td><input name="mca" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>图标:</td>
				<td><input name="ico" id="ico" type="text" class="easyui-textbox" data-options="required:true,height:30,delay:1000"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addMenu()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<div id="dlgEdit" class="easyui-dialog" title="编辑菜单" style="width:400px;padding:10px 20px"
	 closed="true" buttons="#dlg-buttons"  modal="true">
	<form id="fmEdit" method="post">
		<input name="id"  type="hidden" data-options="delay:1000,required:true,height:30" />
		<table>
			<tr>
				<td>菜单名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>上级菜单:</td>
				<td>
					<input name="pid" class="easyui-combobox pidedit" valueField="id" textField="name" >
				</td>
			</tr>
			<tr>
				<td>链接:</td>
				<td><input name="mca" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>图标:</td>
				<td><input name="ico" type="text" class="easyui-textbox" data-options="required:true,height:30,delay:1000"></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editMenuSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgEdit').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<script type="text/javascript">
	var url;
	//添加会员对话窗
	function newMenu(){
		$('#dlg').dialog('open').dialog('setTitle','添加菜单');
		$('#fm').form('clear');
		url="<?php echo U('Admin/Nav/add');?>";
	}
	function addMenu(){
		$('#fm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#dlg').dialog('close');
					$('#menuGrid').treegrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#dlg').dialog('close');
					$('#menuGrid').treegrid('reload');
				}
			}
		});
	}
	function editMenuSubmit(){
		$('#fmEdit').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#dlgEdit').dialog('close');
					$('#menuGrid').treegrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#dlgEdit').dialog('close');
					$('#menuGrid').treegrid('reload');
				}
			}
		});
	}
	//编辑会员对话窗
	function editMenu(){
		var row = $('#menuGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
		}
		if (row){
			$('#dlgEdit').dialog('open').dialog('setTitle','编辑');
			$('#fmEdit').form('load',row);
			if(row.pid==0){
				$('.pidedit').combobox('loadData',[{'id':0,'name':'无'}]);
			}else {
				$('.pidedit').combobox('loadData',{});
				$('.pidedit').combobox({url:"<?php echo U('Admin/Nav/menuLevel',array('pid'=>0));?>"});
				$('.pidedit').combobox('setValue', row.pid);
			}
			url ="<?php echo U('Admin/Nav/edit');?>"+'/id/'+row.id;
		}
	}
	function destroyMenu(){
		var row = $('#menuGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要删除的行", 'info');return false;
		}
		if (row){
			$.messager.confirm('删除提示','真的要删除此菜单吗?删除将不能再恢复!',function(r){
				if (r){
					var durl="<?php echo U('Admin/Nav/delete');?>";
					$.getJSON(durl,{id:row.id},function(result){
						if (result.status){
							$('#menuGrid').treegrid('reload');    // reload the user data
						} else {
							$.messager.alert('错误提示',result.message,'error');
						}
					},'json').error(function(data){
						var info=eval('('+data.responseText+')');
						$.messager.confirm('错误提示',info.message,function(r){

						});
					});
				}
			});
		}
	}

	//	function formatAction(value,row,index){
//		if (row.editing){
//			var s = '<a href="#" onclick="saverow(this)">Save</a> ';
//			var c = '<a href="#" onclick="cancelrow(this)">Cancel</a>';
//			return s+c;
//		} else {
//			var e = '<a href="#" onclick="editrow(this)">Edit</a> ';
//			var d = '<a href="#" onclick="deleterow(this)">Delete</a>';
//			return e+d;
//		}
//	}
	$('#pid').combobox({});

</script>
</body>
</html>