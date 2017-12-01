<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
	<link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
	<link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
	<script src="/Public/statics/easyui/jquery.min.js"></script>
	<script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
	<script src="/Public/statics/easyui/extend/validate.js"></script>
	<script src="/Public/statics/easyui/common.js"></script>
	<script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
	<h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<table id="roomGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Room/ajaxRoomList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" >
	<thead>
	<tr>
		<th field="name" width="200" >名称</th>
		<th field="uname" width="200" >单元名称</th>
		<th field="bname" width="200" >楼幢名称</th>
		<th field="dname" width="200" >所属小区</th>
		<th field="jzarea" width="200" >建筑面积（㎡）</th>
		<th field="realarea" width="200" >实际面积（㎡）</th>
		<th field="indate" width="200" >入住时间</th>
		<th field="chargedate" width="200" >收费时间</th>
	</tr>
	</thead>
</table>
<div id="toolbar">
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addRoom()">添加</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editRoom()">编辑</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyRoom()">删除</a>
	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-man" plain="true" onclick="owners()">业主信息</a>
	名称: <input class="easyui-textbox" style="width:110px" name="namesearch"id="namesearch">
	小区:
	<input  class="easyui-combobox" panelHeight="auto"id="roomdistrictsearch" style="width:100px" >
	楼幢:
	<input  class="easyui-combobox" panelHeight="auto"id="roombuildingsearch" style="width:100px">
	单元:
	<input  class="easyui-combobox" panelHeight="auto"id="roomunitsearch" style="width:100px">
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="doSearch()" iconCls="icon-search">搜索</a>
</div>
<!-- 添加 -->
<div id="addRoom" class="easyui-dialog" title="添加" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="roomAddForm" method="post">
		<table>
			<tr>
				<td>名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>小区:</td>
				<td>
					<input  class="easyui-combobox"name="district_id" panelHeight="auto" style="width:100px" id="room_district_id_add" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td>楼幢:</td>
				<td>
					<input  class="easyui-combobox"name="building_id" panelHeight="auto" style="width:100px" id="room_building_id_add" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td>单元:</td>
				<td>
					<input  class="easyui-combobox"name="unit_id" panelHeight="auto" style="width:100px" id="room_unit_id_add" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td>建筑面积（㎡）:</td>
				<td><input name="jzarea" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" /></td>
			</tr>
			<tr>
				<td>实际面积（㎡）:</td>
				<td><input name="realarea" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" /></td>
			</tr>
			<tr>
				<td>入住时间:</td>
				<td><input name="indate" class="easyui-datebox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>收费时间:</td>
				<td><input name="chargedate" class="easyui-datebox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addRoomSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addRoom').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>
	</form>
</div>
<div id="editRoom" class="easyui-dialog" title="编辑" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="roomEditForm" method="post">
		<input type="hidden" name="id" value="">
		<table>
			<tr>
				<td>名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>小区:</td>
				<td>
					<input  class="easyui-combobox"name="district_id" panelHeight="auto" style="width:100px" id="room_district_id_edit" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td>楼幢:</td>
				<td>
					<input  class="easyui-combobox"name="building_id" panelHeight="auto" style="width:100px"id="room_building_id_edit" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td>单元:</td>
				<td>
					<input  class="easyui-combobox"name="unit_id" panelHeight="auto" style="width:100px" id="room_unit_id_edit" data-options="delay:1000,required:true,height:30">
				</td>
			</tr>
			<tr>
				<td>建筑面积（㎡）:</td>
				<td><input name="jzarea" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" /></td>
			</tr>
			<tr>
				<td>实际面积（㎡）:</td>
				<td><input name="realarea" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" /></td>
			</tr>
			<tr>
				<td>入住时间:</td>
				<td><input name="indate" class="easyui-datebox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>收费时间:</td>
				<td><input name="chargedate" class="easyui-datebox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editRoomSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editRoom').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<div id="ownerDlg" class="easyui-dialog" title="业主列表" style="width:600px;padding:10px 20px;height: 400px" closed="true" modal="true">
<div id="ownerGrid" style=""></div>
</div>
<div id="addOwner" class="easyui-dialog" title="添加" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="ownerAddForm" method="post">
		<input name="room_id" type="hidden" id="addOwner_room_id"/>
		<table>
			<tr>
				<td>业主名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>业主电话:</td>
				<td><input name="phone" class="easyui-textbox" data-options="delay:1000,required:true,validType:'mobile',height:30" /></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addOwnerSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addOwner').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<div id="editOwner" class="easyui-dialog" title="编辑" style="width:400px;padding:10px 20px;" closed="true" modal="true">
	<form id="ownerEditForm" method="post">
		<input name="room_id" type="hidden" id="editOwner_room_id"/>
		<input name="id" type="hidden" />
		<table>
			<tr>
				<td>业主名称:</td>
				<td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
			</tr>
			<tr>
				<td>业主电话:</td>
				<td><input name="phone" class="easyui-textbox" data-options="delay:1000,required:true,validType:'mobile',height:30" /></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editOwnerSubmit()" style="width:90px">保存</a>
					<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editOwner').dialog('close')" style="width:90px">取消</a></td>
			</tr>
		</table>

	</form>
