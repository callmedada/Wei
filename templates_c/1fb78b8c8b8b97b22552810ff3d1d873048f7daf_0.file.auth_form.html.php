<?php
/* Smarty version 3.1.30, created on 2018-05-01 04:47:37
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/auth_form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae780e9a19677_80058832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fb78b8c8b8b97b22552810ff3d1d873048f7daf' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/auth_form.html',
      1 => 1522962924,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae780e9a19677_80058832 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('JS');?>
layui/css/layui.css" />
    <style>
        form {margin-top: 20px;}
    </style>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
>
</head>

<body>
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <!-- <label class="layui-form-label">选择可操作菜单</label> -->
            <div class="layui-input-block">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <input type="checkbox" name="nav_ids[]" lay-filter="nav" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value['check'] == 1) {?> checked<?php }?>>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="edit">确认修改</button>
            </div>
        </div>
    </form>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
    layui.use(['table','form'], function() {
        var $ = layui.$,
            form = layui.form;

        //复选框选择
        form.on('checkbox(nav)', function(obj){
            console.log(obj);
        });

        form.on('submit(edit)', function(){
            var nav = "";
            var flag = "";
            var ids = "";
            $("input[type='checkbox']:checked").each(function() { // 遍历name=test的多选框
                ids += flag + $(this).val();  // 每一个被选中项的值
                flag = ",";
            });
            // console.log(ids);
            var id = <?php echo $_GET['id'];?>
;
            $.ajax({
                url:'edit',
                data:{ids:ids,id:id},
                type:'post',
                dataType:'json',
                success:function(redata){
                    if (redata.msg == 1) {
                        window.parent.parent.location.reload();//刷新父页面
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 2){
                        layer.alert("修改失败，请重试！");
                        layer.closeAll('iframe');//关闭弹窗
                    }
                }
            });
            return false;
        });    
    });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
