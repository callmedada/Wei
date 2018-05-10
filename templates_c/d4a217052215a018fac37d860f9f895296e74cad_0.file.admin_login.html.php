<?php
/* Smarty version 3.1.30, created on 2018-05-10 06:53:17
  from "C:\xampp\htdocs\application\views\admin\admin_login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5af37bdd439e80_06376630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4a217052215a018fac37d860f9f895296e74cad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\application\\views\\admin\\admin_login.html',
      1 => 1525906315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5af37bdd439e80_06376630 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录后台管理系统</title>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo @constant('ADMIN_STYLE');?>
admin.css" /> -->
<style>
	/* div{color: red;font-size: 12px;margin-left: 70px;font-weight: normal;text-align: center;background: #fff;margin-top: 5px;display: none;overflow: hidden;text-align: left;max-width: 125px;padding: 2px;border-radius: 3px;} */
	div img{height: 16px;float: left;}
	label input{float: right;padding-left: 10px;box-sizing:border-box;}
</style>
<link rel="stylesheet" href="../../../../public/login/css/lrtk.css">
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo @constant('JS');?>
forbidRight.js"><?php echo '</script'; ?>
>
</head>
<body style="background: #ebebeb no-repeat center center fixed;background-size: 100% 100%;">
	
	<div id="login">
		<div class="wrapper">
			<div class="login">
				<form id="adminLogin" name="login" method="post" action="?action=login" class="container offset1 loginform">
					<div id="owl-login">
						<div class="hand"></div>
						<div class="hand hand-r"></div>
						<div class="arms">
							<div class="arm"></div>
							<div class="arm arm-r"></div>
						</div>
					</div>
					<div class="pad">
						<input type="hidden" name="_csrf" value="9IAtUxV2CatyxHiK2LxzOsT6wtBE6h8BpzOmk=">
						<div class="control-group">
							<div class="controls">
								<label for="email" class="control-label fa fa-envelope"></label>
								<input id="email" type="text" name="admin_user" placeholder="Usernmae" tabindex="1" autofocus="autofocus" class="form-control input-medium">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<label for="password" class="control-label fa fa-asterisk"></label>
								<input id="password" type="password" name="admin_pass" placeholder="Password" tabindex="2" class="form-control input-medium">
							</div>
						</div>
						<div class="control-group">
						<label style="background: none;border-radius: 0; position: relative;">
							<img src="<?php echo @constant('ADMIN_SITE');?>
Index/code" onclick="javascript:this.src='<?php echo @constant('ADMIN_SITE');?>
Index/code?tm='+Math.random();" style="margin:0 0 5px -10px;height: 40px;width: 100px;" />
							<input type="text" name="code" class="text" style=" margin:0 0 5px 10px;" placeholder="验证码为小写" />
						</label>
						</div>
						<div class="error"><img src="<?php echo @constant('HOME_IMG');?>
error.png">用户名或密码不正确</div>
						<div class="code" style="width: 100px;"><img src="<?php echo @constant('HOME_IMG');?>
error.png">验证码不正确!</div>

					</div>
					<div class="form-actions">
						<button id="sub" tabindex="4" class="btn btn-primary">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>

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
		<?php echo '<script'; ?>
>
			$(function() {
				$(".code").hide();
				$(".error").hide();
				$('#login #password').focus(function() {
					$('#owl-login').addClass('password');
				}).blur(function() {
					$('#owl-login').removeClass('password');
				});
			});
			<?php echo '</script'; ?>
>
</body>
</html><?php }
}
