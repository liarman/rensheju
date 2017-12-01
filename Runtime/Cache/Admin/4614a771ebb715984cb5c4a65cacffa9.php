<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
    <link href="/Public/statics/kindeditor/themes/default/default.css" rel="stylesheet" />
    <link href="/Public/statics/css/admin.css" rel="stylesheet" />
    <script src="/Public/statics/easyui/jquery.min.js"></script>
    <script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
    <script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
    <script src="/Public/statics/easyui/common.js"></script>
    <script src="/Public/statics/kindeditor/kindeditor-all-min.js"></script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<table id="newsGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/News/ajaxNewsList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true"pageSize="20">
    <thead>
    <tr>
        <th field="title" width="200" >标题</th>
        <th field="logo" width="200" formatter="imgFormatter">封面图</th>
        <th field="cname" width="200" >所属类目</th>
        <th field="createtime" width="200" >发布时间</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addNews()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editNews()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyNews()">删除</a>
</div>
<!-- 添加 -->
<div id="addNews" class="easyui-dialog" title="添加" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="addNewsForm" method="post">
        <table>
            <tr>
                <td>标题:</td>
                <td><input name="title" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>封面图:</td>
                <td><input name="logo" class="easyui-textbox addimg" data-options="delay:1000,required:true,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="addNewsImg" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>所属类目:</td>
                <td>
                    <input id="catAddNews" name="catid" data-options="delay:1000,required:true,multiple:false">
                </td>
            </tr>
            <tr>
                <td>内容:</td>
                <td><textarea name="content" class="addintro" style="width:600px;height:400px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addNewsSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addNews').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editNews" class="easyui-dialog" title="编辑" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="editNewsForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>标题:</td>
                <td><input name="title" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>封面图:</td>
                <td><input name="logo" class="easyui-textbox editimg" data-options="delay:1000,required:true,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="editNewsImg" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>所属类目:</td>
                <td>
                    <input id="catEditNews" name="catid" data-options="delay:1000,required:true,multiple:false">
                </td>
            </tr>
            <tr>
                <td>内容:</td>
                <td><textarea name="content" class="editcontent" style="width:600px;height:400px;visibility:hidden;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editNewsSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editNews').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div class="imgdlg"><img class="simg"></div>
<script type="text/javascript">
    var url;
    function addNews(){
        $('#addNews').dialog('open').dialog('setTitle','发布公告');
        $('#addNewsForm').form('clear');
        $('#catAddNews').combotree({
            url:"<?php echo U('Admin/News/ajaxCatsAll');?>",
            valueField:'id',
            textField:'name',
            multiple:false
        });
        url="<?php echo U('Admin/News/addNews');?>";
    }
    function addNewsSubmit(){
        $('.addintro').val(editor.html());
        $('#addNewsForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#addNews').dialog('close');
                    $('#noticeGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#addNews').dialog('close');
                    $('#newsGrid').datagrid('reload');
                }
            }
        });
        editor.html('');
    }
    function editNewsSubmit(){
        $('.editcontent').val(editor2.html());
        $('#editNewsForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#editNews').dialog('close');
                    $('#newsGrid').datagrid('reload');
                    editor2.html('');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#editNews').dialog('close');
                    $('#newsGrid').datagrid('reload');
                    editor2.html('');
                }
            }
        });
    }
    //编辑会员对话窗
    function editNews(){
        var row = $('#newsGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
        }
        editor2.html(row.content);
        if (row){
            $('#editNews').dialog('open').dialog('setTitle','编辑');
            $('#editNewsForm').form('load',row);
            $('#catEditNews').combobox({
                url:"<?php echo U('Admin/News/ajaxCatsAll');?>",
                valueField:'id',
                textField:'name',
                multiple:false,
                onLoadSuccess: function(){
                    $('#catEditNews').combobox('setValue', row.catid);
                }
            });
            url ="<?php echo U('Admin/News/editNews');?>"+'/id/'+row.id;
        }
    }
    function destroyNews(){
        var row = $('#newsGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
        }
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/News/deleteNews');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#newsGrid').datagrid('reload');    // reload the user data
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
    $(document).ready(function(){
        KindEditor.ready(function(K){
            var editor = K.editor({
                allowFileManager:false
            });
            K('#addNewsImg').click(function() {
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        fileUrl : K('#thumb').val(),
                        clickFn : function(url, title) {
                            $('.addimg').textbox("setValue","<?php echo C('GLOBAL_PIC_URL');?>"+url);
                            editor.hideDialog();
                        }
                    });
                });
            });
            K('#editNewsImg').click(function() {
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        fileUrl : K('#thumb').val(),
                        clickFn : function(url, title) {
                            $('.editimg').textbox("setValue","<?php echo C('GLOBAL_PIC_URL');?>"+url);
                            editor.hideDialog();
                        }
                    });
                });
            });
        });
    });
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('.addintro', {
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
</body>
</html>