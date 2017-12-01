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
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src='/tpl/Public/images/loading3.gif'/></h1></div>
        <div id="ordertbs" class="easyui-tabs" style="width:auto;height:auto;">
            <div title="所有订单">
                <table id="allorderGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Order/ajaxAllorderList');?>" pagination="true"  toolbar="#allordertoolbar" singleSelect="true" rownumbers="true">
                    <thead>
                    <tr>
                        <th field="orderno" width="200" >订单号</th>
                        <th field="totalprice" width="200" >总价</th>
                        <th field="nickname" width="200" >买家</th>
                        <th field="address" width="200" >地址</th>
                        <th field="phone" width="200" >联系电话</th>
                        <th field="status" width="200" formatter="formatOrder" >订单状态</th>
                    </tr>
                    </thead>
                </table>
                <div id="allordertoolbar">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookOrder()">查看订单</a>
                    订单号: <input class="easyui-textbox" style="width:110px" name="ordernosearch"id="ordernosearch">
                    <a href="javascript:void(0)" class="easyui-linkbutton" onclick="doSearch()" iconCls="icon-search">搜索</a><br/>
                </div>
            </div>
            <div title="待发货订单">
                <table id="pendingGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Order/ajaxOrderList');?>/status/3" pagination="true"  toolbar="#pendingtoolbar" singleSelect="true" rownumbers="true">
                    <thead>
                    <tr>
                        <th field="orderno" width="200" >订单号</th>
                        <th field="totalprice" width="200" >总价</th>
                        <th field="nickname" width="200" >买家</th>
                        <th field="address" width="200" >地址</th>
                        <th field="phone" width="200" >联系电话</th>
                        <th field="status" width="200" formatter="formatOrder" >订单状态</th>
                    </tr>
                    </thead>
                </table>
                <div id="pendingtoolbar">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookOrder()">查看订单</a>
                </div>
            </div>
            <div title="已发货订单">
                <table id="pendedGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Order/ajaxOrderList');?>/status/5" pagination="true"  toolbar="#pendedtoolbar" singleSelect="true" rownumbers="true">
                    <thead>
                    <tr>
                        <th field="orderno" width="200" >订单号</th>
                        <th field="totalprice" width="200" >总价</th>
                        <th field="nickname" width="200" >买家</th>
                        <th field="address" width="200" >地址</th>
                        <th field="phone" width="200" >联系电话</th>
                        <th field="status" width="200" formatter="formatOrder" >订单状态</th>
                    </tr>
                    </thead>
                </table>
                <div id="pendedtoolbar">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookOrder()">查看订单</a>
                </div>
            </div>
            <div title="取消待审核">
                <table id="cancelGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Order/ajaxOrderList');?>/status/6" pagination="true"  toolbar="#canceltoolbar" singleSelect="true" rownumbers="true">
                    <thead>
                    <tr>
                        <th field="orderno" width="200" >订单号</th>
                        <th field="totalprice" width="200" >总价</th>
                        <th field="nickname" width="200" >买家</th>
                        <th field="address" width="200" >地址</th>
                        <th field="phone" width="200" >联系电话</th>
                        <th field="status" width="200" formatter="formatOrder" >订单状态</th>
                    </tr>
                    </thead>
                </table>
                <div id="canceltoolbar">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookOrder()">查看订单</a>
                </div>
            </div>
            <div title="取已取消订单">
                <table id="canceledGrid" class="easyui-datagrid" style="width:92%;height:800px" url="<?php echo U('Admin/Order/ajaxOrderList');?>/status/7" pagination="true"  toolbar="#canceledtoolbar" singleSelect="true" rownumbers="true">
                    <thead>
                    <tr>
                        <th field="orderno" width="200" >订单号</th>
                        <th field="totalprice" width="200" >总价</th>
                        <th field="nickname" width="200" >买家</th>
                        <th field="address" width="200" >地址</th>
                        <th field="phone" width="200" >联系电话</th>
                        <th field="status" width="200" formatter="formatOrder" >订单状态</th>
                    </tr>
                    </thead>
                </table>
                <div id="canceledtoolbar">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="lookOrder()">查看订单</a>
                </div>
            </div>
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

    <script type="text/javascript">
        function doSearch(){
           
        }


        function formatOrder(val,rowData,row){
        if(val==1){
            val="<span style='color: red'>等待支付</span>";
        }else if(val==2){
            val="<span style='color: red'>订单取消</span>";
        }else if(val==3){
            val="<span style='color: green'>待发货</span>";
        }else if(val==4){
            val="<span style='color: red'>支付失败</span>";
        }else if(val==5){
            val="<span style='color: green'>已发货</span>";
        }else if(val==6){
            val="<span style='color: red'>申请退款</span>";
        }else if(val==7){
            val="<span style='color: green'>退款完成</span>";
        }else if(val==8){
            val="<span style='color: green'>订单完成</span>";
        } else if(val==9){
            val="<span style='color: green'>已评价</span>";
        }
        return val;
    }
</script>
</body>
</html>