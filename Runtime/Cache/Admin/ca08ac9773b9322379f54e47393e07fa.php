<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <link href="/Public/statics/easyui/themes/default/easyui.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/color.css" rel="stylesheet" />
    <link href="/Public/statics/easyui/themes/icon.css" rel="stylesheet" />
    <link href="/Public/statics/kindeditor/themes/default/default.css" rel="stylesheet" />
    <script src="/Public/statics/easyui/jquery.min.js"></script>
    <script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
    <script src="/Public/statics/easyui/common.js"></script>
    <script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
    <script src="/Public/statics/kindeditor/kindeditor-all-min.js"></script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
<table id="categoryGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Category/ajaxCategoryList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true" idField="id" treeField="name">
    <thead>
    <tr>
        <th field="name" width="200" >名称</th>
        <th field="imgurl" width="200" >图片地址</th>
        <th field="sort" width="200" >排序</th>
        <th field="recommend" width="200" formatter="formatRecommend">首页推荐</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addCategory()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editCategory()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyCategory()">删除</a>
</div>
<!-- 添加 -->
<div id="addCategory" class="easyui-dialog" title="添加" style="width:500px;padding:10px 20px;" closed="true" modal="true">
    <form id="addCategoryForm" method="post">
        <table>
            <tr>
                <td>标题:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>上级分类:</td>
                <td>
                    <input id="pid" name="pid" url="<?php echo U('Admin/Category/categoryLevel',array('pid'=>0));?>" valueField="id" textField="name">
                </td>
            </tr>
            <tr>
                <td>图片:</td>
                <td><input name="imgurl" class="easyui-textbox addimg" data-options="delay:1000,required:true,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="addcategoryimg" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>排序:</td>
                <td><input name="sort" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>首页推荐:</td>
                <td><input type="checkbox" name="recommend" value="1" class="easyui-checkbox"/></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addCategorySubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addCategory').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editCategory" class="easyui-dialog" title="编辑" style="width:500px;padding:10px 20px;" closed="true" modal="true">
    <form id="editCategoryForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>标题:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>上级菜单:</td>
                <td>
                    <input name="pid" class="easyui-combobox pidedit" valueField="id" textField="name" >
                </td>
            </tr>
            <tr>
                <td>图片:</td>
                <td><input name="imgurl" class="easyui-textbox editimg" data-options="delay:1000,required:true,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="editcategoryimg" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>排序:</td>
                <td><input name="sort" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>特别推荐:</td>
                <td><input type="checkbox" name="recommend" value="1" class="easyui-checkbox editcategoryCheckbox"/></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editCategorySubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editCategory').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        KindEditor.ready(function(K){
            var editor = K.editor({
                allowFileManager:false
            });
            K('#addcategoryimg').click(function() {
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
            K('#editcategoryimg').click(function() {
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
    var url;
    function addCategory(){
        $('#addCategory').dialog('open').dialog('setTitle','添加轮播图');
        $('#addCategoryForm').form('clear');
        $('#pid').combobox({});
        url="<?php echo U('Admin/Category/add');?>";
    }
    function addCategorySubmit(){
        $('#addCategoryForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#addCategory').dialog('close');
                    $('#categoryGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#addCategory').dialog('close');
                    $('#categoryGrid').datagrid('reload');
                }
            }
        });
    }
    function editCategorySubmit(){
        $('#editCategoryForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#editCategory').dialog('close');
                    $('#categoryGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#editCategory').dialog('close');
                    $('#categoryGrid').datagrid('reload');
                }
            }
        });
    }
    //编辑会员对话窗
    function editCategory(){
        var row = $('#categoryGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
        }
        if (row){
            $('#editCategory').dialog('open').dialog('setTitle','编辑');
            $('#editCategoryForm').form('load',row);
            if(row.recommend==1){ $(".editcategoryCheckbox").attr("checked", true);}
            if(row.pid==0){
                $('.pidedit').combobox('loadData',[{'id':0,'name':'无'}]);
            }else {
               // $('.pidedit').combobox('loadData',{});
                $('.pidedit').combobox({url:"<?php echo U('Admin/Category/categoryLevel',array('pid'=>0));?>"});
                $('.pidedit').combobox('setValue', row.pid);
            }
            url ="<?php echo U('Admin/Category/edit');?>"+'/id/'+row.id;
        }
    }
    function destroyCategory(){
        var row = $('#categoryGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
        }
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Category/delete');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#categoryGrid').datagrid('reload');    // reload the user data
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
    $('#pid').combobox({});
    function formatRecommend(val,rowData,row){
        if(val==1){
            val="<span style='color: green'>是</span>";
        }else {
            val="<span style='color: red'>否</span>";
        }
        return val;
    }
</script>
</html>