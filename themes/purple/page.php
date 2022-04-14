<?php
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
<div class="card d-block">
<div class="card-body">
<div class="dropdown float-right">
<a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
<span class="iconfont icon-more_light"></span> 
</a>
<div class="dropdown-menu dropdown-menu-right">
<?php if($this->user->hasLogin()):?>
	<a href="/admin/write-page.php?cid=<?php echo $this->cid;?>" class="dropdown-item"><i class="mdi mdi-pencil mr-1"></i>编辑</a>
<?php endif;?>

</div>
</div>

<h3 class="mt-0">
<?php $this->title() ?>
</h3>
<div class="badge badge-success mb-3"><?php $this->author(); ?></div>
<p class="text-muted mb-2">
<?php
	$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';

	$replacement = '<img class="lazy img-fluid" src="" data-original="$1" alt="'.$this->title.'" title="'.$this->title.'">';

	$content = preg_replace($pattern, $replacement, $this->content);

	echo $content;
?></p>
<div class="row hidden-xs">
<div class="col-md-4">
<div class="mb-4">
<h5>发布时间</h5>
<p><span class="iconfont icon-time"></span> <?php $this->date(); ?></p>
</div>
</div>
<div class="col-md-4">
<div class="mb-4">
<h5>文章阅读</h5>
<p><span class="iconfont icon-hot_light"></span> <?php get_post_view($this); ?></p>
</div>
</div>
<div class="col-md-4">
<div class="mb-4">
<h5>网友评论</h5>
<p><span class="iconfont icon-huati"></span> <?php $this->commentsNum(); ?></p>
</div>
</div>
</div>


<p class="card-text visible-xs-block">
<small class="text-muted">
<span class="pr-2 text-nowrap mb-2 d-inline-block">
	<span class="iconfont icon-hot_light"></span> <?php get_post_view($this); ?>
</span>
<span class="pr-2 text-nowrap mb-2 d-inline-block">
	<span class="iconfont icon-huati"></span> <?php $this->commentsNum(); ?>
</span>
<span class="float-right text-muted"><span class="iconfont icon-time"></span> <?php $this->date(); ?></span>
</small>
</p>







</div> 
</div>



<?php $this->need('comments.php'); ?>

</div>



</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
