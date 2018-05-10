<?php
/* Smarty version 3.1.30, created on 2018-05-11 03:11:30
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/menu_form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5af49962b42e62_33199574',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a4ed74a1a846763d37e1eaa00a7698312e050803' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/menu_form.html',
      1 => 1522962926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af49962b42e62_33199574 (Smarty_Internal_Template $_smarty_tpl) {
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
        <?php if ($_GET['act'] == "edit") {?> <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['menu']->value['id'];?>
"><?php }?>
        <div class="layui-form-item">
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input type="text" name="name" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input" style="width: 60%;" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['menu']->value['name'];?>
"<?php }?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否显示</label>
            <div class="layui-input-block">
                <input type="checkbox" <?php if ($_GET['act'] == "add") {?> checked<?php }?> <?php if ($_GET['act'] == "edit" && $_smarty_tpl->tpl_vars['menu']->value['play'] == "on") {?> checked<?php }?> name="play" lay-skin="switch" lay-filter="switchTest" lay-text="显示|隐藏">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">一级菜单</label>
            <div class="layui-input-block">
                <input type="radio" name="first" value="1" title="是" lay-filter="first" <?php if ($_GET['act'] == "add") {?> checked<?php }?> <?php if ($_GET['act'] == "edit" && $_smarty_tpl->tpl_vars['menu']->value['first'] == "1") {?> checked<?php }?>>
                <input type="radio" name="first" value="0" title="否" lay-filter="first" <?php if ($_GET['act'] == "edit" && $_smarty_tpl->tpl_vars['menu']->value['first'] == "0") {?> checked<?php }?>>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">所属菜单</label>
                <div class="layui-input-inline">
                    <select name="pid" class="pid">
                        <option value="">请选择</option>
                        <?php if ($_GET['act'] == "edit" && $_smarty_tpl->tpl_vars['menu']->value['first'] == "0") {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['first']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['id'] == $_smarty_tpl->tpl_vars['menu']->value['pid']) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
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
        <div class="layui-form-item">
            <label class="layui-form-label">控制器名称</label>
            <div class="layui-input-block">
                <input type="text" name="controller" lay-verify="title" autocomplete="off" placeholder="一级菜单无需填写控制器名" class="layui-input cont" style="width: 190px;" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['menu']->value['controller'];?>
"<?php }?> disabled >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">菜单图标</label>
            <div class="layui-input-block icon">
                <input type="text" name="icon" autocomplete="off" placeholder="可不填" class="layui-input" style="width: 190px;display: inline-block;margin-right: 10px;" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['menu']->value['icon'];?>
"<?php }?>>
                <a href="icon" target="_blank">查看图标</a>
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

        form.on('radio(first)', function(data){
            if (data.value == 0) {
                var html = "";
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['first']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                    html += '<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>';
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                $(".pid").append(html);
                $(".cont").attr("placeholder","请填写控制器名");
                $(".cont").attr("disabled",false);
                form.render();//重新渲染
            }else if (data.value == 1) {
                $(".pid").children().remove();
                var html = '<option value="0">请选择</option>';
                $(".pid").append(html);
                $(".cont").attr("placeholder","一级菜单无需填写控制器名");
                $(".cont").attr("disabled",true);
                form.render();//重新渲染
            }
            // console.log(data.value); //被点击的radio的value值
        });
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
                    }else{
                        layer.alert("添加失败，请重试！");
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
                    }else{
                        layer.alert("修改失败，请重试！");
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
