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
<table id="activityGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Activity/ajaxActivityList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true">
    <thead>
    <tr>
        <th field="title" width="200" >活动名称</th>
        <th field="pic" width="200" >活动图片</th>
        <th field="time" width="200" >活动时间</th>
        <th field="place" width="200" >活动地点</th>
        <th field="islimit" width="200"  formatter="formatStatus">是否限制人数</th>
        <th field="persons" width="200" >限制人数</th>
        <th field="customerid" width="200" >发布人</th>
        <th field="createtime" width="200">发布时间</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addWater()">添加</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookActivity()">查看</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-man" plain="true" onclick="showCustomer()">查看参与者</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyActivity()">删除</a>
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
<div id="ownerDlg" class="easyui-dialog" title="业主列表" style="width:600px;padding:10px 20px;height: 400px" closed="true" modal="true">
<div id="ownerGrid" style=""></div>

    <!--cha-->
<div id="lookActivity" class="easyui-dialog" title="查看" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="lookActivityForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>活动名称:</td>
                <td><input name="title" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly" /></td>
            </tr>
            <tr>
                <td>活动图片:</td>
                <td><input name="pic" class="easyui-textbox" data-options="delay:1000,required:true,validType:'phone',height:30" readonly="readonly"/></td>
            </tr>
            <tr>
                <td>活动时间:</td>
                <td><input name="time" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly"/></td>
            </tr>
            <tr>
                <td>活动地点:</td>
                <td><input name="place" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly"/></td>
            </tr>
            <tr>
                <td>是否限制人数:</td>
                <td>
                    <input type="radio" name="islimit" checked="checked" value="1" class="easyui-validatebox editstatus" readonly="readonly"/><label>限制</label>
                    <input type="radio" name="islimit" value="0" class="easyui-validatebox editstatus" readonly="readonly"/><label>不限制</label>
                </td>
            </tr>
            <tr>
                <td>限制人数:</td>
                <td><input name="persons" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly"/></td>
            </tr>
            <tr>
                <td>详情介绍:</td>
                <td><textarea name="intro" class="editcontent" style="width:300px;height:300px;visibility:hidden;"></textarea></td></td>
            </tr>
            <tr>
                <td>发布人:</td>
                <td><input name="customerid" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly"/></td>
            </tr>
            <tr>
                <td>发布时间:</td>
                <td><input name="createtime" class="easyui-textbox" data-options="delay:1000,required:true,height:30" readonly="readonly"/></td>
            </tr>
        </table>

    </form>
</div>

<script type="text/javascript">


    function lookActivity(){
        var row = $('#activityGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('错误',"请选择要查看的行", 'info');return false;
        }
        editor2.html(row.intro);
        if (row){
            $('#lookActivity').dialog('open').dialog('setTitle','查看活动');
            $('#lookActivityForm').form('load',row);
        }
    }
<!--查看活动-->

    function showCustomer(){
        var row = $('#activityGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('错误',"请选择要查看的活动", 'info');return false;
        }
        $('#ownerDlg').dialog('open').dialog('setTitle','参与者信息');
        $('#ownerGrid').datagrid({
            url:"<?php echo U('Admin/Activity/ajaxCustomer');?>/activityid/"+row.id,
            columns:[[
                {field:'nickname',title:'姓名',width:100},
                {field:'phone',title:'手机号',width:200,align:'left'},
                {field:'jointime',title:'参加时间',width:200,align:'left'}
            ]]
        });
    }
<!--查看参与者-->
    function destroyActivity(){
        var row = $('#activityGrid').datagrid('getSelected');
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Activity/delete');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#activityGrid').datagrid('reload');    // reload the user data
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
            val="<span style='color: green'>限制</span>";
        }else {
            val="<span style='color: red'>不限制</span>";
        }
        return val;
    }
</script>
</body>
</html>