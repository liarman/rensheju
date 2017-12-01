<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
    <link href="/Public/statics/kindeditor/themes/default/default.css" rel="stylesheet" />
    <script src="/Public/statics/easyui/jquery.min.js"></script>
    <script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
    <script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
    <script src="/Public/statics/easyui/common.js"></script>
    <script src="/Public/statics/kindeditor/kindeditor-all-min.js"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('.addcontent', {
                allowFileManager : false
            });
        });
        var editor2;
        KindEditor.ready(function(K) {
            editor2 = K.create('.editcontent', {
                allowFileManager : false
            });
        });
    </script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<table id="repairGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Repair/ajaxRepairList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true">
    <thead>
    <tr>
        <th field="pic" width="200" >维修图片</th>
        <th field="intro" width="200" >维修简介</th>
        <th field="phone" width="200" >联系电话</th>
        <th field="address" width="200" >联系地址</th>
        <th field="status" width="200"  formatter="formatStatus">订单状态</th>
        <th field="name" width="200"  formatter="formatRepair">维修工人</th>
        <th field="nickname" width="200" >创建人</th>
        <th field="createtime" width="200">创建时间</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addWater()">添加</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookRepair()">查看订单</a>
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-man" plain="true" onclick="showWorker()">维修工人</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-man" plain="true" onclick="distOrder()">分配订单</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyRepair()">删除</a>
</div>
<!-- 添加 -->
<!--<div id="addWater" class="easyui-dialog" title="添加" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="addWaterForm" method="post">
        <table>
            <tr>
                <td>商家名称:</td>
                <td><input name="title" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>商家电话:</td>
                <td><input name="phone" class="easyui-textbox" data-options="delay:1000,required:true,validType:'phone',height:30" /></td>
            </tr>
            <tr>
                <td>商家地址:</td>
                <td><input name="address" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>是否显示:</td>
                <td>
                    <input type="radio" name="isshow" checked="checked" value="1" class="easyui-validatebox addstatus" /><label>限制</label>
                    <input type="radio" name="isshow" value="0" class="easyui-validatebox addstatus" /><label>不限制</label>
                </td>
            </tr>
            <tr>
                <td>详情介绍:</td>
                <td><input name="intro" class="addcontent" style="width:600px;height:400px;" /></td>
            </tr>
        </table>

    </form>
</div>-->
<div id="chooseWorker" class="easyui-dialog" title="选择工人" style="width:500px;padding:10px 20px;" closed="true" modal="true">
    <form id="chooseWorkerForm" method="post">
        <table>
            <tr>
                <td>选择工人:</td>
                <td><input id="worker" name="worker" value=""  data-options="delay:1000,required:false,multiple:true">
                    <input id="workerid" name="workerid" value="" type="hidden">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="chooseWorkerSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#chooseWorker').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>

<!--<div id="editWater" class="easyui-dialog" title="编辑" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="editWaterForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>商家名称:</td>
                <td><input name="title" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>商家电话:</td>
                <td><input name="phone" class="easyui-textbox" data-options="delay:1000,required:true,validType:'phone',height:30" /></td>
            </tr>
            <tr>
                <td>商家地址:</td>
                <td><input name="address" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>是否显示:</td>
                <td>
                    <input type="radio" name="isshow" checked="checked" value="1" class="easyui-validatebox editstatus" /><label>显示</label>
                    <input type="radio" name="isshow" value="0" class="easyui-validatebox editstatus" /><label>不显示</label>
                </td>
            </tr>
            <tr>
                <td>详情介绍:</td>
                <td><textarea name="content" class="editcontent" style="width:600px;height:400px;visibility:hidden;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editWaterSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editWater').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>-->
<div id="repDlg" class="easyui-dialog" title="业主列表" style="width:600px;padding:10px 20px;height: 400px" closed="true" modal="true">
    <div id="repGrid" style=""></div>
    <!--cha-->
