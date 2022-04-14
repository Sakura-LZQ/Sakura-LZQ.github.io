<?php
/**
 * 网友动态
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

<div class="text-center">
 <h3 class="">网友动态朋友圈</h3>
<p class="text-muted mt-3"> 这里聚集了来自全世界各地的朋友分享他们的事迹和动态</p>
<a href="/admin/login.php"><button type="button" class="btn btn-success btn-sm mt-2"><span class="iconfont icon-my_light"></span> 登录</button></a>
<a href="/admin/register.php"><button type="button" class="btn btn-info btn-sm mt-2 ml-1"><span class="iconfont icon-friend_light"></span> 注册</button></a>
</div>
<br>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 <div id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?> hang">
		<div class="media mt-2">
		<?php $number=$comments->mail; echo '<img src="http://q2.qlogo.cn/headimg_dl? bs='.$number.'&dst_uin='.$number.'&dst_uin='.$number.'&;dst_uin='.$number.'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="46px" height="46px" class="mr-3 avatar-sm rounded-circle b-lazy">'; ?></span>

			<div class="media-body">
				<div id="comment-<?php $comments->theId(); ?>">
					<h5 class="mt-0">
						<?php $comments->author(); ?> <?php if ($comments->authorId == $comments->ownerId) { echo "<span class='iconfont icon-huiyuan'></span>";} ?> <?php getBrowser($comments->agent); ?> <?php getOs($comments->agent); ?>
					</h5>
					<p>
						<?php 
							$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
							$replacement = '<a href="$1" data-fancybox="gallery" /><img class="lazy img-fluid" src="" data-original="$1"></a>';
							$content = preg_replace($pattern, $replacement, $comments->content);
							echo $content;
						?>
					</p>
					<p class="text-muted mb-0">
					<span class="mr-1"> <?php if ($comments->authorId == $comments->ownerId) { echo "<span class='iconfont icon-crown'></span> 作者";}else{ echo "<span class='iconfont icon-my_light'></span> 访客";} ?></span>
					<span class="mr-1"><span class='iconfont icon-dengji1'></span> <?php dengji($comments->mail);?></span>
					<span class="mr-1"><span class='iconfont icon-shijian'></span> <?php $comments->date('Y-m-d H:i'); ?></span>
					</p>
				</div>
			</div>
		</div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>

</div>
<?php } ?>

<?php if($this->allow('comment')){ ?>

<div class="card">
	<div class="card-body" id="comments">
	<?php $this->comments()->to($comments); ?>
	 <div id="<?php $this->respondId(); ?>">
        <div class="cancel-comment-reply">
			<?php $comments->cancelReply('<span class="tx-btn">取消回复</span>'); ?>
        </div>
		
		<div id="respond-post-1886" class="respond">
		<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
		<?php if($this->user->hasLogin()): ?>	

		<textarea class="form-control form-control-light mb-2" name="text" placeholder="写点什么" id="comment" onclick='document.getElementById("comment-form-do").style.display="block";' rows="3" required></textarea>
		<div class="row mb-2">
		<div class="col-12">
		<span class="trigger btn btn-sm btn-primary"><?php $comments->smilies(); ?></span>
		<div class="float-right">
			<button type="submit" class="btn btn-primary btn-sm submit" id="misubmit">提交</button>
		</div>

		</div>

		</div>

		<?php endif; ?> 
		</form>
		</div>
	</div>
	</div>
	</div>
<div class="card">
	<div class="card-body" id="comments">
	<h4 class="header-title mt-3 mb-2" style="border-bottom: 1px solid #eaeaea;padding-bottom: 5px;"><span class="iconfont icon-coffee"></span> 共<code><?php $this->commentsNum(_t('0'), _t('1'), _t('%d')); ?></code>条动态</h4>

		<?php if ($comments->have()): ?>
			<?php $comments->listComments(); ?>
		<?php else: ?>	
				
		<?php endif; ?>
		<div class="pagination">
			<?php $comments->pageNav('上一页', '下一页', 2, '...', array('wrapTag' => 'ul', 'wrapClass' => 'page-navigator', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'active', 'prevClass' => 'prev-page', 'nextClass' => 'next-page')); ?>
		</div>
		<div class="text-center mt-2"></div>
	</div>
</div>

	<?php }else{ ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php } ?>

</div>
</div>
</div>
</div>

<?php $this->need('footer.php'); ?>
