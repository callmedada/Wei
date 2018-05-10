<?php
/* Smarty version 3.1.30, created on 2018-05-10 06:53:25
  from "C:\xampp\htdocs\application\views\admin\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5af37be52ddde8_17300947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a3a47008d8a7d4c1f5cb8bda9338bf6a56e90f37' => 
    array (
      0 => 'C:\\xampp\\htdocs\\application\\views\\admin\\admin.html',
      1 => 1525906315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af37be52ddde8_17300947 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="renderer" content="webkit">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php echo @constant('JS');?>
layui/css/layui.css"  media="all">
	<link rel="stylesheet" type="text/css" href="<?php echo @constant('ADMIN_STYLE');?>
style.css" />
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
>
	<title>后台管理系统</title>
</head>
<body>
<div class="admin">
	<div id="top">
		<div id="#animation-left-nav" class="top-left">Wei</div>
		<div class="top-right-top">
			<img src="<?php echo @constant('HOME_IMG');?>
/headimg.jpg">
			<div class="con">
				您好！<strong><?php echo $_SESSION['username'];?>
</strong> 
				[ <a href="<?php echo @constant('ADMIN_SITE');?>
Index/logout" target="_parent">退出</a> ]
			</div>
		</div>
		<div class="top-right-down">
			<ul>
				<li><a href="<?php echo @constant('BASE_SITE');?>
Index.php/admin" target="_blank"><i class="layui-icon" style="font-size: 26px;">&#xe68e;</i></a></li>
				<!-- <li alt="Menu" class="act"><span onclick="change(this)">菜单设置</span> <i class="layui-icon" onclick="closePage(this)">&#x1006;</i></li> -->
			</ul>
		</div>
	</div>
	<div id="left">
		<ul class="layui-nav layui-nav-tree layui-inline" lay-filter="demo" style="margin-right: 10px;">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'm');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
?>
			<?php if (in_array($_smarty_tpl->tpl_vars['m']->value['id'],$_smarty_tpl->tpl_vars['auth']->value)) {?>
			<li class="layui-nav-item">
				<a href="javascript:;"><?php if ($_smarty_tpl->tpl_vars['m']->value['icon']) {?><i class="layui-icon">&#xe<?php echo $_smarty_tpl->tpl_vars['m']->value['icon'];?>
;</i><?php }?> <?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>
				<dl class="layui-nav-child">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['child']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
					<?php if ($_smarty_tpl->tpl_vars['v']->value['pid'] == $_smarty_tpl->tpl_vars['m']->value['id']) {?>
					<dd><a href="javascript:;" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['controller'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['icon']) {?><i class="layui-icon">&#xe<?php echo $_smarty_tpl->tpl_vars['v']->value['icon'];?>
;</i><?php }?> <?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a></dd>
					<?php }?>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				</dl>
			</li>
			<?php }?>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</ul>
	</div>
	<div id="main">
		<iframe src="" width="99.5%" height="100%"></iframe>
	</div>
</div>
</body>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
jquery-1.12.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
layui/layui.js" charset="utf-8"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
// $("#left li:first").addClass("layui-nav-itemed");
layui.use(['jquery','layer','element'], function(){
	var $ = layui.$,
		layer = layui.layer, //弹层
		element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
		
	//监听导航点击
	element.on('nav(demo)', function(elem){
		// console.log(elem);
		// console.log(elem[0].lastChild.attributes['alt']['nodeValue']);

		var src = elem[0].lastChild.attributes['alt']['nodeValue'];//点击的链接
		var title = elem.text().split(" ")[1];//点击的名称
		var html = '<li alt="'+src+'" class="act"><span onclick="change(this)">'+title+'</span> <i class="layui-icon" onclick="closePage(this)">&#x1006;</i></li>';
		var len = $(".top-right-down li").length;
		var flg = 0;
		var index = 0;
		if(len > 1){
			for(var i = 1;i < len;i++){
				var t = $(".top-right-down li").eq(i).find("span").text();
				if(t == title){
					index = i;
					flg++;
				}
			}
		}
		$(".top-right-down li").removeClass("act");

		if(flg > 0){
			$("#main iframe").attr("src","<?php echo @constant('ADMIN_SITE');?>
"+src+"/index");
			$(".top-right-down li").eq(index).addClass("act");
		}else{
			$("#main iframe").attr("src","<?php echo @constant('ADMIN_SITE');?>
"+src+"/index");
			$(".top-right-down ul").append(html);
		}
	});
});
function closePage(obj){
	var len = $(".top-right-down li").length;
	var index = $(obj).parent().index();//点击的第几个
	var cur = 0;
	if (len > 2) {
		for(var i=0;i<len;i++){
			var cla = $(".top-right-down li").eq(i).attr("class");
			if (cla == "act") {
				cur = i;
			}
		}
		$(".top-right-down li").removeClass("act");
		if (index == cur) {
			var title = "";
			var src = "";
			if ((index == len - 1) && (cur == len - 1)) {//删除的是最后一个,并且iframe显示的也是最后一个
				title = $(".top-right-down li:last").prev().find("span").text();//倒数第二个选项卡名称
				src = $(".top-right-down li:last").prev().attr("alt");//倒数第二个url
				$(".top-right-down li:last").prev().addClass("act");
			}else{
				title = $(".top-right-down li:last").find("span").text();//最后一个选项卡名称
				src = $(".top-right-down li:last").attr("alt");//最后一个url
				$(".top-right-down li:last").addClass("act");
			}
			$(obj).parent().remove();
			$("#main iframe").attr("src","<?php echo @constant('ADMIN_SITE');?>
"+src+"/index");
		}else{
			$(".top-right-down li").eq(cur).addClass("act");
			$(obj).parent().remove();
		}
	}else{
		$(obj).parent().remove();
		$("#main iframe").attr("src","");
	}
}
function change(obj){
	$(".top-right-down li").removeClass("act");
	$(obj).parent().addClass("act");

	var src = $(obj).parent().attr("alt");
	var alt = $(".layui-nav-item a");
	var len = alt.length;
	$(".layui-nav-item dd").removeClass("layui-this");
	for(var i=0;i<len;i++){
		if (alt.eq(i).attr("alt") == src) {
			$(".layui-nav-item a").eq(i).parent().addClass("layui-this");
			$(".layui-nav-item a").eq(i).parent().parent().parent().addClass("layui-nav-itemed");
		}
	}
	$("#main iframe").attr("src","<?php echo @constant('ADMIN_SITE');?>
"+src+"/index");
}
<?php echo '</script'; ?>
>
</html>
<?php }
}
