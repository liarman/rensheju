<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
	<link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
	<link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
	<link href="/Public/statics/css/admin.css" rel="stylesheet" />
	<script src="/Public/statics/easyui/jquery.min.js"></script>
	<script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
	<script src="/Public/statics/easyui/extend/validate.js"></script>
	<script src="/Public/statics/easyui/common.js"></script>
	<script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
	<h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<table id="roomGrid" class="easyui-datagrid" style="width:92%;height:800px" pagination="true"  toolbar="#toolbar"  data-options="url:'<?php echo U('Admin/Wuyefee/ajaxBatchWuyefee');?>',pageSize:20,pageList: [15, 20, 30],rownumbers:true"singleSelect="true" >
	<thead>
	<tr>
		<th field="name" width="200" >房间</th>
		<th field="jzarea" width="100" >建筑面积</th>
		<th field="areaprice" width="50" >单价</th>
		<th field="uname" width="100" >单元名称</th>
		<th field="bname" width="100" >楼幢名称</th>
		<th field="dname" width="100" >所属小区</th>
		<th field="startdate" width="200" >开始时间</th>
		<th field="enddate" width="200" >结束时间</th>
		<th field="price" width="100" >物业费</th>
		<th field="detail" width="50" formatter="formatWuyefeeDetail">详情</th>
	</tr>
	</thead>
</table>
<div id="toolbar">
	小区:
	<input  class="easyui-combobox" panelHeight="auto"id="roomdistrictsearch" style="width:100px" >
	楼幢:
	<input  class="easyui-combobox" panelHeight="auto"id="roombuildingsearch" style="width:100px">
	单元:
	<input  class="easyui-combobox" panelHeight="auto"id="roomunitsearch" style="width:100px">
	名称: <input class="easyui-textbox" style="width:110px" name="namesearch"id="namesearch">
	时间：<input id="wuyeFeeStartDate" type="text" placeholder="">-<input id="wuyeFeeEndDate" type="text">
	<a href="javascript:void(0)" class="easyui-linkbutton" onclick="doSearch()" iconCls="icon-search">搜索</a><br/>
</div>
<div id="batchWuyefeeList" class="easyui-dialog" title="详情" style="width:400px;padding:10px 20px;height: 600px" closed="true" modal="true">
<table id="monthsWuyefee"></table>
</div>
<script type="text/javascript">
var monthdata=new Dictionary();
	$('#wuyeFeeStartDate').datebox({
		onSelect: function(date){
			var end=$('#wuyeFeeEndDate').datebox("getValue");
			if(end!=""){
				end = Date.parse(end);
				if(end<date.getTime()){
					$.messager.alert('Warning', "开始时间必须小于结束时间", 'info');
					$('#wuyeFeeStartDate').datebox('setValue', '');
				}
			}
		}
	});
	$('#wuyeFeeEndDate').datebox({
		onSelect: function(date){
			var start=$('#wuyeFeeStartDate').datebox("getValue");
			if(start!=""){
				start = Date.parse(start);
				if(date.getTime()<start){
					$.messager.alert('Warning', "结束时间必须小于开始时间", 'info');
					$('#wuyeFeeEndDate').datebox('setValue', '');
				}
			}
		}
	});
	cascade('roomdistrictsearch','roombuildingsearch','roomunitsearch');

	function doSearch(){
		var name=$('#namesearch').textbox("getText");
		var district_id=$('#roomdistrictsearch').combobox('getValue');
		var building_id= $('#roombuildingsearch').combobox('getValue');
		var unit_id=$('#roomunitsearch').combobox('getValue');
		var startdate=$('#wuyeFeeStartDate').combobox('getValue');
		var enddate=$('#wuyeFeeEndDate').combobox('getValue');

		$('#roomGrid').datagrid('load',{
			name: name,
			district_id: district_id,
			building_id: building_id,
			unit_id: unit_id,
			startdate:startdate,
			enddate:enddate
		});
	}
	function doCharge(){
		var price=$('.price').html();
		var checkedrows=$('#roomGrid').datagrid('getChecked');
		var name=$('#namesearch').textbox("getText");
		var district_id=$('#roomdistrictsearch').combobox('getValue');
		var building_id= $('#roombuildingsearch').combobox('getValue');
		var unit_id=$('#roomunitsearch').combobox('getValue');
		var startdate=$('#wuyeFeeStartDate').combobox('getValue');
		var enddate=$('#wuyeFeeEndDate').combobox('getValue');
		if(price<=0){
			$.messager.alert('提示','收费金额不能为0','error');return false;
		}
		if(checkedrows.length <=0){
			$.messager.alert('提示','收费月份不正确','error');return false;
		}
		$.post("<?php echo U('Admin/Wuyefee/ajaxSaveWuyefee');?>",
				{
					price:price,
					name: name,
					district_id: district_id,
					building_id: building_id,
					unit_id: unit_id,
					startdate:startdate,
					enddate:enddate,
					datas:checkedrows
				},function(result){
					$.messager.alert('提示','收费成功','info');
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
	function formatWuyefeeDetail(val,rowData,row){
		console.log(rowData['months']);
		monthdata.put(row,rowData['months']);
		val="<span class='icon icon-detail' onclick='openWuyefee("+row+")'></span>";
		return val;
	}
	function openWuyefee(row){
		$('#batchWuyefeeList').dialog('open').dialog('setTitle','物业费详情');
		console.log(JSON.stringify(monthdata.get(row)));
		var feeList=JSON.stringify(monthdata.get(row));
		feeList=JSON.parse(feeList);;
		$('#monthsWuyefee').datagrid({
			data: feeList,
			columns:[[
				{field:'startdate',title:'开始日期',width:100},
				{field:'enddate',title:'结束日期',width:100},
				{field:'price',title:'金额',width:100,align:'right'}
			]]
		});
	}
function Dictionary(){
	this.data = new Array();

	this.put = function(key,value){
		this.data[key] = value;
	};

	this.get = function(key){
		return this.data[key];
	};

	this.remove = function(key){
		this.data[key] = null;
	};

	this.isEmpty = function(){
		return this.data.length == 0;
	};

	this.size = function(){
		return this.data.length;
	};
}
</script>
</body>
</html>