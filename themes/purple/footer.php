<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->options->footgg(); ?>
<footer class="footer">
<div class="container-fluid">
<div class="row">
<div class="col-md-6">
&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>" alt="<?php $this->options->title(); ?>" title="<?php $this->options->title(); ?>"><?php $this->options->title(); ?></a>.
</div>
<div class="col-md-6">
<div style="text-align: center;">
<a href="http://beian.miit.gov.cn/"><?php $this->options->beianhao(); ?></a>
<?php $this->options->tongjidm(); ?>
</div>
</div>
</div>
</div>
</footer>
<div class="setting_tool">
    <a class="back2top" style=""><span class="iconfont icon-fold"></span></a>
    <a class="sosearch"><span class="iconfont icon-search_light"></span></a>
    <a class="socolor"><span class="iconfont icon-apps"></span></a>
    <div class="s">
		<form method="get" action="/" role="search" class="search"> 
            <input class="search-key" name="s" autocomplete="off" placeholder="输入关键词..." type="text" required="required">
        </form>
    </div>
    <div class="c">
        <ul>
            <li class="color undefined">默认</li>
            <li class="color sepia">护眼</li>
            <li class="color night">夜晚</li>
            <li class="hr"></li>
            <li class="color serif">壁纸</li>
            <li class="color sans">默认</li>
        </ul>
    </div>
</div>

</div>
</div>
<script src="<?php $this->options->themeUrl('js/jquery-3.3.1.slim.min.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/app.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/script.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/lazyload.min.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/jquery.fancybox.min.js'); ?>" type="text/javascript"></script>
<script src="<?php $this->options->themeUrl('js/highlight.min.js'); ?>" type="text/javascript"></script>
<?php $this->footer(); ?>
<?php $this->options->toubu(); ?>
<script type="text/javascript">
$(function() {
    $("img.lazy").lazyload({
        threshold : 200, // 设置阀值
        effect : "fadeIn" // 设置图片渐入特效
    });
});	
$(document).ready(function () {
    $( ".fancybox").fancybox();

 });
hljs.initHighlightingOnLoad();
$(document).ready(function(){$("a[href*='://']:not(a[href^='<?php $this->options->siteUrl(); ?>'])").attr({target:"_blank"})});
jQuery(document).ready(function($) {
if(!$("#nojia").length > 0){
    //点击下一页的链接(即那个a标签)
    $('.next span').click(function() {
        $this = $(this);
        $this.addClass('loading').text('正在努力加载'); //给a标签加载一个loading的class属性，用来添加加载效果
        var href =  $('.next').attr('href'); //获取下一页的链接地址
        if (href != undefined) { //如果地址存在
            $.ajax({ //发起ajax请求
                url: href,
                //请求的地址就是下一页的链接
                type: 'get',
                //请求类型是get
                error: function(request) {
                    //如果发生错误怎么处理
                },
                success: function(data) { //请求成功
                    $this.removeClass('loading').text('点击加载更多'); //移除loading属性
                    var $res = $(data).find('.hang'); //从数据中挑出文章数据，请根据实际情况更改
					$('#rongqi').append($res.fadeIn(500)); //将数据加载加进posts-loop的标签中。
					  $("img.lazy").lazyload({
							threshold : 200, // 设置阀值
							effect : "fadeIn" // 设置图片渐入特效
						});
    
                    var newhref = $(data).find('.next').attr('href'); //找出新的下一页链接
                    if (newhref != undefined) {
$('.next').attr('href', newhref);
                    } else {
                        $('.next').addClass('loading').text();//如果没有下一页了提示内容
                        $('.next').attr('href', 'javascript:void(0);');
                    }
                }
            });
        }
        return false;
    });
}
});
</script>
</body>
</html>
