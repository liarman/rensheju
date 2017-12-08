/**
 * Created by ZH on 2017/11/27.
 */

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

var url;
function addNotice(){
    $('#addNotice').dialog('open').dialog('setTitle','发布公告');
    $('#addNoticeForm').form('clear');
    url=noticeAdd;
}
function addNoticeSubmit(){
    $('.addintro').val(editor.html());
    $('#addNoticeForm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success:function(data){
            data=$.parseJSON(data);
            if(data.status==1){
                $.messager.alert('Info', data.message, 'info');
                $('#addNotice').dialog('close');
                $('#noticeGrid').datagrid('reload');
            }else {
                $.messager.alert('Warning', data.message, 'info');
                $('#addNotice').dialog('close');
                $('#noticeGrid').datagrid('reload');
            }
        }
    });
    editor.html('');
}
function editNoticeSubmit(){
    $('.editcontent').val(editor2.html());
    $('#editNoticeForm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success:function(data){
            data=$.parseJSON(data);
            if(data.status==1){
                $.messager.alert('Info', data.message, 'info');
                $('#editNotice').dialog('close');
                $('#noticeGrid').datagrid('reload');
                editor2.html('');
            }else {
                $.messager.alert('Warning', data.message, 'info');
                $('#editNotice').dialog('close');
                $('#noticeGrid').datagrid('reload');
                editor2.html('');
            }
        }
    });
}
//编辑会员对话窗
function editNotice(){
    var row = $('#noticeGrid').datagrid('getSelected');
    if(row==null){
        $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
    }
    editor2.html(row.intro);
    if (row){
        $('#editNotice').dialog('open').dialog('setTitle','编辑');
        $('#editNoticeForm').form('load',row);
        url =noticeEdit+'/id/'+row.id;
    }
}
function destroyNotice(){
    var row = $('#noticeGrid').datagrid('getSelected');
    if(row==null){
        $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
    }
    if (row){
        $.messager.confirm('删除提示','真的要删除?',function(r){
            if (r){
                var durl=noticeDelete;
                $.getJSON(durl,{id:row.id},function(result){
                    if (result.status){
                        $('#noticeGrid').datagrid('reload');    // reload the user data
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