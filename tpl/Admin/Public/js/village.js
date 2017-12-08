
var editor;
KindEditor.ready(function(K) {
    editor = K.create('.addbaseinfo', {
        allowFileManager : false
    });
});
var editor2;
KindEditor.ready(function(K) {
    editor2 = K.create('.editbaseinfo', {
        allowFileManager : false
    });
});
var url;
function addVillage(){
    $('#addVillage').dialog('open').dialog('setTitle','添加');
    $('#addVillageForm').form('clear');
    $('#town').combobox({
        url:ajaxTownAllUrl,
        valueField:'id',
        textField:'name',
        multiple:false
    });
    url=addVillageUrl;
}

function addVillageSubmit(){
    $('.addbaseinfo').val(editor.html());
    $('#addVillageForm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success:function(data){
            data=$.parseJSON(data);
            if(data.status==1){
                $.messager.alert('Info', data.message, 'info');
                $('#addVillage').dialog('close');
                $('#villageGrid').datagrid('reload');
            }else {
                $.messager.alert('Warning', data.message, 'info');
                $('#addVillage').dialog('close');
                $('#villageGrid').datagrid('reload');
            }
        }
    });
}
function editVillageSubmit(){
    $('.editbaseinfo').val(editor2.html());
    $('#editVillageForm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success:function(data){
            data=$.parseJSON(data);
            if(data.status==1){
                $.messager.alert('Info', data.message, 'info');
                $('#editVillage').dialog('close');
                $('#villageGrid').datagrid('reload');
            }else {
                $.messager.alert('Warning', data.message, 'info');
                $('#editVillage').dialog('close');
                $('#villageGrid').datagrid('reload');
            }
        }
    });
}
//编辑会员对话窗
function editVillage(){
    var row = $('#villageGrid').datagrid('getSelected');
    if(row==null){
        $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
    }
    if (row){
        editor2.html(row.baseinfo);//文本编辑器显示内容
        $('#editVillage').dialog('open').dialog('setTitle','编辑');
        $('#editVillageForm').form('load',row);
        $('#townedit').combobox({
            url:ajaxTownAllUrl,
            valueField:'id',
            textField:'name',
            multiple:false,
            onLoadSuccess: function(){
                console.log(row);
                $('#townedit').combobox('setValue', row.townid);
            }
        });
        url =editVillageUrl+'/id/'+row.id;
    }
}
function destroyVillage(){
    var row = $('#villageGrid').datagrid('getSelected');
    if(row==null){
        $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
    }
    if (row){
        $.messager.confirm('删除提示','真的要删除?',function(r){
            if (r){
                var durl=deleteVillageUrl;
                $.getJSON(durl,{id:row.id},function(result){
                    if (result.status){
                        $('#villageGrid').datagrid('reload');    // reload the user data
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
