    var url;
    var loading = false; //为防止onCheck冒泡事件设置的全局变量

    $('#pid').combobox({});
    $('#vpid').combobox({});

    function addCustomer(){
        $('#addCustomer').dialog('open').dialog('setTitle','添加账号');
        $('#addCustomerForm').form('clear');
        url= addCustomerUrl ;
    }
    function addCustomerSubmit(){
        $('#addCustomerForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#addCustomer').dialog('close');
                    $('#CustomerGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#addCustomer').dialog('close');
                    $('#CustomerGrid').datagrid('reload');
                }
            }
        });
    }
    function editCustomerSubmit(){
        $('#editCustomerForm').form('submit',{
            url: url,
            onSubmit: function(){
                return $(this).form('validate');
            },
            success:function(data){
                data=$.parseJSON(data);
                if(data.status==1){
                    $.messager.alert('Info', data.message, 'info');
                    $('#editCustomer').dialog('close');
                    $('#CustomerGrid').datagrid('reload');
                }else {
                    $.messager.alert('Warning', data.message, 'info');
                    $('#editCustomer').dialog('close');
                    $('#CustomerGrid').datagrid('reload');
                }
            }
        });
    }
    //编辑会员对话窗
    function editCustomer(){
        var row = $('#CustomerGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要编辑的行", 'info');return false;
        }
        if (row){
            $('#editCustomer').dialog('open').dialog('setTitle','编辑');
            $('#editCustomerForm').form('load',row);
            url = editCustomerUrl +'/id/'+row.id;
        }
    }
    function destroyCustomer(){
        var row = $('#CustomerGrid').datagrid('getSelected');
        if(row==null){
            $.messager.alert('Warning',"请选择要删除的行", 'info');return false;
        }
        if (row){
            $.messager.confirm('删除提示','真的要删除?',function(r){
                if (r){
                    var durl= deleteCustomerUrl;
                    $.getJSON(durl,{id:row.id},function(result){
                        if (result.status){
                            $('#CustomerGrid').datagrid('reload');    // reload the user data
                        } else {
                            $.messager.alert('错误提示',result.message,'error');
                        }
                    },'json').error(function(data){
                        var info=eval('('+data.responseText+')');
                        $.messager.confirm('错误提示',info.message,function(r){

                        });
                    });
                }
            });
        }
    }