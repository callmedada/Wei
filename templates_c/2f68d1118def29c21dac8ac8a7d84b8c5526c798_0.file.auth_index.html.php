<?php
/* Smarty version 3.1.30, created on 2018-03-14 23:18:35
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/auth_index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa93d4b27f707_91365316',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f68d1118def29c21dac8ac8a7d84b8c5526c798' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/auth_index.html',
      1 => 1519874488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa93d4b27f707_91365316 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('JS');?>
layui/css/layui.css" />
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
>
</head>
<body>
    <table class="layui-hide" id="table_type" lay-filter="role"></table>
    <?php echo '<script'; ?>
 type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
    layui.use(['table','form'], function() {
        var table = layui.table,
        	form = layui.form;

        //方法级渲染
        table.render({
            elem: '#table_type',
            url: '<?php echo @constant('ADMIN_SITE');?>
Auth/getInfo',
            cols: [[
                { field: 'id', title: 'ID', sort: true, fixed: true, align: 'center' },
                { field: 'role_id', title: '角色', align: 'center' },
                { field: 'nav_ids', title: '权限（可操作菜单）', align: 'center' },
                { field: 'created', title: '创建时间', sort: true, align: 'center' },
                { fixed: 'right', title: '操作', align: 'center', toolbar: '#barDemo' }
            ]],
            id: 'idTest',
            page: true,
        });

        //监听工具条
        table.on('tool(role)', function(obj) {
            var data = obj.data;
            if (obj.event === 'edit') {
                layer.open({
                    type: 2,
                    title: "编辑角色权限",
                    area: ['700px', '450px'],
                    fixed: false, //不固定
                    closeBtn: 1,//关闭窗口按钮
                    maxmin: true,//窗口最大最小化按钮
                    content: 'edit?id='+data.id
                });
            }
        });
    });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
