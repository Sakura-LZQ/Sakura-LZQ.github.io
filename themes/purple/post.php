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
<?php if($this->user->hasLogin()):?>
<div class="dropdown-menu dropdown-menu-right">
	<a href="/admin/write-post.php?cid=<?php echo $this->cid;?>" class="dropdown-item"><i class="iconfont icon-bianji"></i> 编辑</a>
</div>
<?php endif;?>
</div>

<h3 class="mt-0" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->title() ?>" title="<?php $this->title() ?>">
<?php $this->title() ?>
</h3>
<div class="badge badge-info mb-3" data-toggle="tooltip" data-placement="bottom" alt="<?php biaoshi($this); ?>" title="<?php biaoshi($this); ?>"><?php biaoshi($this); ?></div>
<div class="badge badge-success mb-3" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->author(); ?>" title="<?php $this->author(); ?>"><?php $this->author(); ?></div>
<div class="badge badge-light mb-3" data-toggle="tooltip" data-placement="bottom" alt="<?php echo art_count($this->content); ?>字数" title="<?php echo art_count($this->content); ?>字数"><a href="#"><?php echo art_count($this->content); ?>字数</a></div>
<div class="float-right badge badge-light mb-3" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->category('',false); ?>" title="<?php $this->category('',false); ?>"><?php $this->category(); ?></div>
<p class="text-muted mb-2">
<?php

$db = Typecho_Db::get();
$sql = $db->select()->from('table.comments')
    ->where('cid = ?',$this->cid)
    ->where('mail = ?', $this->remember('mail',true))
    ->where('status = ?', 'approved')
//只有通过审核的评论才能看回复可见内容
    ->limit(1);
$result = $db->fetchAll($sql);
if($this->user->hasLogin() || $result) {
    $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view">$1</div>',$this->content);
}
else{
    $content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view">此处内容需要评论回复后方可阅读。</div>',$this->content);
}
	$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';

	$replacement = '<a href="$1" data-fancybox="gallery" /><img class="lazy img-fluid" src="" data-original="$1" alt="'.$this->title.'" title="'.$this->title.'"></a>';

	$content = preg_replace($pattern, $replacement, $content);

	echo $content;

?></p>

<div style="border: 1px dashed #ddd; padding: 20px 0 0 0;">
<div class="text-center w-75 m-auto">
<h4 class="text-dark-50 text-center mt-0 font-weight-bold">版权协议须知！</h4>
<p class="text-muted mb-4">本篇文章来源于
<a class="badge badge-primary" href="<?php if($this->fields->banquanurl){echo $this->fields->banquanurl();}else{echo '/';}?>" rel="nofollow" target="_blank">
<?php if($this->fields->banquan){echo $this->fields->banquan();}else{echo '网络转载';}?></a>
，如本文章侵犯到任何版权问题，请立即告知本站，本站将及时予与删除并致以最深的歉意</p>
</div>
</div>

<div>
<h5></h5>
<div class="tagss"><?php $this->tags('', true, 'none'); ?></div>
</div>

<div class="row hidden-xs">
<div class="col-md-4">
<div class="mb-4">
<h5>发布时间</h5>
<p data-toggle="tooltip" data-placement="bottom" alt="<?php $this->date(); ?>" title="<?php $this->date(); ?>"><span class="iconfont icon-time"></span> <?php $this->date(); ?></p>
</div>
</div>
<div class="col-md-4">
<div class="mb-4">
<h5>文章阅读</h5>
<p data-toggle="tooltip" data-placement="bottom" alt="<?php get_post_view($this); ?>" title="<?php get_post_view($this); ?>"><span class="iconfont icon-hot_light"></span> <?php get_post_view($this); ?></p>
</div>
</div>
<div class="col-md-4">
<div class="mb-4">
<h5>网友评论</h5>
<p data-toggle="tooltip" data-placement="bottom" alt="<?php $this->commentsNum(); ?>" title="<?php $this->commentsNum(); ?>"><span class="iconfont icon-huati"></span> <?php $this->commentsNum(); ?></p>
</div>
</div>
</div>

