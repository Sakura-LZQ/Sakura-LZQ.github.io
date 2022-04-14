<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('myyodux','one');
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('myyodux','one');
class myyodux {
    public static function one($con,$obj,$text)
    {
      $text = empty($text)?$con:$text;
      if(!$obj->is('single')){
      $text = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'',$text);
      }
      
               return $text;
}
}
function themeConfig($form) {
$db = Typecho_Db::get();
$sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:purple'));
$ysj = $sjdq['value'];
if(isset($_POST['type']))
{ 
if($_POST["type"]=="备份模板数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Yodubf'))){
$update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:Yodubf');
$updateRows= $db->query($update);
echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}else{
if($ysj){
     $insert = $db->insert('table.options')
    ->rows(array('name' => 'theme:Yodubf','user' => '0','value' => $ysj));
     $insertId = $db->query($insert);
echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}
}
        }
if($_POST["type"]=="还原模板数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Yodubf'))){
$sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Yodubf'));
$bsj = $sjdub['value'];
$update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:purple');
$updateRows= $db->query($update);
echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
<?php
}else{
echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
}
}
if($_POST["type"]=="删除备份数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:Yodubf'))){
$delete = $db->delete('table.options')->where ('name = ?', 'theme:Yodubf');
$deletedRows = $db->query($delete);
echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}else{
echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
}
}
    }
