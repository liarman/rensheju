<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <script src="/Public/statics/easyui/jquery.min.js"></script>
    <script src="/Public/statics/easyui/jquery.easyui.min.js"></script>
    <script src="/Public/statics/easyui/locale/easyui-lang-zh_CN.js"></script>
    <link rel="stylesheet" href="/Public/statics/easyui/super/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/statics/easyui/super/superRed.css" id="themeCss">
    <script src="/Public/statics/easyui/super/super.js"></script>
    <script src="/tpl/Admin/Public/js/index.js" type="text/javascript" charset="utf-8"></script>
    <link href="/Public/statics/css/admin.css" rel="stylesheet" />
    <script src="/Public/statics/easyui/common.js"></script>
    <script src="/Public/statics/easyui/formatter.js"></script>
    <script src="/Public/statics/easyui/extend/validate.js"></script>
    <script src="/Public/statics/kindeditor/kindeditor-all.js"></script>
    <script src="/Public/statics/kindeditor/lang/zh-CN.js"></script>
    <script type="text/javascript">
        var addVillageUrl="<?php echo U('Admin/Villge/addVillage');?>";
        var editVillageUrl="<?php echo U('Admin/Villge/editVillage');?>";
        var deleteVillageUrl="<?php echo U('Admin/Villge/deleteVillage');?>";
        var ajaxTownAllUrl="<?php echo U('Admin/Town/ajaxTownAll');?>";
        var ajaxOpeninfosUrl="<?php echo U('Admin/Village/ajaxOpeninfos');?>";
        var addopeninfoUrl="<?php echo U('Admin/Village/addopeninfo');?>";
        var editopeninfoUrl="<?php echo U('Admin/Village/editopeninfo');?>";
        var deleteopeninfoUrl="<?php echo U('Admin/Village/deleteopeninfo');?>";
    </script>
</head>
<body>
<div id='Loading' style="position:absolute;z-index:1000;top:0px;left:0px;width:100%;height:100%;background:#fff ;text-align:center;padding-top: 10%;">
    <h1><image src="/rensheju1/tpl/Public/images/loading3.gif"/></h1>
</div>
<script src="/tpl/Admin/Public/js/village.js" type="text/javascript" charset="utf-8"></script>
<table id="villageGrid" class="easyui-datagrid" style="width:100%;height:673px" url="<?php echo U('Admin/Village/ajaxVillageList');?>" pagination="true"  toolbar="#toolbar" singleSelect="true" rownumbers="true" pageSize="20">
    <thead>
    <tr>
        <th field="name" width="200" >名称</th>
        <th field="latitude" width="120" >经度</th>
        <th field="longitude" width="120" >纬度</th>
        <th field="contact" width="120" >联系人</th>
        <th field="tel" width="150" >联系电话</th>
        <th field="intro" width="200" >介绍</th>
        <th field="tname" width="200" >乡镇</th>
        <th field="openInfoUrl" width="400" >公开信息链接</th>
    </tr>
    </thead>
</table>
<div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus" plain="true" onclick="addVillage()">添加</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit" plain="true" onclick="editVillage()">编辑</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-remove" plain="true" onclick="destroyVillage()">删除</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-user" plain="true" onclick="openinfos()">公开信息</a>
</div>
<!-- 添加 -->
<div id="addVillage" class="easyui-dialog" title="添加" style="width:800px;height:600px;padding:10px 20px;" closed="true" modal="true">
    <form id="addVillageForm" method="post">
        <table>
            <tr>
                <td>名称:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>经度:</td>
                <td><input name="longitude" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" />
                </td>
            </tr>
            <tr>
                <td>纬度:</td>
                <td><input name="latitude" class="easyui-textbox" data-options="delay:1000,required:true,validType:'checkFloat',height:30" />
                </td>
            </tr>
            <tr>
                <td>联系人:</td>
                <td><input name="contact" class="easyui-textbox" data-options="delay:1000,required:true,height:30" />
                </td>
            </tr>
            <tr>
                <td>联系电话:</td>
                <td><input name="tel"  class="easyui-textbox" data-options="delay:1000,validType:'phone',required:true " />
                </td>
            </tr>
            <tr>
                <td>所属乡镇:</td>
                <td>
                    <input id="town" name="townid" data-options="delay:1000,required:true,multiple:false">
                </td>
            </tr>
            <tr>
                <td>介绍:</td>
                <td><textarea name="intro"  class="easyui-textbox" data-options="multiline:true" style="width:300px;height: 100px;"></textarea></td>
            </tr>
            <tr>
                <td>基本信息:</td>
                <td><textarea name="baseinfo" class="addbaseinfo" style="width:600px;height:400px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addVillageSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addVillage').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editVillage" class="easyui-dialog" title="编辑" style="width:800px;height:650px;padding:10px 20px;" closed="true" modal="true">
    <form id="editVillageForm" method="post">
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>名称:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>经度:</td>
                <td><input name="longitude" class="easyui-textbox" data-options="delay:1000,required:true,height:30" />
                </td>
            </tr>
            <tr>
                <td>纬度:</td>
                <td><input name="latitude" class="easyui-textbox" data-options="delay:1000,required:true,height:30" />
                </td>
            </tr>
            <tr>
                <td>联系人:</td>
                <td><input name="contact" class="easyui-textbox" data-options="delay:1000,required:true,height:30" />
                </td>
            </tr>
            <tr>
                <td>联系电话:</td>
                <td><input name="tel" class="easyui-textbox" data-options="delay:1000,required:true,height:30" />
                </td>
            </tr>
            <tr>
                <td>所属乡镇:</td>
                <td>
                    <input id="townedit" name="townid" data-options="delay:1000,required:true,multiple:false">
                </td>
            </tr>
            <tr>
                <td>介绍:</td>
                <td><textarea name="intro"  class="easyui-textbox" data-options="multiline:true" style="width:300px;height: 100px;"></textarea></td>
            </tr>
            <tr>
                <td>基本信息:</td>
                <td><textarea name="baseinfo" class="editbaseinfo" style="width:600px;height:400px;"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editVillageSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editVillage').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="openinfoDlg" class="easyui-dialog" title="党员信息列表" style="width:600px;padding:10px 20px;height: 400px" closed="true" modal="true">
    <div id="openinfoGrid" style=""></div>
