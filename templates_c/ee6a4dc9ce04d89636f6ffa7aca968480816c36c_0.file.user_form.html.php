<?php
/* Smarty version 3.1.30, created on 2018-05-05 02:51:34
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/user_form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aecabb66a1637_65203778',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee6a4dc9ce04d89636f6ffa7aca968480816c36c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/user_form.html',
      1 => 1522962926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aecabb66a1637_65203778 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">账号</label>
                <div class="layui-input-inline">
                    <input type="text" name="name" lay-verify="title" <?php if ($_GET['act'] == "edit") {?> readonly <?php }?> autocomplete="off" placeholder="请输入账号" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" lay-verify="pass" placeholder="请输入密码" autocomplete="off" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['pwd'];?>
"<?php }?>>
            </div>
            <div class="layui-form-mid layui-word-aux">请填写6到12位密码</div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">昵称</label>
                <div class="layui-input-inline">
                    <input type="text" name="alias" lay-verify="alias" autocomplete="off" placeholder="请输入昵称" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['alias'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">专业</label>
                <div class="layui-input-inline">
                    <input type="text" name="major" lay-verify="major" autocomplete="off" placeholder="请输入major" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['major'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">Avatar</label>
                <div class="layui-input-inline">
                    <input type="text" name="avatar" lay-verify="avatar" autocomplete="off" placeholder="头像" class="layui-input" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['list']->value['avatar'];?>
"<?php }?>>
                </div>
            </div>
        </div>
        
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">角色</label>
                <div class="layui-input-inline">
                    <select name="role_id" lay-verify="role">
                        <option value="">请选择</option>
                        <?php if ($_GET['act'] == "edit") {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['role']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['id'] == $_smarty_tpl->tpl_vars['list']->value['role_id']) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <?php }?>
                        <?php if ($_GET['act'] == "add") {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['role']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <?php }?>
                    </select>
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
                        layer.msg("该账号已存在，请重新添加！");
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
                        layer.alert("修改成功");
                        // window.parent.location.reload();//刷新父页面
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 2){
                        layer.alert("修改失败，请重试！");
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 3){
                        layer.msg("修改后的账号已存在，请重新编辑！");
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
                    return '账号不能为空';
                }
            },
            role:function(value){
                if(value.length == 0){
                    return '请选择角色';
                }
            },
            pass: [/(.+){6,12}$/, '密码必须6到12位'],
            content: function(value){
                layedit.sync(editIndex);
            }
        });
    });
<?php echo '</script'; ?>
>
</html><?php }
}