echo '<form class="protected" action="?yodubf" method="post">
<input type="submit" name="type" class="btn btn-s" value="备份模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="还原模板数据" />&nbsp;&nbsp;<input type="submit" name="type" class="btn btn-s" value="删除备份数据" /></form>';

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);
	
	$touxiang = new Typecho_Widget_Helper_Form_Element_Text('touxiang', NULL, NULL, _t('博主头像'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($touxiang);
    
	$beijing = new Typecho_Widget_Helper_Form_Element_Text('beijing', NULL, NULL, _t('关注二维码'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($beijing);

	$dashang = new Typecho_Widget_Helper_Form_Element_Text('dashang', NULL, NULL, _t('打赏二维码'), _t('在这里填入一个图片 URL 地址'));
    $form->addInput($dashang);	
	
	$mingcheng = new Typecho_Widget_Helper_Form_Element_Text('mingcheng', NULL, '寻梦xunm', _t('博主名称'), _t('请在这里输入博主名称'));
    $form->addInput($mingcheng);

	$jieshao = new Typecho_Widget_Helper_Form_Element_Textarea('jieshao', NULL, '追寻最初的心，坚持走下去。', _t('博主介绍'), _t('请在这里输入博主介绍'));
    $form->addInput($jieshao);


	$jichuxx = new Typecho_Widget_Helper_Form_Element_Textarea('jichuxx', NULL, '2020,1,01|男性|中国', _t('基础信息'), _t('这里请严格按照说明填写，格式如下(2020,1,01|男性|中国)请用英文下的|进行分隔'));
    $form->addInput($jichuxx);

	$aihao = new Typecho_Widget_Helper_Form_Element_Textarea('aihao', NULL, '这位兄台暂无兴趣爱好可取', _t('兴趣爱好'), _t('这里直接填写你的兴趣爱好等(可以使用html换行标签)'));
    $form->addInput($aihao);

	$huihuang = new Typecho_Widget_Helper_Form_Element_Textarea('huihuang', NULL, '这位大侠暂无辉煌事情宣告天下', _t('辉煌事迹'), _t('这里直接填写你的辉煌事迹等(可以使用html换行标签)'));
    $form->addInput($huihuang);


	$beianhao = new Typecho_Widget_Helper_Form_Element_Text('beianhao', NULL, NULL, _t('备案号'), _t('请直接在这里填写你的备案号'));
    $form->addInput($beianhao);
	
    $tougao = new Typecho_Widget_Helper_Form_Element_Text('tougao', NULL, '', _t('投稿地址'), _t('请在这里填写文章投稿的URL地址'));
    $form->addInput($tougao);

    $zidingyi1 = new Typecho_Widget_Helper_Form_Element_Text('zidingyi1', NULL, '1', _t('自定义一'), _t('请在这里填写分类MID即可'));
    $form->addInput($zidingyi1);

    $zidingyi2 = new Typecho_Widget_Helper_Form_Element_Text('zidingyi2', NULL, '1', _t('自定义二'), _t('请在这里填写分类MID即可'));
    $form->addInput($zidingyi2);
 
	$hot = new Typecho_Widget_Helper_Form_Element_Text('hot', NULL, _t('1'), _t('置顶文章'), _t('请输入要置顶展示文章的cid，多个请用英文逗号分开'));
    $form->addInput($hot);

	$toubu = new Typecho_Widget_Helper_Form_Element_Textarea('toubu', NULL, '', _t('头部自定义'), _t('此处的代码将直接用于网页head标签当中'));
    $form->addInput($toubu);


	$jiaobu = new Typecho_Widget_Helper_Form_Element_Textarea('jiaobu', NULL, '', _t('脚部自定义'), _t('此处的代码将直接用于网页body标签当中'));
    $form->addInput($jiaobu);

	$tongjidm = new Typecho_Widget_Helper_Form_Element_Textarea('tongjidm', NULL, '', _t('统计代码'), _t('请在此处直接填写统计代码即可'));
    $form->addInput($tongjidm);

	$footgg = new Typecho_Widget_Helper_Form_Element_Textarea('footgg', NULL, '', _t('底部广告'), _t('有效范围全站有效'));
    $form->addInput($footgg);

	$headgg = new Typecho_Widget_Helper_Form_Element_Textarea('headgg', NULL, '', _t('顶部广告'), _t('有效范围局部有效'));
    $form->addInput($headgg);

	$yuedu = new Typecho_Widget_Helper_Form_Element_Textarea('yuedu', NULL, '', _t('阅读广告'), _t('有效范围局部有效'));
    $form->addInput($yuedu);


}


function themeFields($layout) {
    $banquan = new Typecho_Widget_Helper_Form_Element_Text('banquan', NULL, NULL, _t('原创作者'), _t('请这这里填写文章原创作者或者来源'));
    $layout->addItem($banquan);
	$banquanurl = new Typecho_Widget_Helper_Form_Element_Text('banquanurl', NULL, NULL, _t('原文地址'), _t('请这这里填写文章原创作者或者来源发布的原文地址'));
    $layout->addItem($banquanurl);

    $biaosi = new Typecho_Widget_Helper_Form_Element_Select('biaosi',array('1'=>'空位','2'=>'原创','3'=>'转载','4'=>'实用','5'=>'图片','6'=>'视频','7'=>'音乐','8'=>'种草'),'1','醒目标识,这文章更有个性','默认为不显示');
    $layout->addItem($biaosi);
}

//热门文章
//原作者不明..
function getRandomPosts($limit = 10){
//var_dump($limit);
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post')
        ->limit($limit)
        ->order('RAND()')
    );
	$i = '1';
    if($result){
        foreach($result as $val){
            $obj = Typecho_Widget::widget('Widget_Abstract_Contents');
            $val = $obj->push($val);
            $post_title = htmlspecialchars($val['title']);
            $text = htmlspecialchars($val['text']);
            $permalink = $val['permalink'];
            $created = $val['created'];
            echo '
				<div class="timeline-item">
				<i class="mdi mdi-upload bg-info-lighten"></i>
				<div class="timeline-item-info">
				<a href="'.$permalink.'" class="text-info font-weight-bold mb-1 d-block">'.mb_substr($post_title,0,16,'utf-8').'</a>
				<small>'.mb_substr($text,0,16,'utf-8').'</small>
				<p class="mb-0 pb-2">
				<small class="text-muted">发布于 '.date("Y-m-d",$created).'</small>
				</p>
				</div>
				</div>

				';
			$i++;
        }
    }
}

//缩略图调用
function showThumb($obj,$size=null,$link=false){
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1){
        $thumb = $attach->url;
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
    }elseif(isset($matches[1][0])){
        $thumb = $matches[1][0];
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
    }
    if(empty($thumb) && empty($options->default_thumb)){
		$thumb= $options->themeUrl .'/air/img/thumb/' . rand(1, 10) . '.jpg';
		//去掉下面4行双斜杠 启用BING美图随机缩略图
		//$str = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?format=js&idx='.rand(1, 30).'&n=1');
        //$array = json_decode($str);
		//$imgurl = $array->{"images"}[0]->{"urlbase"};
        //$thumb = '//i'.rand(0, 2).'.wp.com/cn.bing.com'.$imgurl.'_1920x1080.jpg?resize=220,150';
		
        return $thumb;
    }else{
        $thumb = empty($thumb) ? $options->default_thumb : $thumb;
    }
    if($link){
        return $thumb;
    }
}



//Yoniu：取文章首图
function GetThumFromContent($content){
 // 当文章无图片时的默认缩略图
	$options = Typecho_Widget::widget('Widget_Options');
	$random= $options->themeUrl .'/img/thumb/' . rand(1, 20) . '.jpg';
	//正则匹配 主题目录下的/sj/的图片（以数字按顺序命名）

	preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content->content, $img);
	if($imgsrc = !empty($img[1])){
		 $imgsrc = $img[1][0];
	}else{ 
			preg_match_all("|<img[^>]+src=\"([^>\"]+)\"?[^>]*>|is", $content->content ,$img);

            $tupian = $content->widget('Widget_Options')->tupian;
            if ($tupian == 'dan'){
              if($imgsrc = !empty($img[1])){
				$imgsrc = $img[1][0];  
              }
            }else if($tupian == 'shi'){
			if($imgsrc = !empty($img[1])){
				$imgsrc = $img[1][0];  
			}else{
					$imgsrc = $random;	
			}

            }else{
              $imgsrc = $random;
            }
	}
	return $imgsrc;

}