</div>
<div id="addOpeninfo" class="easyui-dialog" title="添加" style="width:450px;padding:10px 20px;" closed="true" modal="true">
    <form id="openinfoAddForm" method="post">
        <input name="village_id" type="hidden" id="addOpeninfoId"/>
        <table>
            <tr>
                <td>姓名:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>身份证号码:</td>
                <td><input name="idcard" class="easyui-textbox" data-options="delay:1000,required:false,validType:'idcard',height:30" /></td>
            </tr>
            <tr>
                <td>性别:</td>
                <td><input name="sex" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>民族:</td>
                <td><input name="nation" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>出生日期:</td>
                <td><input name="birthday" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>学历:</td>
                <td><input name="educational" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>人员类别:</td>
                <td><input name="personalkind" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>所在党支部:</td>
                <td><input name="partybranch" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>加入党组织日期:</td>
                <td><input name="jointime" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>转为正式党员日期:</td>
                <td><input name="turntime" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>工作岗位:</td>
                <td><input name="position" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>家庭住址:</td>
                <td><input name="address" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>联系电话:</td>
                <td><input name="phone" class="easyui-textbox" data-options="delay:1000,required:false,validType:'mobile',height:30" /></td>
            </tr>
            <tr>
                <td>固定电话:</td>
                <td><input name="tel" class="easyui-textbox" data-options="delay:1000,required:false,validType:'phone',height:30" /></td>
            </tr>
            <tr>
                <td>外出流向:</td>
                <td><input name="outwardflow" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="addOpeninfoSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#addOpeninfo').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="editOpeninfo" class="easyui-dialog" title="编辑" style="width:500px;padding:10px 20px;" closed="true" modal="true">
    <form id="openinfoEditForm" method="post">
        <input name="village_id" type="hidden" id="editOpeninfoId"/>
        <input name="id" type="hidden" />
        <table>
            <tr>
                <td>姓名:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>身份证号码:</td>
                <td><input name="idcard" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>性别:</td>
                <td><input name="sex" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>民族:</td>
                <td><input name="nation" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>出生日期:</td>
                <td><input name="birthday" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>学历:</td>
                <td><input name="educational" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>人员类别:</td>
                <td><input name="personalkind" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>所在党支部:</td>
                <td><input name="partybranch" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>加入党组织日期:</td>
                <td><input name="jointime" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>转为正式党员日期:</td>
                <td><input name="turntime" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>工作岗位:</td>
                <td><input name="position" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>家庭住址:</td>
                <td><input name="address" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>联系电话:</td>
                <td><input name="phone" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>固定电话:</td>
                <td><input name="tel" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>外出流向:</td>
                <td><input name="outwardflow" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="editOpeninfoSubmit()" style="width:90px">保存</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#editOpeninfo').dialog('close')" style="width:90px">取消</a></td>
            </tr>
        </table>

    </form>
</div>
<div id="lookOpeninfoIntro" class="easyui-dialog" title="查看" style="width:500px;height:550px;padding:10px 20px;" closed="true" modal="true">
    <form id="lookOpeninfoIntroForm" method="post">
        <input name="village_id" type="hidden" id="lookOpeninfoId"/>
        <input type="hidden" name="id" value="">
        <table>
            <tr>
                <td>姓名:</td>
                <td><input name="name" class="easyui-textbox" data-options="delay:1000,required:true,height:30" /></td>
            </tr>
            <tr>
                <td>身份证号码:</td>
                <td><input name="idcard" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>性别:</td>
                <td><input name="sex" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>民族:</td>
                <td><input name="nation" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>出生日期:</td>
                <td><input name="birthday" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>学历:</td>
                <td><input name="educational" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>人员类别:</td>
                <td><input name="personalkind" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>所在党支部:</td>
                <td><input name="partybranch" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>加入党组织日期:</td>
                <td><input name="jointime" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>转为正式党员日期:</td>
                <td><input name="turntime" class="easyui-datebox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>工作岗位:</td>
                <td><input name="position" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>家庭住址:</td>
                <td><input name="address" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>联系电话:</td>
                <td><input name="phone" class="easyui-textbox" data-options="vaildType:'mobile',delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>固定电话:</td>
                <td><input name="tel" class="easyui-textbox" data-options="vaildType:'phone',delay:1000,required:false,height:30" /></td>
            </tr>
            <tr>
                <td>外出流向:</td>
                <td><input name="outwardflow" class="easyui-textbox" data-options="delay:1000,required:false,height:30" /></td>
            </tr>
            <!--<tr>
              &lt;!&ndash;  <td>详情介绍:</td>
                <td><textarea name="intro" class="editcontent" style="width:300px;height:300px;visibility:hidden;"></textarea></td></td>&ndash;&gt;
                <td>介绍:</td>
                <td><textarea name="intro"  class="easyui-textbox" data-options="multiline:true" style="width:450px;height: 150px;" readonly="readonly"></textarea></td>
            </tr>-->
        </table>
    </form>
</div>


</body>
</html>