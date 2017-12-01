<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>等级列表</title>
        <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/tpl/Public/css/base.css" />
    <link rel="stylesheet" href="/Public/statics/css/mobile.css">
</head>
<body>
<div class="bjy-admin-nav">
    <i class="fa fa-home"></i> 首页
    &gt;
    会员管理
    &gt;
    会员等级
</div>
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="javascript:void(0);">会员等级</a>
    </li>
    <li>
        <a href="<?php echo U('Admin/CardGrade/add');?>">添加会员等级</a>
    </li>
</ul>
<div class="row">
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <tr>
        <th>等级名称</th>
        <th>售卡金额</th>
        <th>属性</th>
        <th>升级类型</th>
        <th>升级条件</th>
        <th>升级后级别</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($data['data'])): foreach($data['data'] as $key=>$v): ?><tr>
            <td>
                <?php echo ($v['name']); ?>
            </td>
            <td><?php echo ($v['cardprice']); ?></td>
            <td><?php if($v['integral'] == 1): ?>积分卡<?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if($v['discount'] == 1): ?>折扣卡<?php endif; ?></td>
            <td><?php if($v['levelup'] == 0): ?>未设置<?php elseif($v['levelup'] == 1): ?>累计积分
                <?php elseif($v['levelup'] == 2): ?>累计充值<?php elseif($v['levelup'] == 3): ?>累计消费<?php endif; ?></td>
            <td><?php echo ($v['levelupcondition']); ?></td>
            <td><?php echo ($v['nextlevel']); ?></td>
            <td>
                <a href="<?php echo U('Admin/CardGrade/edit',array('id'=>$v['id']));?>">修改</a>
                <a  href="javascript:if(confirm('确定删除？'))location='<?php echo U('Admin/CardGrade/delete',array('id'=>$v['id']));?>'">删除</a>
                <a href="javascript:;" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>" levelup="<?php echo ($v['levelup']); ?>"levelupcondition="<?php echo ($v['levelupcondition']); ?>"nextlevel="<?php echo ($v['nextlevel']); ?>" onclick="edit(this)">升级</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
 <?php echo ($data['page']); ?>
<!-- 修改菜单模态框开始 -->
<div class="modal fade" id="bjy-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    修改菜单
                </h4>
            </div>
            <div class="modal-body">
                <form id="bjy-form" class="form-inline" action="<?php echo U('Admin/CardGrade/levelup');?>" method="post">
                    <input type="hidden" name="id">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <tr>
                            <th width="100">等级名称：</th>
                            <td>
                                <label id="Lname" ></label>
                            </td>
                        </tr>
                        <tr>
                            <th>升级方案：</th>
                            <td>
                                <select class="form-control" name="levelup">
                                    <option value="0">未设置</option>
                                    <option value="1">累计积分</option>
                                    <option value="2">累计充值</option>
                                    <option value="3">累计消费金额</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>升级条件：</th>
                            <td>
                                <input class="form-control" type="text" name="levelupcondition" value="0">
                            </td>
                        </tr>
                        <tr>
                            <th>升级后级别：</th>
                            <td>
                                <select class="form-control" name="nextlevel" id="nextlevel">
                                    <option value="0">未设置</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-success" type="submit" value="修改">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 引入bootstrjs部分开始 -->
<script src="/Public/statics/js/jquery-1.10.2.min.js"></script>
<script src="/Public/statics/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/tpl/Public/js/base.js"></script>
<script>
    // 修改菜单
    function edit(obj){
        var navId=$(obj).attr('navId');
        var navName=$(obj).attr('navName');
        var levelup=$(obj).attr('levelup');
        var levelupcondition=$(obj).attr('levelupcondition');
        var nextlevel=$(obj).attr('nextlevel');
        $("input[name='id']").val(navId);
        $("#Lname").empty().html(navName);
        $("select[name='levelup']").val(levelup);
        $("input[name='levelupcondition']").val(levelupcondition);

        $.getJSON("<?php echo U('Admin/CardGrade/getGrades');?>/id/"+navId,function(result){
            $("#nextlevel").empty();
            $("#nextlevel").append("<option value='0'>未设置</option>");
            $.each(result['grades'], function(i, field){
                $("#nextlevel").append("<option value='"+field['id']+"'>"+field['name']+"</option>");
            });
        });
        $("select[name='nextlevel']").val(nextlevel);
        $('#bjy-edit').modal('show');
    }

</script>
</body>
</html>