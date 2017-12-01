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
<table id="workerGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Worker/ajaxWorkerList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true">
    <thead>
    <tr>
        <th field="name" width="200" >姓名</th>
        <th field="phone" width="200" >手机号</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addWorker()">添加</a>
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookRepair()">查看订单</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyWorker()">删除</a>
</div>
<!--cha-->
<div id="lookWorker" class="easyui-dialog" title="查看" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="lookWorkerForm" method="post">
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

<!-- 添加 -->
<div id="addWorker" class="easyui-dialog" title="添加" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="addWorkerForm" method="post">
        <table>
            <tr>
                <td>姓名:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>电话:</td>
                <td><input name="phone" class="easyui-textbox" data-options="delay:1000,required:true,validType:'phone',height:30" /></td>
            </tr>
            <tr>
                <td>密码:</td>
                <td><input name="password" class="easyui-textbox" type="password" data-options="delay:1000,required:true,validType:'phone',height:30" /></td>
            </tr>
            <tr>
                <td>imei:</td>
                <td><input name="imei" class="easyui-textbox" data-options="delay:1000,required:true,validType:'phone',height:30" /></td>
            </tr>

            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addWorkerSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addWorker').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>

<script type="text/javascript">

    var url;
    function addWorker(){
        $('#addWorker').dialog('open').dialog('setTitle','添加维修工人');
        $('#addWorkerForm').form('clear');
        url="<?php echo U('Admin/Worker/add');?>";
    }
    function addWorkerSubmit(){

        $('#addWorkerForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#addWorker').dialog('close');
                    $('#workerGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#addWorker').dialog('close');
                    $('#workerGrid').datagrid('reload');
                }
            }
        });
    }

    function destroyWorker(){
        var row = $('#workerGrid').datagrid('getSelected');
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Worker/delete');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#workerGrid').datagrid('reload');    // reload the user data
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
</script>
</body>
</html>