<p class="card-text visible-xs-block">
<small class="text-muted">
<span class="pr-2 text-nowrap mb-2 d-inline-block" data-toggle="tooltip" data-placement="bottom" alt="<?php get_post_view($this); ?>" title="<?php get_post_view($this); ?>">
	<span class="iconfont icon-hot_light"></span> <?php get_post_view($this); ?>
</span>
<span class="pr-2 text-nowrap mb-2 d-inline-block" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->commentsNum(); ?>" title="<?php $this->commentsNum(); ?>">
	<span class="iconfont icon-huati"></span> <?php $this->commentsNum(); ?>
</span>
<span class="float-right text-muted" data-toggle="tooltip" data-placement="bottom" alt="<?php $this->date(); ?>" title="<?php $this->date(); ?>">
	<span class="iconfont icon-time"></span> <?php $this->date(); ?>
</span>
</small>
</p>


<div class="text-center">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
<i class="iconfont icon-lihe"></i> 打赏
</button>

<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExamplee" aria-expanded="false" aria-controls="collapseExamplee">
   <i class="iconfont icon-fenxiang"></i> 分享
</button>
</div>

<div class="collapse" id="collapseExamplee">
<br>
	<i class="iconfont icon-fenxiang"></i> 分享：
    <a href="http://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&pics=<?php GetThumFromContent($this); ?>" data-cmd="sqq" title="分享到QQ好友"><i class="iconfont icon-QQhaoyou"></i></a>
    <a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&site=<?php $this->options->title(); ?>/&pics=<?php GetThumFromContent($this); ?>" data-cmd="qzone" title="分享到QQ空间"><i class="iconfont icon-kongjian"></i></a>
    <a href="http://service.weibo.com/share/share.php?url=<?php $this->permalink() ?>/&appkey=<?php $this->options->title(); ?>/&title=<?php $this->title() ?>&pic=<?php GetThumFromContent($this); ?>" data-cmd="tsina" title="分享到新浪微博"><i class="iconfont icon-weibo2"></i></a>
    <a href="https://twitter.com/intent/tweet?text=<?php $this->title() ?>&amp;url=<?php $this->permalink() ?>"><i class="iconfont icon-twitter1"></i></a>
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php $this->permalink() ?>"><i class="iconfont icon-icon-facebook"></i></a>
    <a href="https://plus.google.com/share?url=<?php $this->permalink() ?>"><i class="iconfont icon-google1"></i></a>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="iconfont icon-lihe"></i> 打赏一下，各位朋友请随意打赏！</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="text-center">
			<img src="<?php $this->options->dashang(); ?>" width='200px' height='200px'><br>
			如果觉得我的文章对你有用，请随意赞赏
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="iconfont icon-forward"></i> 取消</button>
      </div>
    </div>
  </div>
</div>










</div> 
</div>

<div class="row">
<div class="col-md-12">
<div class="card d-block">
<div class="card-body">
<a href="<?php theNext($this); ?>"><span class='btn btn-primary'><i class="iconfont icon-back"></i>上一篇</span></a>
<a href="<?php thePrev($this); ?>"><span class="btn btn-primary float-right">下一篇<i class="iconfont icon-right"></i></span></a>

</div> 
</div>
</div> 
</div> 


<?php $this->options->yuedu(); ?>

<div class="row">
<?php $this->related('4')->to($relatedPosts); ?>
<?php while ($relatedPosts->next()): ?>
<div class="col-sm-6">
<div class="card card-body">
<h5 class="card-title"><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></h5>
<p class="card-text"><?php $relatedPosts->excerpt(32, '...'); ?></p>
<a href="<?php $relatedPosts->permalink(); ?>" class="btn btn-primary">阅读全文</a>
</div> 
</div> 
<?php endwhile; ?>
</div>
<?php $this->need('comments.php'); ?>

</div>
</div>
</div>
</div>

<?php $this->need('footer.php'); ?>