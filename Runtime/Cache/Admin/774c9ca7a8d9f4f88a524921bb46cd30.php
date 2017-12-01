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
<table id="unitGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Unit/ajaxUnitList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true">
	<thead>
	<tr>
		<th field="name" width="200" >单元名称</th>
		<th field="bname" width="200" >楼幢名称</th>
		<th field="dname" width="200" >所属小区</th>
	</tr>
	</thead>
</table>
<div id="toolbar">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addUnit()">添加</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUnit()">编辑</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUnit()">删除</a>
	名称: <input class="easyui-textbox" style="width:110px" name="namesearch"id="namesearch">
	小区:
	<input  class="easyui-combobox" panelHeight="auto"id="districtsearch" style="width:100px" >
	楼幢:
	<input  class="easyui-combobox" panelHeight="auto"id="buildingsearch" style="width:100px">
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="doSearch()" iconCls="icon-search">搜索</a>
</div>
<!-- 添加 -->
<div id="addUnit" class="easyui-dialog" title="添加" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="unitAddForm" method="post">
		<table>
			<tr>
				<td>名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>小区:</td>
				<td>
					<input  class="easyui-combobox"name="district_id" panelHeight="auto" style="width:100px" id="unit_district_id_add" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td>楼幢:</td>
				<td>
					<input  class="easyui-combobox"name="building_id" panelHeight="auto" style="width:100px" id="unit_building_id_add" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addUnitSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addUnit').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>
	</form>
</div>
<div id="editUnit" class="easyui-dialog" title="编辑" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="unitEditForm" method="post">
		<input type="hidden" name="id" value="">
		<table>
			<tr>
				<td>名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>小区:</td>
				<td>
					<input  class="easyui-combobox"name="district_id" panelHeight="auto" style="width:100px" id="unit_district_id_edit" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td>楼幢:</td>
				<td>
					<input  class="easyui-combobox"name="building_id" panelHeight="auto" style="width:100px"id="unit_building_id_edit" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editUnitSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editUnit').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<script type="text/javascript">
	cascade('districtsearch','buildingsearch');
	var url;
	function addUnit(){
		$('#addUnit').dialog('open').dialog('setTitle','添加');
		$('#unitAddForm').form('clear');
		url="<?php echo U('Admin/Unit/add');?>";
		cascade('unit_district_id_add','unit_building_id_add');
	}
	function addUnitSubmit(){
		$('#unitAddForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#addUnit').dialog('close');
					$('#unitGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#addUnit').dialog('close');
					$('#unitGrid').datagrid('reload');
				}
			}
		});
	}
	function editUnitSubmit(){
		$('#unitEditForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#editUnit').dialog('close');
					$('#unitGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#editUnit').dialog('close');
					$('#unitGrid').datagrid('reload');
				}
			}
		});
	}
	//编辑会员对话窗
	function editUnit(){
		var row = $('#unitGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
		}
		if (row){
			$('#editUnit').dialog('open').dialog('setTitle','编辑');
			cascade('unit_district_id_edit','unit_building_id_edit');
			$('#unitEditForm').form('load',row);
			$('#unit_building_id_edit').combobox('setValue', row.building_id);
			url ="<?php echo U('Admin/Unit/edit');?>"+'/id/'+row.id;
		}
	}
	function destroyUnit(){
		var row = $('#unitGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要删除的行", 'info');return false;
		}
		if (row){
			$.messager.confirm('删除提示','真的要删除?',function(r){
				if (r){
					var durl="<?php echo U('Admin/Unit/delete');?>";
					$.getJSON(durl,{id:row.id},function(result){
						if (result.status){
							$('#unitGrid').datagrid('reload');    // reload the user data
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
		$('#unitGrid').datagrid('load',{
			name: $('#namesearch').val(),
			district_id: $('#districtsearch').combobox('getValue'),
			building_id: $('#buildingsearch').combobox('getValue')
		});
	}
	function cascade(district,building) {
		$("#"+district).combobox({
			url:"<?php echo U('Admin/District/ajaxDistrictAll');?>",
			valueField:'id',
			textField:'name',
			onChange: function(newValue){
				$('#'+building).combobox('clear');
				$('#'+building).combobox({
					url:"<?php echo U('Admin/Building/ajaxBuildingAll');?>/district_id/"+newValue,
					valueField:'id',
					textField:'name'
				});
			}
		});
	}

</script>
</body>
</html>