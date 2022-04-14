<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="navbar-custom">
<ul class="list-unstyled topbar-right-menu float-right mb-0">

<li class="dropdown notification-list">
<a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button">
<span class="dripicons-bell noti-icon iconfont icon-xiaoxizhongxin"></span>
<span class="noti-icon-badge"></span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

<div class="dropdown-item noti-title">
<h5 class="m-0">
<span class="float-right">
<a href="javascript: void(0);" class="text-dark">
<small class="badge badge-success">New</small>
</a>
</span>朋友动态
</h5>
</div>

<div class="slimScrollDiv" style="max-height: 230px;">

<?php echo dongtai(); ?>

</div>
<a href="/index.php/dongtai.html" class="dropdown-item text-center text-primary notify-item notify-all">
<span class="iconfont icon-pengyouquan"></span> 进入朋友圈
</a>
</div>
</li>



<li class="dropdown notification-list">
<a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
<span class="account-user-avatar">
<span class="iconfont icon-lihe"></span>
</span>
<span>
<span class="account-user-name">欢迎光临本站</span>
<span class="account-position">登录/注册</span>
</span>
</a>
<div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">

<div class=" dropdown-header noti-title">
<h6 class="text-overflow m-0">你好朋友 !</h6>
</div>


<?php if($this->user->hasLogin()){?>

<a href="/admin" class="dropdown-item notify-item">
<span><span class="iconfont icon-shezhi"></span> 后台</span>
</a>

<a href="index.php/action/logout" class="dropdown-item notify-item">
<span><span class="iconfont icon-shibai"></span> 退出</span>
</a>
<?php }else{ ?>
<a href="/admin/login.php" class="dropdown-item notify-item">
<i class="mdi mdi-account-circle mr-1"></i>
<span><span class="iconfont icon-people"></span> 登录</span>
</a>

 <a href="/admin/register.php" class="dropdown-item notify-item">
<i class="mdi mdi-account-edit mr-1"></i>
<span><span class="iconfont icon-friendadd"></span> 注册</span>
</a>
<?php } ?>

</div>
</li>



</ul>
<button class="button-menu-mobile open-left disable-btn">
<span class="iconfont icon-list"></span>
</button>

<div class="button-menu-mobile open-left disable-btn">
<img src="<?php $this->options->logoUrl(); ?>" alt="LOGO" height="16">
</div>

<div class="app-search">
<form name="search" method="get" action="/">
<div class="input-group">
<input type="text" name="s" class="form-control" placeholder="请输入关键词">
<span class="mdi mdi-magnify"></span>
<div class="input-group-append">
<button class="btn btn-primary" type="submit">搜索一下</button>
</div>
</div>
</form>
</div>

</div>