/*文章阅读次数统计*/
function get_post_view($archive) {
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
            
        }
    }
    echo $row['views'];
}

/* 对邮箱类型判定，并调用QQ头像的实现 */
function isqq($email){
    if($email){
        if(strpos($email,"@qq.com") !==false){
            $email=str_replace('@qq.com','',$email);
            echo "//q1.qlogo.cn/g?b=qq&nk=".$email."&";
        }else{
            $email= md5($email);
            echo "//cdn.v2ex.com/gravatar/".$email."?";
        }
    }else{
    echo "//cdn.v2ex.com/gravatar/null?";
    }
}




/**
* 显示下一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function theNext($widget, $default = '/')
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created > ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_ASC)
->limit(1);
$content = $db->fetchRow($sql);
 
if ($content) {
$content = $widget->filter($content);
$link = $content['permalink'];
echo $link;
} else {
echo $default;
}
} 
/**
* 显示上一篇
*
* @access public
* @param string $default 如果没有下一篇,显示的默认文字
* @return void
*/
function thePrev($widget, $default = '/')
{
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('table.contents.created < ?', $widget->created)
->where('table.contents.status = ?', 'publish')
->where('table.contents.type = ?', $widget->type)
->where('table.contents.password IS NULL')
->order('table.contents.created', Typecho_Db::SORT_DESC)
->limit(1);
$content = $db->fetchRow($sql); 
if ($content) {
$content = $widget->filter($content);
$link = $content['permalink'];
echo $link;
} else {
echo $default;
}
}


// 字符串截取
function myGBsubstr($string, $start, $length) {
    if (strlen($string) > $length) {
        $str = null;
        $len = 0;
        $i = $start;
        while ( $len < $length) {
        if (ord(substr($string, $i, 1)) > 0xc0) {
            $str .=substr($string, $i, 3);
            $i+= 3;
        }elseif (ord(substr($string, $i, 1)) > 0xa0) {
            $str .= substr($string, $i, 2);
            $i+= 2;
        }else {
            $str.=substr($string, $i, 1);
            $i++;
        }
        $len ++;
        }
        return $str;
    }else {
        return $string;
    }
}

