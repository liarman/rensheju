/**
 * Created by ZH on 2017/11/23.
 */
var url;
function add(){
    $('#addBind').dialog('open').dialog('setTitle','选择城市');
    $('#addBindForm').form('clear');
    url= addBindkeyUrl;
}

function addBindSubmit(){
    $('#addBindForm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success:function(data){
            data=$.parseJSON(data);
            if(data.status==1){
                $.messager.alert('Info', data.message, 'info');
                $('#addBind').dialog('close');
                $('#BindKeyGrid').datagrid('reload');
            }else {
                $.messager.alert('Warning', data.message, 'info');
                $('#addBind').dialog('close');
                $('#BindKeyGrid').datagrid('reload');
            }
        }
    });
}
/*$(document).ready(function () {
 var addurl=addBindkeyUrl;
 $(".bigbtn").click(function(){
 $.getJSON(addurl, function(data){
 if(data.status==1){
 alert('生成成功！');
 location.href="{:U('Admin/Bindkey/index')}";
 }
 });
 });
 });*/
function destroy(){
    var row = $('#BindKeyGrid').datagrid('getSelected');
    if(row==null){
        $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
    }
    if (row){
        $.messager.confirm('删除提示','真的要删除?',function(r){
            if (r){
                var durl =deleteBindkeyUrl+'/id/'+row.id;
                $.getJSON(durl,{id:row.id},function(result){
                    if (result.status){
                        $('#BindKeyGrid').datagrid('reload');    // reload the user data
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
function  attrValue(val,rowData,row){
    if(val==0){
        val="亳州";
    }else if(val==1){
        val="谯城区";
    }else if(val==2){
        val="涡阳县";
    }else if(val==3){
        val="利辛县";
    }else if(val==4){
        val="蒙城县";
    }else{

    }
    return val;
}

function formatAction(value,row,index){
    id=row.id;
    var del = '<a href="javascript:void(0);" onclick="destroy('+id+')">删除</a>';
    return del;
}

function doSearch(){
    $('#BindKeyGrid').datagrid('load',{
        key: $('#keysearch').val()
    });
}