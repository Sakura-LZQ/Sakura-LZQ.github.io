<?php
/**
 * 友情链接
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<?php $this->need('sidebar.php'); ?>
<div class="content-page">
<div class="content">
<?php $this->need('sidebar1.php'); ?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">



  <div class="btn btn-primary d-flex p-3 my-3">
    <img class="mr-3" src="<?php $this->options->touxiang(); ?>" alt="" width="48" height="48">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">合作网站</h6>
      <small>友链合作请在下方留言</small>
    </div>
  </div>



<div class="card d-block">
<div class="card-body">
<h4 class="mt-0">推荐链接</h4>
<div class="row">

 <?php 
	$mypattern1 = "
<div class='col-md-4'>
<div class='text-center mt-3 pl-1 pr-1'>
<a href='{url}'><img class='lazy dripicons-jewel bg-primary text-white mb-2' data-original='{image}' width='60px' height='60px'></a>
<h5 class='text-uppercase'><a href='{url}'>{name}</a></h5>
<p class='text-muted'>{description}</p>
</div>
</div>
";
	Links_Plugin::output($mypattern1, 0, "good");
?>


</div>
</div> 
</div> 


<div class="card d-block">
<div class="card-body">
<h4 class="mt-0">内页链接</h4>
<div class="row">

 <?php 
	$mypattern1 = "
<div class='col-md-4'>
<div class='text-center mt-3 pl-1 pr-1'>
<a href='{url}'><img class='lazy dripicons-jewel bg-primary text-white mb-2' data-original='{image}' width='60px' height='60px'></a>
<h5 class='text-uppercase'><a href='{url}'>{name}</a></h5>
<p class='text-muted'>{description}</p>
</div>
</div>
";
	Links_Plugin::output($mypattern1, 0, "one");
?>


</div>
</div> 
</div> 




<?php $this->need('comments.php'); ?>

</div>


</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
