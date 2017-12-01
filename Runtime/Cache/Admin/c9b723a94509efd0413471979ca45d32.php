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
<table id="roomGrid" class="easyui-datagrid" style="width:92%;height:800px" pagination="true"  toolbar="#toolbar" MultipleSelect="true"  data-options="url:'<?php echo U('Admin/Wuyefee/ajaxWuyefeeList');?>',pageSize:20,pageList: [15, 20, 30],rownumbers:true">
	<thead>
	<tr>
		<th field="ck" checkbox="true"></th>
		<th field="name" width="200" >房间</th>
		<th field="uname" width="200" >单元名称</th>
		<th field="bname" width="200" >楼幢名称</th>
		<th field="dname" width="200" >所属小区</th>
		<th field="startdate" width="200" >开始时间</th>
		<th field="enddate" width="200" >结束时间</th>
		<th field="price" width="200" >物业费</th>
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
	<div style="height: 40px;padding-top: 5px;"><a href="javascript:void(0)" class="easyui-linkbutton" onclick="doCharge()" iconCls="icon-sum">收费</a>
		<span style="padding:8px 2px;color:green;font-size:16px;width:200px;">总金额：<b class="price">0</b>元</span></div>
</div>

<script type="text/javascript">
	$('#roomGrid').datagrid({
		onCheck: function(index,field){
			var price=0;
		 	var checkedrows=$(this).datagrid('getChecked');
			$.each(checkedrows,function (index, obj) {
				price=price+parseFloat(obj['price']);
			});
			price=price.toFixed(2);
			$(".price").empty().html(price);
		},
		onUncheck: function(index,field){
			var price=0;
			var checkedrows=$(this).datagrid('getChecked');
			$.each(checkedrows,function (index, obj) {
				price=price+parseFloat(obj['price']);
			});
			price=price.toFixed(2);
			$(".price").empty().html(price);
		},
		onCheckAll:function(index,field){
			var price=0;
			var checkedrows=$(this).datagrid('getChecked');
			$.each(checkedrows,function (index, obj) {
				price=price+parseFloat(obj['price']);
			});
			price=price.toFixed(2);
			$(".price").empty().html(price);
		},
		onUncheckAll:function(index,field){
			var price=0;
			$(".price").empty().html(price);
		}
	});
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
		if( name=="" || district_id=="" || building_id=="" || unit_id==""){
			$.messager.alert('提示','搜索信息不正确','error');
			return false;
		}
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
</script>
</body>
</html>