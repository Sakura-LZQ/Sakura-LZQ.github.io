<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="left-side-menu">
<div class="slimscroll-menu active" id="left-side-menu-container">
<a href="/" class="logo text-center">
<span class="logo-lg">
<img src="<?php $this->options->logoUrl(); ?>" alt="LOGO" title="LOGO" height="16">
</span>
<span class="logo-sm">
<img src="<?php $this->options->logoUrl(); ?>" alt="LOGO" title="LOGO" height="16">
</span>
</a>

<ul class="metismenu side-nav in">
	<li class="side-nav-title side-nav-item"><?php $this->options->title(); ?></li>
	<li class="side-nav-item">
	<a href="javascript: void(0);" class="side-nav-link">
	<i class="iconfont icon-lihe"></i>
	<span class="float-right"><span class="iconfont icon-right"></span></span>
	<span> 分类 </span>
	</a>
	<ul class="side-nav-second-level collapse" aria-expanded="false">
		<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
		<?php while($categorys->next()): ?>
		<?php if ($categorys->levels === 0): ?>
		<?php $children = $categorys->getAllChildren($categorys->mid); ?>
		<li class="side-nav-item">
		<a href="<?php $categorys->permalink(); ?>" data-toggle="tooltip" data-placement="bottom" alt="<?php $categorys->name(); ?>" title="<?php $categorys->name(); ?>"><i class="iconfont <?php tubiao($categorys->description); ?>"></i> <?php $categorys->name(); ?>
		<span class="float-right"><span class="iconfont icon-right"></span></span>
		</a>
		<?php if (!empty($children)) { ?>
		<ul class="side-nav-third-level collapse" aria-expanded="false">
		<?php foreach ($children as $mid) { ?>
		<?php $child = $categorys->getCategory($mid); ?>
		<li>
		<a href="<?php echo $child['permalink'] ?>" data-toggle="tooltip" data-placement="bottom" alt="<?php echo $child['name']; ?>" title="<?php echo $child['name']; ?>"><i class="iconfont <?php tubiao($child->description); ?>"></i> <?php echo $child['name']; ?> <span class="badge badge-light float-right"><?php echo $child['count']; ?></span></a>
		</li>
		<?php } ?>
		</ul>
		 <?php } ?>
		</li>
		<?php endif; ?>
		<?php endwhile; ?>
	</ul>
	</li>

	<li class="side-nav-item">
	<a href="javascript: void(0);" class="side-nav-link">
	<i class="iconfont icon-faxian"></i>
	<span> 页面 </span>
	<span class="float-right"><span class="iconfont icon-right"></span></span>
	</a>
	<ul class="side-nav-second-level collapse" aria-expanded="false">
		<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		<?php while($pages->next()): ?>		
		<li><a href="<?php $pages->permalink(); ?>" data-toggle="tooltip" data-placement="bottom" alt="<?php $pages->title(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
	</li>

	<li class="side-nav-item">
	<a href="javascript: void(0);" class="side-nav-link">
	<i class="iconfont icon-paihangbang"></i>
	<span> 归档 </span>
	<span class="float-right"><span class="iconfont icon-right"></span></span>
	</a>
	<ul class="side-nav-second-level collapse" aria-expanded="false">
		<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 m 月')->parse('<li><a href="{permalink}"  data-toggle="tooltip" data-placement="bottom" alt="{date}" title="{date}">{date} <span class="badge badge-light float-right">{count}</span></a></li>'); ?>
	</ul>
	</li>

	<li class="side-nav-item">
	<a href="javascript: void(0);" class="side-nav-link">
	<i class="iconfont icon-footprint"></i>
	<span> 友链 </span>
	<span class="float-right"><span class="iconfont icon-right"></span></span>
	</a>

	<ul class="side-nav-second-level collapse" aria-expanded="false">
		 <?php 
			$mypattern1 = "<li><a href='{url}' data-toggle='tooltip' data-placement='bottom' alt='{name}' title='{name}'>{name}</a></li>";
			Links_Plugin::output($mypattern1, 0, "ten");
		?>
	</ul>
	</li>

	<li class="side-nav-item">
		<a href="javascript: void(0);" class="side-nav-link">
		<i class="iconfont icon-share"></i>
		<span> RSS </span>
		<span class="float-right"><span class="iconfont icon-right"></span></span>
		</a>
		<ul class="side-nav-second-level collapse" aria-expanded="false">
			<li><a href="<?php $this->options->feedUrl(); ?>"><i class="iconfont icon-paihangbang"></i> 文章RSS</a></li>
			<li><a href="<?php $this->options->commentsFeedUrl(); ?>"><i class="iconfont icon-footprint"></i> 评论RSS</a></li>
		</ul>
	</li>


	<li class="side-nav-item">
		<a href="javascript: void(0);" class="side-nav-link">
		<i class="iconfont icon-shuju"></i>
		<span> 统计 </span>
		<span class="float-right"><span class="iconfont icon-right"></span></span>
		</a>
		<ul class="side-nav-second-level collapse" aria-expanded="false">
			<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
			<li><a href="javascript: void(0);"><i class="iconfont icon-edit_light"></i> 文章：<?php $stat->publishedPostsNum() ?>篇</a></li>
			<li><a href="javascript: void(0);"><i class="iconfont icon-sortlight"></i> 分类：<?php $stat->categoriesNum() ?>个</a></li>
			<li><a href="javascript: void(0);"><i class="iconfont icon-mark"></i> 评论：<?php $stat->publishedCommentsNum() ?>条</a></li>
			<li><a href="javascript: void(0);"><i class="iconfont icon-ceshi"></i> 页面：<?php $stat->publishedPagesNum() ?>个</a></li>

		</ul>
	</li>


<div class="help-box" style="color:#cedce4;">
<?php $this->widget('Widget_Comments_Recent','ignoreAuthor=true','pageSize='.$this->options->pinglun)->to($comments); ?>
<?php while($comments->next()): ?>
    <div class="media pt-3">
      <span class="bd-placeholder-img mr-2 rounded"><?php $comments->gravatar(30); ?></span>
      <p class="media-body pb-3 mb-0 small lh-125 border-gray" style="border-bottom: 1px dashed #babcee;">
        <strong class="d-block text-gray-dark">@<?php $comments->author(false); ?> </strong>
        <a href="<?php $comments->permalink(); ?>" style="color: #cedce4;"><?php $comments->excerpt(32, '...'); ?></a>
      </p>
    </div>
<?php endwhile; ?>
</div>


</ul>

<div class="clearfix"></div>
</div>
</div>