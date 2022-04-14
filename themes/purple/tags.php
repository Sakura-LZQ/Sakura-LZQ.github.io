<?php
/**
 * 标签中心
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

<div class="text-center btn btn-primary btn-block">
 <h3 class="">标签一百零八词</h3>
<p class="text-muted mt-3"> 在这里你可以看到那些年使用次数最多的热搜词</p>
</div>
<div class="card">
<div class="card-body">
<div class="button-list">

<?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 108))->to($tags); ?>   
<?php while($tags->next()): ?>   
<a href="<?php $tags->permalink(); ?>"><button class="btn btn-outline-success btn-rounded"><?php $tags->name(); ?>(<?php $tags->count(); ?>)</button></a>
<?php endwhile; ?>
</div>
</div>
</div>











</div>
</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
