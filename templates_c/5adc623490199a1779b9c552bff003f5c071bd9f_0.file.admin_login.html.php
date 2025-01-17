<?php
/* Smarty version 3.1.30, created on 2018-03-14 14:54:16
  from "/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/admin_login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa8c71856d676_03151017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5adc623490199a1779b9c552bff003f5c071bd9f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/application/views/admin/admin_login.html',
      1 => 1519874488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa8c71856d676_03151017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录后台管理系统</title>
<link rel="stylesheet" type="text/css" href="<?php echo @constant('ADMIN_STYLE');?>
admin.css" />
<style>
	div{color: red;font-size: 12px;margin-left: 70px;font-weight: normal;text-align: center;background: #fff;margin-top: 5px;display: none;overflow: hidden;text-align: left;max-width: 125px;padding: 2px;border-radius: 3px;}
	div img{height: 16px;float: left;}
	label input{float: right;padding-left: 10px;box-sizing:border-box;}
</style>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
>
</head>
<body style="background: url(../../../../public/images/bg1.jpg) no-repeat center center fixed;background-size: 100% 100%;">

<form id="adminLogin" name="login" method="post" action="?action=login">
	<fieldset>
		<span>登录后台管理系统</span>
		<label>
			<img src="<?php echo @constant('HOME_IMG');?>
user.png" style="float: left;height: 20px;margin: 5px 8px;">
			<input type="text" name="admin_user" class="text name" placeholder="用户名：admin" />
		</label>
		<label>
			<img src="<?php echo @constant('HOME_IMG');?>
lock.png" style="float: left;height: 20px;margin: 5px 8px;">
			<input type="password" name="admin_pass" class="text password" placeholder="密码：admin" />
		</label>
		<div class="user" style="width: 100px;"><img src="<?php echo @constant('HOME_IMG');?>
error.png">用户名不能为空</div>
		<div class="pwd" style="width: 100px;"><img src="<?php echo @constant('HOME_IMG');?>
error.png">密码不能为空</div>
		<div class="error"><img src="<?php echo @constant('HOME_IMG');?>
error.png">用户名或密码不正确</div>
		<label style="background: none;border-radius: 0;">
			<img src="<?php echo @constant('ADMIN_SITE');?>
Index/code" onclick="javascript:this.src='<?php echo @constant('ADMIN_SITE');?>
Index/code?tm='+Math.random();" style="float: left;margin:0;height: 30px;width: 100px;" />
			<input type="text" name="code" class="text" style="width: 120px;border-radius: 5px;" placeholder="验证码为小写" />
		</label>
		<div class="code" style="width: 100px;"><img src="<?php echo @constant('HOME_IMG');?>
error.png">验证码不正确!</div>
		<input type="button" id="sub" value="登 录" class="submit" name="send" />
	</fieldset>
</form>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS');?>
jquery-1.12.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(".name").blur(function(){
	var name = $(this).val();
	if (name) {
		$(".user").hide();
	}else{
		$(".user").show();
	}
});
$(".password").blur(function(){
	var pwd = $(this).val();
	if (pwd) {
		$(".pwd").hide();
	}else{
		$(".pwd").show();
	}
});
$("#sub").click(function(){
	var username = $("input[name='admin_user']").val();
	var pwd = $("input[name='admin_pass']").val();
	if(username == ''){
		$(".user").show();
		return false;
	}
	if(pwd == ''){
		$(".pwd").show();
		return false;
	}
	var data = $("form").serialize();
	$.post('<?php echo @constant('ADMIN_SITE');?>
Index/login',data,function(redata){
		if(redata.msg == 2){
			$(".code").show();
		}else if(redata.msg == 3){
			$(".error").show();
		}else{
			window.location.href = '<?php echo @constant('ADMIN_SITE');?>
Index/index';
		}
	},'json')
})
$("body").keydown(function() {
	if (event.keyCode == "13") {//keyCode=13是回车键
		$('#sub').click();
	}
});
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
