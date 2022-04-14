<?php
/**
 * 一款简约美观的主题，感谢“国外大神”的模板贡献和“泽泽社长”的部分css样式支持
 * 
 * @package 炫紫模板
 * @author 寻梦xunm
 * @version 1.0
 * @link https://76wp.cn
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<?php $this->need('sidebar.php'); ?>
<div class="content-page">
<div class="content">
<?php $this->need('sidebar1.php'); ?>
<div class="container-fluid">

<div class="row visible-lgg-block">
<div class="col-12">
<div class="page-title-box">
<div class="page-title-right">
<a href="<?php $this->options->tougao(); ?>"><span class="btn btn-success btn-sm ml-3"><span class="iconfont icon-chuangzuo"></span> 投稿</span></a>
</div>
<h4 class="page-title">最新文章</h4>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="page-title-box">
<form method="get" action="/" role="search">   
<div class="input-group mt-3 mb-3 hidden-lgg">
<input type="text" name="s" class="form-control" placeholder="请输入关键词">
<div class="input-group-append"> <button class="btn btn-primary" type="submit">搜索一下</button>
</div>
</div>
</form>
</div>
</div>
</div>

<div class="row">

<?php if ($this->options->zidingyi1 != ''): ?>	
<div class="col-12 col-md-6 mb-3">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner lunbo">
	<?php $this->widget('Widget_Archive@index_zidingyi1', 'pageSize=3&type=category', 'mid='.$this->options->zidingyi1)->to($zidingyi1); ?>
	<?php while($zidingyi1->next()): ?>
	<?php if (($zidingyi1->_currentPage == 1) && ($zidingyi1->sequence == 1)): ?>
		<div class="carousel-item active ze-over">
		  <a href="<?php $zidingyi1->permalink(); ?>"><img src="<?php echo GetThumFromContent($zidingyi1); ?>" alt="<?php $zidingyi1->title(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php $zidingyi1->title(); ?>"></a>
		</div>
	<?php else: ?>
		<div class="carousel-item ze-over">
		  <a href="<?php $zidingyi1->permalink(); ?>"><img src="<?php echo GetThumFromContent($zidingyi1); ?>" alt="<?php $zidingyi1->title(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php $zidingyi1->title(); ?>"></a>
		</div>
	<?php endif; ?>
	<?php endwhile; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">左</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">右</span>
  </a>
</div>
</div>
<?php endif; ?>

<?php if ($this->options->zidingyi2 != ''): ?>	
<div class="col-12 col-md-6 mb-3">
<div class="row">
<?php if ($this->options->hot != ''): ?>
	<?php hotpost(); ?>
<?php endif; ?>
<?php $this->widget('Widget_Archive@index_zidingyi2', 'pageSize=2&type=category', 'mid='.$this->options->zidingyi2)->to($zidingyi2); ?>
	<?php while($zidingyi2->next()): ?>
		<div class="col-6 mt5">
		<div class="ze-over">
		<a href="<?php $zidingyi2->permalink(); ?>">
		<img class="lazy" src="<?php $this->options->themeUrl('img/thumbnail.png'); ?>" data-original="<?php echo GetThumFromContent($zidingyi2); ?>" alt="<?php $zidingyi2->title() ?>" data-toggle="tooltip" data-placement="bottom" title="<?php $zidingyi2->title() ?>">
		</a>
		<div class="card-img-overlay">
			<div class="badge badge-success p-1"><?php $zidingyi2->category(',',false); ?></div>
		</div>
		<div class="zeze-over"><a href="<?php $zidingyi2->permalink(); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php $zidingyi2->title('32'); ?>"><span class="title"><?php $zidingyi2->title('32'); ?></span></a></div>
		</div>
		</div>
<?php endwhile; ?>
</div>
</div>
<?php endif; ?>

</div>



<?php $this->options->headgg(); ?>



<div class="row">
<div class="col-md-12">
<?php if ($this->have()): ?>
<div class="row" id="rongqi">
<?php while($this->next()): ?>
<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-4 hang">
<div class="card-deck-wrapper" style="padding: 0 0 15px;">
<div class="card-deck">
<div class="card d-block">
<a href="<?php $this->permalink(); ?>" alt="<?php $this->title() ?>">
<img class="lazy card-img-top" src="<?php $this->options->themeUrl('img/thumbnail.png'); ?>" data-original="<?php echo GetThumFromContent($this); ?>" alt="<?php $this->title() ?>" data-toggle="tooltip" data-placement="bottom" title="<?php $this->title() ?>" style="height: 150px;">
</a>

<div class="card-overlay">
	<div class="badge badge-secondary"><?php biaoshi($this); ?></div>
</div>


<div class="card-body">
<h5 class="card-title"><a href="<?php $this->permalink(); ?>" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->title() ?>" title="<?php $this->title() ?>"><?php $this->title('20') ?></a></h5>
<p class="card-text">
<?php $this->excerpt(18, '...'); ?>
</p>
<p class="card-text">
<small class="text-muted">

<span class="pr-2 text-nowrap mb-2 d-inline-block" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->author(); ?>" title="<?php $this->author(); ?>">
	<span class="iconfont icon-people"></span> <?php $this->author(); ?>
</span>

<span class="pr-2 text-nowrap mb-2 d-inline-block" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->category(',',false); ?>" title="<?php $this->category(',',false); ?>">
	<span class="iconfont icon-we_light"></span> <?php $this->category(',',false); ?>
</span>

<span class="float-right text-muted" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->date(); ?>" title="<?php $this->date(); ?>"><span class="iconfont icon-time"></span> <?php $this->date(); ?></span>

</small>
</p>
</div>
</div> 
</div> 
</div> 
</div> 
<?php endwhile; ?> 

</div>
<div class="fenyeh">
<div class="pagination">
	<?php $this->pageNav('上一页', '下一页', 2, '...', array('wrapTag' => 'ul', 'wrapClass' => 'page-navigator', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'active', 'prevClass' => 'prev-page', 'nextClass' => 'next-page')); ?>
	<?php if($this->_currentPage < ceil($this->getTotal() / $this->parameter->pageSize)): ?>
	<?php $this->pageLink('<span class="jiazai">点击加载更多</span>','next'); ?><?php endif; ?>
</div>
</div>
<?php else: ?>

<div class="row justify-content-center">
<div class="col-lg-4">
<div class="text-center">
<h1 class="text-error mt-4">無</h1>
<h4 class="text-uppercase text-danger mt-3">没有找到相关信息</h4>
<p class="text-muted mt-3">你好，非常的抱歉本站没有你要查找的信息</p>
<a class="btn btn-info mt-3" href="/"><i class="mdi mdi-reply"></i> 回到首页</a>
</div> 
</div> 
</div>
<?php endif; ?>

</div>
</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
