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
<table id="snapshotGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Snapshot/ajaxSnapshotList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true">
    <thead>
    <tr>
        <th field="pic1" width="200" >图片1</th>
        <th field="pic2" width="200" >图片2</th>
        <th field="pic3" width="200" >图片3</th>
        <th field="intro" width="200" >介绍</th>
        <th field="nickname" width="200" >发布人</th>
        <th field="createtime" width="200" >发布时间</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <!--<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addWater()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="pendingAudit()">待审核列表</a>-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookScomment()">查看评论</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroySnapshot()">删除</a>
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

<div id="shotDlg" class="easyui-dialog" title="快照列表" style="width:600px;padding:10px 20px;height: 400px" closed="true" modal="true">
    <div id="shottbs" class="easyui-tabs" style="width:auto;height:auto;">
        <!--<div id="shotGrid" title="评论列表" style="" rownumbers="true" pagination="true"></div>
        <div id="commentGrid" title="待审核列表" style="" rownumbers="true" pagination="true"></div>-->
        <div title="评论列表">
            <div id="shotGrid" style="" rownumbers="true" pagination="true"></div>
        </div>
        <div title="待审核列表">
            <div id="commentGrid" style="" rownumbers="true" pagination="true"></div>
        </div>
    </div>
     <!--<div id="commentDlg" class="easyui-dialog" title="待审核列表" style="width:600px;padding:10px 20px;height: 400px" closed="true" modal="true">
     <div id="commentGrid" style="" rownumbers="true" pagination="true"></div>-->

    <!--cha-->

<script type="text/javascript">

    function lookScomment(){
        var row = $('#snapshotGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('错误',"请选择要查看的快照", 'info');return false;
        }

        $('#shotDlg').dialog('open').dialog('setTitle','评论列表');
        $('#shotGrid').datagrid({
            url:"<?php echo U('Admin/Snapshot/ajaxScomment');?>/snapshotid/"+row.id,
            columns:[[
                {field:'nickname',title:'昵称',width:100},
                {field:'content',title:'内容',width:200,align:'left'},
                {field:'createtime',title:'评论时间',width:200,align:'left'}
            ]]
        });
        $('#commentGrid').datagrid({
            url:"<?php echo U('Admin/Snapshot/ajaxpendingAudit');?>/snapshotid/"+row.id,
            columns:[[
                {field:'nickname',title:'昵称',width:100},
                {field:'content',title:'内容',width:200,align:'left'},
                {field:'createtime',title:'评论时间',width:200,align:'left'}
            ]],
            toolbar: [{
                iconCls: 'icon-ok',
                handler: function(){changeScommentStatus();}
            }]
        });
    }
    
    /*function pendingAudit() {
        var row = $('#snapshotGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要查看的快照", 'info');return false;
        }
        $('#commentDlg').dialog('open').dialog('setTitle','待审核列表');
        $('#commentGrid').datagrid({
            url:"<?php echo U('Admin/Snapshot/ajaxpendingAudit');?>/snapshotid/"+row.id,
            columns:[[
                {field:'nickname',title:'昵称',width:100},
                {field:'content',title:'内容',width:200,align:'left'},
                {field:'createtime',title:'评论时间',width:200,align:'left'}
            ]],
            toolbar: [{
                iconCls: 'icon-edit',
                handler: function(){changeScommentStatus();}
            }]
        });
    }*/



    function destroySnapshot(){
        var row = $('#snapshotGrid').datagrid('getSelected');
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Snapshot/delete');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#snapshotGrid').datagrid('reload');    // reload the user data
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
    
    function changeScommentStatus() {
        var row = $('#commentGrid').datagrid('getSelected');
        if (row) {
            var durl = "<?php echo U('Admin/Snapshot/changeScommentStatus');?>/id/" + row.id;
            $.getJSON(durl, {status: row.status}, function (result) {
                //alert(result.status);return false;
                if (result.status) {
                    $('#commentGrid').datagrid('reload');    // reload the user data
                } else {
                    $.messager.alert('错误提示', result.message, 'error');
                }
            }, 'json').error(function (data) {
                var info = eval('(' + data.responseText + ')');
                $.messager.confirm('错误提示', info.message, function (r) {
                });
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