<?php
/* Smarty version 3.1.30, created on 2018-05-10 02:24:20
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/transaction_form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5af33cd425e6a3_87619348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1a230581d9bca9088e64199727eb416bce301d6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/transaction_form.html',
      1 => 1525890253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af33cd425e6a3_87619348 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('JS');?>
layui/css/layui.css" />
    <style type="text/css">
        form{margin-top: 20px;}
    </style>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
>
</head>
<body>
    <form class="layui-form" action="">
        <?php if ($_GET['act'] == "edit") {?> <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
"><?php }?>
       <div class="layui-form-item" style="display: none">
            <label class="layui-form-label">tid</label>
            <div class="layui-input-inline">
                <input type="text" name="tid" lay-verify="tid" placeholder="请输入tid" autocomplete="off" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['tid'];?>
"<?php }?>>
            </div>
           
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">uid</label>
                <div class="layui-input-inline">
                    <input type="text" name="uid" lay-verify="title" <?php if ($_GET['act'] == "edit") {?> readonly <?php }?> autocomplete="off" placeholder="请输入uid" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['uid'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">year</label>
            <div class="layui-input-inline">
                <input type="text" name="year" lay-verify="year" placeholder="请输入year" autocomplete="off" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['year'];?>
"<?php }?>>
            </div>
           
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">term</label>
                <div class="layui-input-inline">
                    <input type="text" name="term" lay-verify="alias" autocomplete="off" placeholder="请输入term" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['term'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">date</label>
                <div class="layui-input-inline">
                    <input type="text" name="date" lay-verify="major" autocomplete="off" placeholder="请输入date" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['date'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">in_time</label>
                <div class="layui-input-inline">
                    <input type="text" name="intime" lay-verify="avatar" autocomplete="off" placeholder="请输入in_time" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['in_time'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">out_time</label>
                <div class="layui-input-inline">
                    <input type="text" name="outtime" lay-verify="avatar" autocomplete="off" placeholder="请输入out_time" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['out_time'];?>
"<?php }?>>
                </div>
            </div>
        </div>
         <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">rid</label>
                <div class="layui-input-inline">
                    <input type="text" name="rid" lay-verify="avatar" autocomplete="off" placeholder="请输入rid" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['rid'];?>
"<?php }?>>
                </div>
            </div>
        </div>
         <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">status</label>
                <div class="layui-input-inline">
                    <input type="text" name="status" lay-verify="avatar" autocomplete="off" placeholder="请输入status" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['status'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        <!-- <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">手机号</label>
                <div class="layui-input-inline">
                    <input type="tel" name="phone" lay-verify="phone" autocomplete="off" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['phone'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-inline">
                    <input type="text" name="email" lay-verify="email" autocomplete="off" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['email'];?>
"<?php }?>>
                </div>
            </div>
        </div> -->
        <div class="layui-form-item">
            <div class="layui-input-block">
            <?php if ($_GET['act'] == "add") {?>
                <button class="layui-btn" lay-submit="" lay-filter="add">添加</button>
            <?php } elseif ($_GET['act'] == "edit") {?>
                <button class="layui-btn" lay-submit="" lay-filter="edit">确认修改</button>
            <?php }?>
            </div>
        </div>
    </form>
</body>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
jquery.min.js" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(add)', function(data){
            $.ajax({
                url:'add',
                data:data.field,
                type:'post',
                dataType:'json',
                success:function(redata){
                    if (redata.msg == 1) {
                        window.parent.location.reload();//刷新父页面
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 2){
                        layer.alert("添加失败，请重试！");
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 3){
                        layer.msg("该Transaction已存在，请重新添加！");
                    }
                }
            });
            return false;
        });
        form.on('submit(edit)', function(data){
          console.log(data.field.tid);
            $.ajax({
                url:'edit?tid=' + data.field.tid,
                data:data.field,
                type:'post',
                dataType:'json',
                success:function(redata){
                    if (redata.msg == 1) {
                        layer.alert("修改成功");
                        // window.parent.location.reload();//刷新父页面
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 2){
                        layer.alert("修改失败，请重试！");
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 3){
                        layer.msg("修改后的Transaction已存在，请重新编辑！");
                    }else if(redata.msg == 4){
                        layer.msg("没有记录被修改");
                    }
                }
            });
            return false;
        });
        form.verify({
            title: function(value){
                if(value.length == 0){
                    return 'Transaction不能为空';
                }
            },
            role:function(value){
                if(value.length == 0){
                    return '';
                }
            }
        });
    });
<?php echo '</script'; ?>
>
</html><?php }
}