<div id="lookRepair" class="easyui-dialog" title="查看" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="lookRepairForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>维修图片:</td>
                <td><input name="pic" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly" /></td>
            </tr>
            <tr>
                <td>创建人:</td>
                <td><input name="nickname" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly" /></td>
            </tr>
            <tr>
                <td>联系电话:</td>
                <td><input name="phone" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly" /></td>
            </tr>
            <tr>
                <td>订单状态:</td>
                <td>
                    <input type="radio" name="status" checked="checked" value="1" class="easyui-validatebox editstatus" readonly="readonly"/><label>未处理</label>
                    <input type="radio" name="status" value="2" class="easyui-validatebox editstatus" readonly="readonly"/><label>正在派单</label>
                    <input type="radio" name="status" value="3" class="easyui-validatebox editstatus" readonly="readonly"/><label>派单完成</label>
                    <input type="radio" name="status" value="4" class="easyui-validatebox editstatus" readonly="readonly"/><label>已接单</label>
                    <input type="radio" name="status" value="5" class="easyui-validatebox editstatus" readonly="readonly"/><label>维修中</label>
                    <input type="radio" name="status" value="6" class="easyui-validatebox editstatus" readonly="readonly"/><label>已完成</label>
                    <input type="radio" name="status" value="7" class="easyui-validatebox editstatus" readonly="readonly"/><label>已评价</label>
                </td>
            </tr>
            <tr>
                <td>订单详情:</td>
                <td><textarea name="intro" class="editcontent" style="width:300px;height:300px;visibility:hidden;"></textarea></td></td>
            </tr>
            <tr>
                <td>创建时间:</td>
                <td><input name="createtime" class="easyui-textbox" data-options="delay:1000,required:true,validType:'phone',height:30" readonly="readonly"/></td>
            </tr>
        </table>

    </form>
</div>

<script type="text/javascript">
    var url;
    function distOrder(){
        var row = $('#repairGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('错误',"请选择要分配的订单", 'info');return false;
        }
        $('#chooseWorker').dialog('open').dialog('setTitle','分配订单');
        $('#chooseWorkerForm').form('clear');
        $('#worker').combobox({
            url:"<?php echo U('Admin/Repair/ajaxWorkerAll');?>",
            valueField:'id',
            textField:'name',
            onChange:function(){
                $("#workerid").val($('#worker').combobox('getValues').join(','));
            }
        });
        url="<?php echo U('Admin/Repair/editWorker');?>/id/"+row.id;
    }
    function chooseWorkerSubmit(){
        $('#chooseWorkerForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#chooseWorker').dialog('close');
                    $('#repairGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#chooseWorker').dialog('close');
                    $('#repairGrid').datagrid('reload');
                }
            }
        });
    }

    function lookRepair(){
        var row = $('#repairGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('错误',"请选择要查看的订单", 'info');return false;
        }
        editor2.html(row.intro);
        if (row){
            $('#lookRepair').dialog('open').dialog('setTitle','查看订单');
            $('#lookRepairForm').form('load',row);
        }
    }

    function showWorker(){
        var row = $('#repairGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('错误',"请选择要查看的订单", 'info');return false;
        }
        $('#repDlg').dialog('open').dialog('setTitle','维修信息');
        $('#repGrid').datagrid({
            url:"<?php echo U('Admin/Repair/ajaxWorker');?>/workerid/"+row.id,
            columns:[[
                {field:'name',title:'姓名',width:100},
                {field:'phone',title:'手机号',width:200,align:'left'}
            ]]
        });
    }
<!--查看活动-->
    function destroyRepair(){
        var row = $('#repairGrid').datagrid('getSelected');
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Repair/delete');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#repairGrid').datagrid('reload');    // reload the user data
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
    function formatStatus(val,rowData,row){
        if(val==1){
            val="<span style='color: red'>未处理</span>";
        }else if(val==2){
            val="<span style='color: red'>正在派单...</span>";
        }else if(val==3){
            val="<span style='color: red'>派单完成！</span>";
        }else if(val==4){
            val="<span style='color: red'>已接单！</span>";
        }else if(val==5){
            val="<span style='color: red'>维修中...</span>";
        }else if(val==6){
            val="<span style='color: green'>已完成！</span>";
        }else if(val==7){
            val="<span style='color: green'>已评价！</span>";
        }
        return val;
    }
    function  formatRepair(val,rowData,row) {
        if(val== null){
            val="<span style='color: red'>暂未派单！</span>";
        }
        return val;
    }

</script>
</body>
</html>