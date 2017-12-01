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

</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<table id="EquipmentGrid" class="easyui-datagrid" style="width:92%;height:670px" url="<?php echo U('Admin/Equipment/ajaxEquipmentList');?>" pagination="true" toolbar="#toolbar" singleSelect="true" rownumbers="true" pageSize="20">
    <thead>
    <tr>
        <th field="name" width="290" >设备名称</th>
        <th field="shareid" width="350" >分享id</th>
        <th field="uk" width="200" >分享uk</th>
        <th field="openInfoUrl" width="565" >分享链接</th>
    </tr>
    </thead>
</table>

<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addEquipment()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editEquipment()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyEquipment()">删除</a>


</div>
<!-- 添加 -->
<div id="addEquipment" class="easyui-dialog" title="添加" style="width:450px;height:500px;padding:10px 20px;" closed="true" modal="true">
    <form id="addEquipmentForm" method="post">
        <table>
            <tr>
                <td>名称:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>分享id:</td>
                <td><input name="shareid" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" />
                </td>
            </tr>
            <tr>
                <td>分享uk:</td>
                <td><input name="uk" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" />
                </td>
            </tr>

            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addEquipmentSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addEquipment').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editEquipment" class="easyui-dialog" title="编辑" style="width:450px;height:500px;padding:10px 20px;" closed="true" modal="true">
    <form id="editEquipmentForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>名称:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>分享id:</td>
                <td><input name="shareid" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" />
                </td>
            </tr>
            <tr>
                <td>分享uk:</td>
                <td><input name="uk" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" />
                </td>
            </tr>

            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editEquipmentSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editEquipment').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<script type="text/javascript">

 /*   $(document).ready(function(){
        $('#EquipmentGrid').datagrid({
            url: "<?php echo U('Admin/Equipment/ajaxEquipmentList');?>",
            columns: [[
                {field: 'name', title: '姓名', width: 100},
                {field: 'shareid', title: '分享id', width: 100},
                {field: 'uk', title: 'uk', width: 100},
                {field:'openInfoUrl',title:'查看',width: 100,formatter: btnDetailed}
            ]],
            onLoadSuccess:function(data){
                $("a[name='lookOpenInfoIntroButton']").linkbutton({plain:true,iconCls:'icon-search'});
            },
            toolbar: [{
                iconCls: 'icon-add',
                handler: function () {
                    addEquipment();
                }
            }, '-', {
                iconCls: 'icon-edit',
                handler: function () {
                    editEquipment();
                }
            }, '-', {
                iconCls: 'icon-remove',
                handler: function () {
                    destroyEquipment()
                }
            }]
        })
    });
    function  btnDetailed(value,row,index){
        id=row.id;
        var OpeninfoIntroButton =  '<iframe name="lookOpenInfoIntroButton"  width="99%" height="98%"  frameborder=no  scrolling="no" src="'+value+'" > </iframe>';
        //var OpeninfoIntroButton = '<a href="javascript:void(0);" name="lookOpenInfoIntroButton" class="easyui-linkbutton" src="'+value+'"></a>';
        return OpeninfoIntroButton;
    }*/
    var url;
    function addEquipment(){
        $('#addEquipment').dialog('open').dialog('setTitle','添加');
        $('#addEquipmentForm').form('clear');
        url="<?php echo U('Admin/Equipment/addEquipment');?>";
        cascade('town','village');
    }

    function addEquipmentSubmit(){
        $('#addEquipmentForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#addEquipment').dialog('close');
                    $('#EquipmentGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#addEquipment').dialog('close');
                    $('#EquipmentGrid').datagrid('reload');
                }
            }
        });
    }
    function editEquipmentSubmit(){
        $('#editEquipmentForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#editEquipment').dialog('close');
                    $('#EquipmentGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#editEquipment').dialog('close');
                    $('#EquipmentGrid').datagrid('reload');
                }
            }
        });
    }
    //编辑会员对话窗
    function editEquipment(){
        var row = $('#EquipmentGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
        }
        if (row){
            $('#editEquipment').dialog('open').dialog('setTitle','编辑');
            $('#editEquipmentForm').form('load',row);
            url ="<?php echo U('Admin/Equipment/editEquipment');?>"+'/id/'+row.id;
        }
    }

    function destroyEquipment(){
        var row = $('#EquipmentGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
        }
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Equipment/deleteEquipment');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#EquipmentGrid').datagrid('reload');    // reload the user data
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