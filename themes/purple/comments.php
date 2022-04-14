<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

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
?>">
    <div id="<?php $comments->theId(); ?>">
		<div class="media mt-2">
			<?php $number=$comments->mail; echo '<img src="http://q2.qlogo.cn/headimg_dl? bs='.$number.'&dst_uin='.$number.'&dst_uin='.$number.'&;dst_uin='.$number.'&spec=100&url_enc=0&referer=bu_interface&term_type=PC" width="46px" height="46px" class="mr-3 avatar-sm rounded-circle b-lazy">'; ?>


			<div class="media-body" style="border-bottom: 1px dashed #d7d7d7;">
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
					<span class="float-right comment-reply cp-comment-<?php $comments->theId(); ?>"><?php $comments->reply(); ?></span>
					</p>
				</div>
			</div>
			<span style="border-bottom: 1px dashed #d7d7d7;"></span>
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
	 <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
			<?php $comments->cancelReply('<span class="badge badge-info mb-3">取消</span>'); ?>
        </div>
		
		<div id="respond-post-<?php $this->respondId(); ?>">
		<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
		<?php if($this->user->hasLogin()): ?>
				<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>	
		<?php else: ?>
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group mbm mtm">
					<input type="text" name="author" id="author" class="form-control" placeholder="称呼 *" value="<?php $this->remember('author'); ?>" required />
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group mbm mtm">
					<input type="email" name="mail" id="mail" class="form-control" placeholder="电子邮箱 *" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group mbm mtm">
					<input type="url" name="url" id="url" class="form-control" placeholder="网址(http://)" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
				</div>
			</div>
		</div>
		<?php endif; ?> 

		<textarea class="comment-textarea form-control form-control-light mb-2" id="comment" onclick='document.getElementById("comment-form-do").style.display="block";' name="text" placeholder="写点什么" rows="3" required><?php $this->remember('text'); ?></textarea>
			
		<div class="row mb-2">
		<div class="col-12">
		<span class="trigger btn btn-sm btn-primary"><?php $comments->smilies(); ?></span>
		
		<div class="float-right">
			<button type="submit" class="btn btn-primary btn-sm submit" id="misubmit">提交</button>
		</div>

		</div>

		</div>

		</form>
		</div>
	</div>
	</div>
</div>

<?php }else{ ?>
<div class="row">
	<div class="col-md-12">
		<div class="card d-block">
			<div class="card-body">
				<?php _e('评论已关闭'); ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<div class="card">
	<div class="card-body" id="comments">
			<h4 class="header-title mt-3 mb-2" style="border-bottom: 1px solid #eaeaea;padding-bottom: 5px;"><span class="iconfont icon-coffee"></span> 共<code><?php $this->commentsNum(_t('0'), _t('1'), _t('%d')); ?></code>条评论</h4>
			<?php $comments->listComments(); ?>
			<div class="pagination">
				<?php $comments->pageNav('上一页', '下一页', 2, '...', array('wrapTag' => 'ul', 'wrapClass' => 'page-navigator', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'active', 'prevClass' => 'prev-page', 'nextClass' => 'next-page')); ?>
			</div>
	</div>
</div>
		<?php endif; ?>