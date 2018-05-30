<?php
/* Smarty version 3.1.30, created on 2018-05-31 04:54:00
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/report_form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b0f0f68148a86_78676291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95743adacea8afb6893b9be6762cc6892e9b3346' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/report_form.html',
      1 => 1527713610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0f0f68148a86_78676291 (Smarty_Internal_Template $_smarty_tpl) {
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
       
       <div class="layui-form-item">
            <label class="layui-form-label">Building Name</label>
            <div class="layui-input-inline">
                <input type="text" name="bname" lay-verify="bname" readonly placeholder="" autocomplete="off" class="layui-input"  value="<?php echo $_GET['b'];?>
">
            </div>	
           
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">Room Number</label>
                <div class="layui-input-inline">
                    <input type="text" name="rnumber" lay-verify="rnumber" readonly autocomplete="off" placeholder="" class="layui-input" value="<?php echo $_GET['r'];?>
">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">Description</label>
            <div class="layui-input-inline">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
           
        </div>
      
        <div class="layui-form-item">
            <div class="layui-input-block">
            
              
                <button class="layui-btn" lay-submit="" lay-filter="submit">提交</button>
            
          
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
        form.on('submit(submit)', function(data){
			console.log(data.field.desc);
            $.ajax({
				
                url:'submitReport',
                data:{rid:<?php echo $_GET['rid'];?>
,description:data.field.desc},
                type:'post',
                dataType:'json',
                success:function(redata){
                    if (redata.msg == 1) {
                        window.parent.location.reload();//刷新父页面
                        layer.closeAll('iframe');//关闭弹窗
                    }else if(redata.msg == 2){
                        layer.alert("报告失败，请重试！");
                        layer.closeAll('iframe');//关闭弹窗
                    }
                }
            });
            return false;
        });
        form.on('submit(cancel)', function(data){
         layer.closeAll('iframe');
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
