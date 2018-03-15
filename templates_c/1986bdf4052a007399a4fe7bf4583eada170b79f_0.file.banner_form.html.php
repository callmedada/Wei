<?php
/* Smarty version 3.1.30, created on 2018-03-15 02:02:40
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/banner_form.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa963c0aad099_50985775',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1986bdf4052a007399a4fe7bf4583eada170b79f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/banner_form.html',
      1 => 1519874488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa963c0aad099_50985775 (Smarty_Internal_Template $_smarty_tpl) {
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
    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
> -->
</head>
<body>
    <form class="layui-form" action="">
        <?php if ($_GET['act'] == "edit") {?> <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
"><?php }?>
        <div class="layui-form-item">
            <label class="layui-form-label">主题</label>
            <div class="layui-input-block">
                <input type="text" name="title" autocomplete="off" placeholder="可不填" class="layui-input" style="width: 60%;" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
"<?php }?>>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">链接</label>
            <div class="layui-input-block">
                <input type="text" name="url" autocomplete="off" placeholder="可不填" class="layui-input" style="width: 60%;" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['info']->value['url'];?>
"<?php }?>>
            </div>
        </div>
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="test1" style="margin-left: 65px;">上传图片</button>
            <div class="layui-upload-list">
                <input type="hidden" name="image" class="image" <?php if ($_GET['act'] == "edit") {?> value="<?php echo $_smarty_tpl->tpl_vars['info']->value['image'];?>
"<?php }?>>
                <img class="layui-upload-img" id="demo1" style="width: 120px;height: 100px;margin-left: 65px;" <?php if ($_GET['act'] == "edit" && $_smarty_tpl->tpl_vars['info']->value['image'] != '') {?> src="<?php echo $_smarty_tpl->tpl_vars['info']->value['image'];?>
"<?php } else { ?> src="<?php echo HOME_IMG;?>
noimg.jpg"<?php }?>>
                <p id="demoText"></p>
            </div>
        </div> 
        <div class="layui-form-item">
            <textarea name="content" id="demo"><?php if ($_GET['act'] == "edit") {?> <?php echo $_smarty_tpl->tpl_vars['info']->value['content'];
}?></textarea>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block" style="margin-left: 65px;">
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
jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
Ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
Ueditor/ueditor.all.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    var ue = UE.getEditor('demo',{
        toolbars: [[
            'source','undo','redo','formatmatch','removeformat','|',
            'fontfamily','fontsize','bold','italic','underline','forecolor','indent','lineheight','justifyleft','justifyright','justifycenter','justifyjustify','|',
            'attachment','simpleupload','insertimage','insertvideo','link','emotion','edittip ','template','|',
            'fullscreen','help'
        ]],
        //关闭字数统计    
        wordCount:false,    
        //关闭elementPath    
        elementPathEnabled:false,    
        //默认的编辑区域高度    
        initialFrameHeight:300 
    });
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    layui.use('upload', function(){
        var $ = layui.jquery,
        upload = layui.upload;

        //普通图片上传
        var uploadInst = upload.render({
            elem: '#test1',
            url: '<?php echo ADMIN_SITE;?>
Upfile/upfile',
            before: function(obj){
                //预读本地文件示例，不支持ie8
                obj.preview(function(index, file, result){
                    // $('#demo1').attr('src', result); //图片链接（base64）
                });
            },
            done: function(res){
                //如果上传失败
                if(res.code > 0){
                    return layer.msg('上传失败');
                }
                //上传成功
                if (res.code == 0) {
                    $('#demo1').attr('src', res.data.src);
                    $('.image').val(res.data.src);
                }
            },
            error: function(){
            //演示失败状态，并实现重传
                var demoText = $('#demoText');
                demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                demoText.find('.demo-reload').on('click', function(){
                    uploadInst.upload();
                });
            }
        });
    });
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
