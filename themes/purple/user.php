<?php
/**
 * 个人介绍
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
<div class="container-fluid mt-4">
<div class="row">


<div class="col-md-12">
<div class="card">
<div class="card-body">

<div class="clearfix">
<div class="float-left mb-3">
<img src="<?php $this->options->touxiang(); ?>" alt="" height="18">
</div>
<div class="float-right">
<h4 class="m-0 d-print-none"><?php $this->options->mingcheng(); ?></h4>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="float-left mt-3">
<p><b>你好，欢迎查看我的个人简历</b></p>
<p class="text-muted font-13"><?php $this->options->jieshao(); ?></p>
</div>
</div>
<div class="col-sm-4 offset-sm-2">
<div class="mt-3 float-sm-right">
<?php 
	//对数据进行分割
	$jichuxx = explode('|',$this->options->jichuxx);

?>
<p class="font-13"><strong>出身日期: </strong> <?php echo $jichuxx['0'] ?></p>
<p class="font-13"><strong>个人性别: </strong> <span class="badge badge-success float-right"><?php echo $jichuxx['1'] ?></span></p>
<p class="font-13"><strong>居住地址: </strong> <span class="float-right"><?php echo $jichuxx['2'] ?></span></p>
</div>
</div>
</div>

<div class="row mt-4">
<div class="col-sm-4">
<h6>兴趣爱好</h6>
<address>
<?php $this->options->aihao(); ?>
</address>
</div> 
<div class="col-sm-4">
<h6>辉煌事迹</h6>
<address>
<?php $this->options->huihuang(); ?>
</address>
</div> 
<div class="col-sm-4">
<div class="text-sm-right">
<img src="<?php $this->options->beijing(); ?>" alt="关注二维码" class="img-fluid mr-2">
</div>
</div> 
 </div>




</div> 
</div> 
</div> 



</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
