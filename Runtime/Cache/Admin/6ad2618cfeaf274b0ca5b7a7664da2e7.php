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
<table id="productGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Product/ajaxProductList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true" pageSize="20">
    <thead>
    <tr>
        <th field="name" width="200" >名称</th>
        <th field="pic1" width="200" >图片1</th>
        <th field="pic2" width="200" >图片2</th>
        <th field="pic3" width="200" >图片3</th>
        <th field="categoryname" width="200" >类别</th>
        <th field="price" width="200" >价格</th>
        <th field="marketprice" width="200" >市场价</th>
        <th field="storage" width="200" >库存</th>
        <th field="particular" width="200" formatter="formatParticular">特别推荐</th>
        <th field="status" width="200" formatter="formatStatus">出售状态</th>
        <th field="sort" width="200" >排序</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="addProduct()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editProduct()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="changeStatus()">上/下架</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyProduct()">删除</a>
</div>
<!-- 添加 -->
<div id="addProduct" class="easyui-dialog" title="添加" style="width:800px;height:700px;padding:10px 20px;" closed="true" modal="true">
    <form id="addProductForm" method="post">
        <table>
            <tr>
                <td>标题:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>分类:</td>
                <td><input id="category" name="category" value=""  data-options="delay:1000,required:true,multiple:true">
                    <input id="category_id" name="category_id" value="" type="hidden">
                </td>
            </tr>
            <tr>
                <td>图片1:</td>
                <td><input name="pic1" class="easyui-textbox addimg" data-options="delay:1000,required:true,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="addcategoryimg" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>图片2:</td>
                <td><input name="pic2" class="easyui-textbox addimg1" data-options="delay:1000,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="addcategoryimg1" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>图片3:</td>
                <td><input name="pic3" class="easyui-textbox addimg2" data-options="delay:1000,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="addcategoryimg2" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>价格:</td>
                <td><input name="price" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>分类推荐:</td>
                <td><input type="checkbox" name="recommend" value="1" class="easyui-checkbox"/></td>
            </tr>
            <tr>
                <td>特别推荐:</td>
                <td><input type="checkbox" name="particular" value="1" class="easyui-checkbox"/></td>
            </tr>
            <tr>
                <td>库存:</td>
                <td><input name="storage" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>排序:</td>
                <td><input name="sort" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>详情:</td>
                <td><textarea name="intro" class="addintro" style="width:600px;height:400px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addProductSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addProduct').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editProduct" class="easyui-dialog" title="编辑" style="width:800px;height:700px;padding:10px 20px;" closed="true" modal="true">
    <form id="editProductForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>标题:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>分类:</td>
                <td><input id="category_edit" name="category" value=""  data-options="delay:1000,required:true,multiple:true">
                    <input id="category_edit_id" name="category_id" value="" type="hidden">
                </td>
            </tr>
            <tr>
                <td>图片1:</td>
                <td><input name="pic1" class="easyui-textbox editimg" data-options="delay:1000,required:true,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="editcategoryimg" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>图片2:</td>
                <td><input name="pic2" class="easyui-textbox editimg1" data-options="delay:1000,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="editcategoryimg1" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>图片3:</td>
                <td><input name="pic3" class="easyui-textbox editimg2" data-options="delay:1000,height:30"  />
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" id="editcategoryimg2" style="width:90px">上传</a>
                </td>
            </tr>
            <tr>
                <td>价格:</td>
                <td><input name="price" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>分类推荐:</td>
                <td><input type="checkbox" name="recommend" value="1" class="easyui-checkbox editProductRecommendCheckbox"/></td>
            </tr>
            <tr>
                <td>特别推荐:</td>
                <td><input type="checkbox" name="particular" value="1" class="easyui-checkbox editProductCheckbox"/></td>
            </tr>
            <tr>
                <td>库存:</td>
                <td><input name="storage" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>排序:</td>
                <td><input name="sort" class="easyui-numberbox" data-options="delay:1000,height:30" value="0"/></td>
            </tr>
            <tr>
                <td>内容:</td>
                <td><textarea name="intro" class="editcontent" style="width:600px;height:400px;visibility:hidden;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editProductSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editProduct').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<script>
    var editor3;
    KindEditor.ready(function(K) {
        editor3 = K.create('.addintro', {
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
            K('#addcategoryimg1').click(function() {
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        fileUrl : K('#thumb').val(),
                        clickFn : function(url, title) {
                            $('.addimg1').textbox("setValue","<?php echo C('GLOBAL_PIC_URL');?>"+url);
                            editor.hideDialog();
                        }
                    });
                });
            });
            K('#addcategoryimg2').click(function() {
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        fileUrl : K('#thumb').val(),
                        clickFn : function(url, title) {
                            $('.addimg2').textbox("setValue","<?php echo C('GLOBAL_PIC_URL');?>"+url);
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
            K('#editcategoryimg1').click(function() {
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        fileUrl : K('#thumb').val(),
                        clickFn : function(url, title) {
                            $('.editimg1').textbox("setValue","<?php echo C('GLOBAL_PIC_URL');?>"+url);
                            editor.hideDialog();
                        }
                    });
                });
            });
            K('#editcategoryimg2').click(function() {
                editor.loadPlugin('image', function() {
                    editor.plugin.imageDialog({
                        fileUrl : K('#thumb').val(),
                        clickFn : function(url, title) {
                            $('.editimg2').textbox("setValue","<?php echo C('GLOBAL_PIC_URL');?>"+url);
                            editor.hideDialog();
                        }
                    });
                });
            });
        });
    });

    var url;
    function addProduct(){
        $('#addProduct').dialog('open').dialog('setTitle','添加账号');
        $('#addProductForm').form('clear');
        $('#category').combobox({
            url:"<?php echo U('Admin/Product/ajaxCategoryAll');?>",
            valueField:'id',
            textField:'name',
            multiple:false,
            onChange:function(){
                $("#category_id").val($('#category').combobox('getValues').join(','));
            }
        });
        url="<?php echo U('Admin/Product/add');?>";
    }
    function addProductSubmit(){
        $('.addintro').val(editor3.html());
        $('#addProductForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#addProduct').dialog('close');
                    $('#productGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#addProduct').dialog('close');
                    $('#productGrid').datagrid('reload');
                }
            }
        });
    }
    function editProductSubmit(){
        $('.editcontent').val(editor2.html());
        $('#editProductForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#editProduct').dialog('close');
                    $('#productGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#editProduct').dialog('close');
                    $('#productGrid').datagrid('reload');
                }
            }
        });
    }
    //编辑会员对话窗
    function editProduct(){
        var row = $('#productGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
        }
        if (row){
            $('#editProduct').dialog('open').dialog('setTitle','编辑');
            if(row.particular==1){ $(".editProductCheckbox").attr("checked", true);}
            if(row.recommend==1){ $(".editProductRecommendCheckbox").attr("checked", true);}
            $('#editProductForm').form('load',{
                name:row.name,
                id:row.id,
                pic1:row.pic1,
                pic2:row.pic2,
                pic3:row.pic3,
                price:row.price,
                storage:row.storage,
                marketprice:row.marketprice
            });
            editor2.html(row.intro);
//            alert(row.intro);
            $('#category_edit').combobox({
                url:"<?php echo U('Admin/Product/ajaxCategoryAll');?>/id/"+row.id,
                valueField:'id',
                textField:'name',
                multiple:false,
                onChange:function(){
                    $("#category_edit_id").val($('#category_edit').combobox('getValues').join(','));

                }
            });
            $('#category_edit').combobox('setValue', row.category_id);
            url ="<?php echo U('Admin/Product/edit');?>"+'/id/'+row.id;
        }
    }
    function destroyProduct(){
        var row = $('#productGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
        }
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl="<?php echo U('Admin/Product/delete');?>";
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#productGrid').datagrid('reload');    // reload the user data
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
    
    function changeStatus() {
        var row = $('#productGrid').datagrid('getSelected');
        if (row){
            var durl="<?php echo U('Admin/Product/changestatus');?>/id/"+row.id;
            $.getJSON(durl,{status:row.status},function(result){
                //alert(result.status);return false;
                if (result.status){
                    $('#productGrid').datagrid('reload');    // reload the user data
                } else {
                    $.messager.alert('错误提示',result.message,'error');
                }
            },'json').error(function(data){
                var info=eval('('+data.responseText+')');
                $.messager.confirm('错误提示',info.message,function(r){});
            });
        }
    }

    function formatStatus(val,rowData,row){
        if(val==1){
            val="<span style='color: green'>在售中...</span>";
        }else{
            val="<span style='color: red'>已下架</span>";
        }
        return val;
    }
    function formatParticular(val,rowData,row){
        if(val==1){
            val="<span style='color: green'>是</span>";
        }else {
            val="<span style='color: red'>否</span>";
        }
        return val;
    }
</script>
</body>
</html>