function biaoshi($thispdo){
	if($thispdo->fields->biaosi == '2'){
		echo '原创';
	}else if($thispdo->fields->biaosi == '3'){
		echo '转载';
	}else if($thispdo->fields->biaosi == '4'){
		echo '实用';
	}else if($thispdo->fields->biaosi == '5'){
		echo '图片';
	}else if($thispdo->fields->biaosi == '6'){
		echo '视频';
	}else if($thispdo->fields->biaosi == '7'){
		echo '音乐';
	}else if($thispdo->fields->biaosi == '8'){
		echo '种草';
	}else{
		echo '';
	}
}
// 首页置顶
function hotpost() {
    $options = Typecho_Widget::widget('Widget_Options');
    if ((!empty($options->hot)) && floor($options->hot)==$options->hot) {
        $tjids =  $options->hot;
    }
		$getid = explode(',',$tjids);	
		$db = Typecho_Db::get();
		$result = $db->fetchAll($db->select()->from('table.contents')
			->where('status = ?','publish')
			->where('type = ?', 'post')
			->where('cid in ?',$getid)
			->order('cid', Typecho_Db::SORT_DESC)		
		);
		if($result){
			$i=1;
			rsort( $result );//对数组逆向排序，即大ID在前 
			foreach($result as $val){				
				$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
				$post_title = htmlspecialchars($val['title']);
				$permalink = $val['permalink'];
				preg_match_all( "/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png|gif))/i", $val['text'], $matches );
				if(isset($matches[1][0])){
					$thumb = $matches[1][0];
				}else{
					$thumb= $options->themeUrl .'/img/thumbnail.png';
				}
					$thumbb= $options->themeUrl .'/img/thumbnail.png';
				echo '
				<div class="col-12 mb5">
				<div class="ze-over">
				<a href="'.$permalink.'">
					<img class="lazy" src="'.$thumbb.'" data-original="'.$thumb.'" data-toggle="tooltip" data-placement="bottom" alt="'.$post_title.'" title="'.$post_title.'">
				</a>
				<div class="card-img-overlay">
				<div class="badge badge-danger p-1">置顶公告</div>
				</div>
				<div class="zeze-over"><a href="'.$permalink.'" data-toggle="tooltip" data-placement="bottom" alt="'.$post_title.'" title="'.$post_title.'"><span class="title">'.$post_title.'</span></a></div>
				</div>
				</div>
				';
			}
		}
}



function dengji($i){

$db=Typecho_Db::get();
$mail=$db->fetchAll($db->select(array('COUNT(cid)'=>'rbq'))->from('table.comments')->where('mail = ?', $i)->where('authorId = ?','0'));
foreach ($mail as $sl){
$rbq=$sl['rbq'];}
if($rbq<1){
echo '一级';
}elseif ($rbq<5 && $rbq>0) {
echo '二级';
}elseif ($rbq<10 && $rbq>=5) {
echo '三级';
}elseif ($rbq<30 && $rbq>=10) {
echo '四级';
}elseif ($rbq<60 && $rbq>=30) {
echo '五级';
}elseif ($rbq<120 && $rbq>=60) {
echo '六级';
}elseif ($rbq>=120) {
echo '七级';
}
}

//分类图标
function tubiao($categorys){

	$icon = explode('|',$categorys); 

	$gs = count($icon);
	
	if ($gs >= "2"){
					
		echo $icon['1'];	
					
	}else{
				
		echo 'icon-like';
			
	}
}



function dongtai(){

$slug = "dongtai";    //页面缩略名
$limit = 1;    //调用数量
$length = 200;    //截取长度
$ispage = true;    //true 输出slug页面评论，false输出其它所有评论
$isGuestbook = $ispage ? " = " : " <> ";
 
$db = Typecho_Db::get();
$options = Typecho_Widget::widget('Widget_Options');
 
$page = $db->fetchRow($db->select()->from('table.contents')
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.created < ?', $options->gmtTime)
    ->where('table.contents.slug = ?', $slug));
 
if ($page) {
    $type = $page['type'];
    $routeExists = (NULL != Typecho_Router::get($type));
    $page['pathinfo'] = $routeExists ? Typecho_Router::url($type, $page) : '#';
    $page['permalink'] = Typecho_Common::url($page['pathinfo'], $options->index);
 
    $comments = $db->fetchAll($db->select()->from('table.comments')
        ->where('table.comments.status = ?', 'approved')
        ->where('table.comments.created < ?', $options->gmtTime)
        ->where('table.comments.type = ?', 'comment')
        ->where('table.comments.cid ' . $isGuestbook . ' ?', $page['cid'])
        ->order('table.comments.created', Typecho_Db::SORT_DESC)
        ->limit($limit));
 
    foreach ($comments AS $comment) {
		echo '
		<div class="card-body">
		<p class="text-muted font-13">';
		echo Typecho_Common::subStr(strip_tags($comment['text']), 0, $length, '...');
		echo '</p>

		</div>';
	}
	} else {

		echo '
		<div class="card-body">
		<p class="text-muted font-13">
			欢迎使用本款主题
		</p>
		</div>
		';
	}
}

