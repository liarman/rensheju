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
<table id="meetGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Meet/ajaxMeetList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true">
    <thead>
    <tr>
        <th field="name" width="200" >会议室名称</th>
        <th field="intro" width="200" >简介</th>
        <th field="tname" width="200" >乡镇</th>
        <th field="url" width="200" >会议室链接</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addMeet()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMeet()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMeet()">删除</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-man" plain="true" onclick="meetusers()">会议人员</a>
</div>

<!-- 添加 -->
<div id="addMeet" class="easyui-dialog" title="添加" style="width:400px;height:350px;padding:10px 20px;" closed="true" modal="true">
    <form id="addMeetForm" method="post">
        <table>
            <tr>
                <td>名称:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>简介:</td>
                <td><textarea name="intro"  class="easyui-textbox" data-options="multiline:true" style="width:300px;height: 100px;"></textarea></td>
            </tr>
            <tr>
                <td>所属乡镇:</td>
                <td>
                    <input id="addmeettownid" name="townid" data-options="delay:1000,required:true,multiple:false">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addMeetSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addMeet').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editMeet" class="easyui-dialog" title="添加" style="width:400px;height:350px;padding:10px 20px;" closed="true" modal="true">
    <form id="editMeetForm" method="post">
        <input name="id" type="hidden" />
        <table>
            <tr>
                <td>名称:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>简介:</td>
                <td><textarea name="intro"  class="easyui-textbox" data-options="multiline:true" style="width:300px;height: 100px;"></textarea></td>
            </tr>
            <tr>
                <td>所属乡镇:</td>
                <td>
                    <input id="editmeettownid" name="townid" data-options="delay:1000,required:true,multiple:false">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editMeetSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editMeet').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="assignMeetAccount" class="easyui-dialog" title="与会人员账号" style="width:200px;padding:10px 20px;height: 400px;" closed="true" modal="true">
    <form id="assignMeetAccountForm" method="post">
        <ul id="accounttree" class="easyui-tree" ></ul>

    </form>
</div>
<script type="text/javascript">

    var url;
    function addMeet(){
        $('#addMeet').dialog('open').dialog('setTitle','添加');
        $('#addMeetForm').form('clear');
        $('#addmeettownid').combobox({
            url:"<?php echo U('Admin/Town/ajaxTownAll');?>",
            valueField:'id',
            textField:'name',
            multiple:false
        });
        url="<?php echo U('Admin/Meet/addMeet');?>";
    }
    function addMeetSubmit(){

        $('#addMeetForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#addMeet').dialog('close');
                    $('#meetGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#addMeet').dialog('close');
                    $('#meetGrid').datagrid('reload');
                }
            }
        });
    }
    function editMeet(){
        var row = $('#meetGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
        }
        if (row){
            $('#editMeet').dialog('open').dialog('setTitle','编辑');
            $('#editMeetForm').form('load',row);
            $('#editmeettownid').combobox({
                url:"<?php echo U('Admin/Town/ajaxTownAll');?>",
                valueField:'id',
                textField:'name',
                multiple:false,
                onLoadSuccess: function(){
                    console.log(row);
                    $('#editmeettownid').combobox('setValue', row.townid);
                }
            });
            url ="<?php echo U('Admin/Meet/editMeet');?>"+'/id/'+row.id;
        }
    }
    function editMeetSubmit(){
        $('#editMeetForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#editMeet').dialog('close');
                    $('#meetGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#editMeet').dialog('close');
                    $('#meetGrid').datagrid('reload');
                }
            }
        });
    }
    function destroyMeet(){
        var row = $('#meetGrid').datagrid('getSelected');
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Meet/deleteMeet');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#meetGrid').datagrid('reload');    // reload the user data
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
    function meetusers(){
        var row = $('#meetGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择一个会议室", 'info');return false;
        }
        $('#assignMeetAccount').dialog('open').dialog('setTitle','与会人员账号');
        $('#assignMeetAccountForm').form('clear');
        $('#accounttree').tree({
            url: "<?php echo U('Admin/Meet/ajaxVillageAccountList');?>/meetid/"+row.id+"/townid/"+row.townid,
            checkbox:true,
            onBeforeLoad: function (node, param) {
                loading = true;
            },
            onLoadSuccess: function (node, data) {
                loading = false;
            },
            onCheck: function (node, checked) {
                if (loading) {
                    return;
                } else {
                    var users=getChecked($('#accounttree').tree('getChecked'));
                    $.post("<?php echo U('Admin/Meet/saveUser');?>", {
                        users: users,
                        meetid: row.id
                    }, function (result) {
                        if (result == "fail")
                            alert("操作失败");
                    });
                }
            }
        });
    }
    function getChecked(nodes){
        var s = '';
        for (var i = 0; i < nodes.length; i++) {
            if (s != '')
                s += ',';
            s += nodes[i].id;
        }
        return s;
    }
</script>
</body>
</html>