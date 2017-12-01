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
<table id="merchantGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Merchant/ajaxMerchantList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true">
    <thead>
    <tr>
        <th field="name" width="200" >商家名称</th>
        <th field="phone" width="200" >商家电话</th>
        <th field="address" width="200" >商家地址</th>
        <th field="isshow" width="200" formatter="formatStatus">是否显示</th>
        <th field="sort" width="200" >排序</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addMerchant()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editMerchant()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyMerchant()">删除</a>
</div>
<!-- 添加 -->
<div id="addMerchant" class="easyui-dialog" title="添加" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="addMerchantForm" method="post">
        <table>
            <tr>
                <td>商家名称:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
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
                <td>排序:</td>
                <td><input name="sort" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>是否显示:</td>
                <td>
                    <input type="radio" name="isshow" checked="checked" value="1" class="easyui-validatebox addstatus" /><label>显示</label>
                    <input type="radio" name="isshow" value="0" class="easyui-validatebox addstatus" /><label>不显示</label>
                </td>
            </tr>
            <tr>
                <td>详情介绍:</td>
                <td><textarea name="content" class="addcontent" style="width:600px;height:400px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addMerchantSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addMerchant').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editMerchant" class="easyui-dialog" title="编辑" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="editMerchantForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>商家名称:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
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
                <td>排序:</td>
                <td><input name="sort" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
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
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editMerchantSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editMerchant').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<script type="text/javascript">
    var url;
    function addMerchant(){
        $('#addMerchant').dialog('open').dialog('setTitle','添加商家');
        $('#addMerchantForm').form('clear');
        var $radios = $('.addstatus');
        $radios.filter('[value=1]').prop('checked', true);
        url="<?php echo U('Admin/Merchant/add');?>";
    }
    function addMerchantSubmit(){
        $('.addcontent').val(editor.html());
        $('#addMerchantForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#addMerchant').dialog('close');
                    $('#merchantGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#addMerchant').dialog('close');
                    $('#merchantGrid').datagrid('reload');
                }
            }
        });
        editor.html('');
    }
    function editMerchantSubmit(){
        $('.editcontent').val(editor2.html());
        $('#editMerchantForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#editMerchant').dialog('close');
                    $('#merchantGrid').datagrid('reload');
                    editor2.html('');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#editMerchant').dialog('close');
                    $('#merchantGrid').datagrid('reload');
                    editor2.html('');
                }
            }
        });
    }
    function editMerchant(){
        var row = $('#merchantGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
        }
        editor2.html(row.content);
        if (row){
            $('#editMerchant').dialog('open').dialog('setTitle','编辑');
            $('#editMerchantForm').form('load',row);
            url ="<?php echo U('Admin/Merchant/edit');?>"+'/id/'+row.id;
        }
    }
    function destroyMerchant(){
        var row = $('#merchantGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
        }
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Merchant/delete');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#merchantGrid').datagrid('reload');    // reload the user data
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
            val="<span style='color: green'>显示</span>";
        }else {
            val="<span style='color: red'>不显示</span>";
        }
        return val;
    }
</script>
</body>
</html>