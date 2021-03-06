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
$(document).ready(function(){
    KindEditor.ready(function(K){
        var editor = K.editor({
            allowFileManager:false
        });
        K('#addheadimg').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    fileUrl : K('#thumb').val(),
                    clickFn : function(url, title) {
                        $('.addimg').textbox("setValue",imgUrl + url);
                        editor.hideDialog();
                    }
                });
            });
        });
        K('#editheadimg').click(function() {
            editor.loadPlugin('image', function() {
                editor.plugin.imageDialog({
                    fileUrl : K('#thumb').val(),
                    clickFn : function(url, title) {
                        $('.editimg').textbox("setValue",imgUrl +url);
                        editor.hideDialog();
                    }
                });
            });
        });
    });
});

var url;
function addPerson(){
    $('#addPerson').dialog('open').dialog('setTitle','添加');
    $('#addPersonForm').form('clear');
    url=addPersonUrl;
}

function addPersonSubmit(){
    $('#addPersonForm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success:function(data){
            data=$.parseJSON(data);
            if(data.status==1){
                $.messager.alert('Info', data.message, 'info');
                $('#addPerson').dialog('close');
                $('#PersonGrid').datagrid('reload');
            }else {
                $.messager.alert('Warning', data.message, 'info');
                $('#addPerson').dialog('close');
                $('#PersonGrid').datagrid('reload');
            }
        }
    });
}
function editPersonSubmit(){
    $('#editPersonForm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success:function(data){
            data=$.parseJSON(data);
            if(data.status==1){
                $.messager.alert('Info', data.message, 'info');
                $('#editPerson').dialog('close');
                $('#PersonGrid').datagrid('reload');
            }else {
                $.messager.alert('Warning', data.message, 'info');
                $('#editPerson').dialog('close');
                $('#PersonGrid').datagrid('reload');
            }
        }
    });
}
//编辑会员对话窗
function editPerson(){
    var row = $('#PersonGrid').datagrid('getSelected');
    if(row==null){
        $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
    }
    if (row){
        $('#editPerson').dialog('open').dialog('setTitle','编辑');
        $('#editPersonForm').form('load',row);
        url =editPersonUrl+'/id/'+row.id;
    }
}

function destroyPerson(){
    var row = $('#PersonGrid').datagrid('getSelected');
    if(row==null){
        $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
    }
    if (row){
        $.messager.confirm('删除提示','真的要删除?',function(r){
            if (r){
                var durl=deletePersonUrl;
                $.getJSON(durl,{id:row.id},function(result){
                    if (result.status){
                        $('#PersonGrid').datagrid('reload');    // reload the user data
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

function  formatArea(val,rowData,row){
    if(val==1){
        val="谯城区";
    }else if(val==2){
        val="涡阳县";
    }else if(val==3){
        val="蒙城县";
    }else if(val==4){
        val="利辛县";
    }else{

    }
    return val;
}
