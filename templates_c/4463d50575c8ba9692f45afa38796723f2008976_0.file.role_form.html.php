<?php
/* Smarty version 3.1.30, created on 2018-03-15 02:08:49
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/role_form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa96531a07375_55971988',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4463d50575c8ba9692f45afa38796723f2008976' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/role_form.html',
      1 => 1519874488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa96531a07375_55971988 (Smarty_Internal_Template $_smarty_tpl) {
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
        <?php if ($_GET['act'] == "edit") {?> <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
"><?php }?>
        <div class="layui-form-item">
            <label class="layui-form-label">角色名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" lay-verify="title" autocomplete="off" placeholder="请输入角色名称" class="layui-input" style="width: 60%;" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['info']->value['name'];?>
"<?php }?>>
            </div>
        </div>
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
                        layer.msg("该角色已存在，请重新添加！");
                    }
                }
            });
            return false;
        });
        form.on('submit(edit)', function(data){
            $.ajax({
                url:'edit',
                data:data.field,
                type:'post',
                dataType:'json',
                success:function(redata){
                    if (redata.msg == 1) {
                        window.parent.location.reload();//刷新父页面
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 2){
                        layer.alert("修改失败，请重试！");
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 3){
                        layer.msg("修改后的角色名已存在，请重新修改！");
                    }
                }
            });
            return false;
        });
    });
<?php echo '</script'; ?>
>
</html><?php }
}