</div>
<script type="text/javascript">
	cascade('roomdistrictsearch','roombuildingsearch','roomunitsearch');
	var url;
	function addRoom(){
		$('#addRoom').dialog('open').dialog('setTitle','添加');
		$('#roomAddForm').form('clear');
		url="<?php echo U('Admin/Room/add');?>";
		cascade('room_district_id_add','room_building_id_add','room_unit_id_add');
	}
	function addRoomSubmit(){
		$('#roomAddForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#addRoom').dialog('close');
					$('#roomGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#addRoom').dialog('close');
					$('#roomGrid').datagrid('reload');
				}
			}
		});
	}
	function editRoomSubmit(){
		$('#roomEditForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#editRoom').dialog('close');
					$('#roomGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#editRoom').dialog('close');
					$('#roomGrid').datagrid('reload');
				}
			}
		});
	}
	//编辑会员对话窗
	function editRoom(){
		var row = $('#roomGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
		}
		if (row){
			$('#editRoom').dialog('open').dialog('setTitle','编辑');
			cascade('room_district_id_edit','room_building_id_edit','room_unit_id_edit');
			$('#roomEditForm').form('load',row);
			$('#room_building_id_edit').combobox('setValue', row.building_id);
			$('#room_unit_id_edit').combobox('setValue', row.unit_id);
			url ="<?php echo U('Admin/Room/edit');?>"+'/id/'+row.id;
		}
	}
	function destroyRoom(){
		var row = $('#roomGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要删除的行", 'info');return false;
		}
		if (row){
			$.messager.confirm('删除提示','真的要删除?',function(r){
				if (r){
					var durl="<?php echo U('Admin/Room/delete');?>";
					$.getJSON(durl,{id:row.id},function(result){
						if (result.status){
							$('#roomGrid').datagrid('reload');    // reload the user data
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
		$('#roomGrid').datagrid('load',{
			name: $('#namesearch').val(),
			district_id: $('#roomdistrictsearch').combobox('getValue'),
			building_id: $('#roombuildingsearch').combobox('getValue'),
			unit_id: $('#roomunitsearch').combobox('getValue')
		});
	}
	function cascade(district,building,unit) {
		$("#"+district).combobox({
			url:"<?php echo U('Admin/District/ajaxDistrictAll');?>",
			valueField:'id',
			textField:'name',
			onChange: function(newValue){
				$('#'+building).combobox('clear');
				$('#'+unit).combobox('clear');
				$('#'+building).combobox({
					url:"<?php echo U('Admin/Building/ajaxBuildingAll');?>/district_id/"+newValue,
					valueField:'id',
					textField:'name',
					onChange: function(newValue2){
						$('#'+unit).combobox('clear');
						$('#'+unit).combobox({
							url:"<?php echo U('Admin/Unit/ajaxUnitAll');?>/building_id/"+newValue2,
							valueField:'id',
							textField:'name'
						});
					}
				});
			}
		});
	}
	function owners(){
		var row = $('#roomGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择业主房号", 'info');return false;
		}
		$('#ownerDlg').dialog('open').dialog('setTitle','业主信息');
		$('#ownerGrid').datagrid({
			url:"<?php echo U('Admin/Room/ajaxOwners');?>/room_id/"+row.id,
			columns:[[
				{field:'name',title:'姓名',width:100},
				{field:'phone',title:'电话',width:100,align:'right'}
			]],
			toolbar: [{
				iconCls: 'icon-add',
				handler: function(){addOwner(row.id);}
			},'-',{
				iconCls: 'icon-edit',
				handler: function(){editOwner(row.id);}
			},'-',{
				iconCls: 'icon-remove',
				handler: function(){destroyOwner(row.id)}
			}]
		});
	}
	function addOwner(room_id){
		$('#addOwner').dialog('open').dialog('setTitle','添加');
		$('#ownerAddForm').form('clear');
		$('#addOwner_room_id').val(room_id);
		url="<?php echo U('Admin/Room/addowner');?>";
	}
	function editOwner(room_id){
		var row = $('#ownerGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
		}
		if (row){
			$('#editOwner').dialog('open').dialog('setTitle','编辑');
			$('#ownerEditForm').form('load',row);
			$('#editOwner_room_id').val(room_id);
			url ="<?php echo U('Admin/Room/editowner');?>"+'/id/'+row.id;
		}
	}
	function addOwnerSubmit(){
		$('#ownerAddForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#addOwner').dialog('close');
					$('#ownerGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#addOwner').dialog('close');
					$('#ownerGrid').datagrid('reload');
				}
			}
		});
	}
	function editOwnerSubmit(){
		$('#ownerEditForm').form('submit',{
			url: url,
			onSubmit: function(){
				return $(this).form('validate');
			},
			success:function(data){
				data=$.parseJSON(data);
				if(data.status==1){
					$.messager.alert('Info', data.message, 'info');
					$('#editOwner').dialog('close');
					$('#ownerGrid').datagrid('reload');
				}else {
					$.messager.alert('Warning', data.message, 'info');
					$('#editOwner').dialog('close');
					$('#ownerGrid').datagrid('reload');
				}
			}
		});
	}
	function destroyOwner(){
		var row = $('#ownerGrid').datagrid('getSelected');
		if(row==null){
			$.messager.alert('Warning',"请选择要删除的行", 'info');return false;
		}
		if (row){
			$.messager.confirm('删除提示','真的要删除?',function(r){
				if (r){
					var durl="<?php echo U('Admin/Room/deleteowner');?>";
					$.getJSON(durl,{id:row.id},function(result){
						if (result.status){
							$('#ownerGrid').datagrid('reload');    // reload the user data
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
</script>
</body>
</html>