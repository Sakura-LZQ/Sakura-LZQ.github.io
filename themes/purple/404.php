<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<?php $this->need('sidebar.php'); ?>
<div class="content-page">

<div class="content">
<?php $this->need('sidebar1.php'); ?>

<div class="row">
<div class="col-md-12">


<div class="row justify-content-center">
<div class="col-lg-4">
<div class="text-center">
<h1 class="text-error mt-4">404</h1>
<h4 class="text-uppercase text-danger mt-3">没有找到相关信息</h4>
<p class="text-muted mt-3">你好，非常的抱歉本站没有你要查找的信息</p>
<a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> 回到首页</a>
</div> 
</div> 
</div>


</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