/**
 * 预计阅读时间
 */
function readTime($cid)
{
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')->from('table.contents')->where('table.contents.cid=?', $cid)->order('table.contents.cid', Typecho_Db::SORT_ASC)->limit(1));
    echo ceil(mb_strlen($rs['text'], 'UTF-8') / 300) . '分钟';
}

function  art_count($content){

    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $content);

    echo mb_strlen($text,'UTF-8');

}



//获取评论的锚点链接
function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<span class="comment-reply-author" href="#comment-' . $parent . '">@' . $author . '</span>';
        echo $href;
    } else {
        echo '';
    }
}




/* 获取浏览器信息 */
function getBrowser($agent) {
  if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
   $name = 'IE';
  }elseif (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
   $name = 'Firefox';
  }elseif (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
   $name = 'Aoyou';
  }elseif (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
   $name = 'Sougou';
  }elseif (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
   $name = '360';
  }elseif (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
   $name = 'Edge';
  }elseif (preg_match('/QQ/i', $agent, $regs)||preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
   $name = 'QQ';
  }elseif (preg_match('/UC/i', $agent)) {
   $name = 'UC';
  }elseif (preg_match('/UBrowser/i', $agent, $regs)) {
   $name = 'UC';
  }elseif (preg_match('/MicroMesseng/i', $agent, $regs)) {
   $name = 'WeChat';
  }elseif (preg_match('/WeiBo/i', $agent, $regs)) {
   $name = 'Weibo';
  }elseif (preg_match('/BIDU/i', $agent, $regs)) {
   $name = 'Baidu';
  }elseif (preg_match('/LBBROWSER/i', $agent, $regs)) {
   $name = 'LB';
  }elseif (preg_match('/TheWorld/i', $agent, $regs)) {
   $name = 'TheWorld';
  }elseif (preg_match('/XiaoMi/i', $agent, $regs)) {
   $name = 'Xiaomi';
  }elseif (preg_match('/2345Explorer/i', $agent, $regs)) {
   $name = '2345';
  }elseif (preg_match('/YaBrowser/i', $agent, $regs)) {
   $name = 'Yandex';
  }elseif (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
   $name = 'Opera';
  }elseif (preg_match('/Thunder/i', $agent, $regs)) {
   $name = 'Xunlei';
  }elseif (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
   $name = 'Chrome';
  }elseif (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
   $name = 'Safari';
  }else{
   $name = 'Other';
  }
  echo '<span class="badge badge-secondary">'.$name.'</span>';
 }
 
 /* 获取操作系统 */
 function getOs($agent) {
  if (preg_match('/win/i', $agent)) {
   if (preg_match('/nt 5.1/i', $agent)) {
    $name = 'Windows XP';
   }elseif (preg_match('/nt 6.0/i', $agent)) {
    $name = 'Windows Vista';
   }elseif (preg_match('/nt 6.1/i', $agent)) {
    $name = 'Windows 7';
   }elseif (preg_match('/nt 6.2/i', $agent)) {
    $name = 'Windows 8';
   }elseif (preg_match('/nt 6.3/i', $agent)) {
    $name = 'Windows 8.1';
   }elseif (preg_match('/nt 10.0/i', $agent)) {
    $name = 'Windows 10';
   }else{
    $name = 'Windows XP';
   }
  }elseif (preg_match('/android/i', $agent)) {
   if (preg_match('/android 5/i', $agent)) {
    $name = 'Android';
   }elseif (preg_match('/android 6/i', $agent)) {
    $name = 'Android';
   }elseif (preg_match('/android 7/i', $agent)) {
    $name = 'Android';
   }elseif (preg_match('/android 8/i', $agent)) {
    $name = 'Android';
   }elseif (preg_match('/android 9/i', $agent)) {
    $name = 'Android';
   }else{
    $name = 'Android';
   }
  }elseif (preg_match('/linux/i', $agent)) {
   $name = 'Linux';
  }elseif (preg_match('/iPhone/i', $agent)) {
   $name = 'IPhone';
  }elseif (preg_match('/iPad/i', $agent)) {
   $name = 'IPad';
  }elseif (preg_match('/mac/i', $agent)) {
   $name = 'Mac';
  }else{
   $name = 'other';
  }
  echo '<span class="badge badge-secondary">'.$name.'</span>';
 }