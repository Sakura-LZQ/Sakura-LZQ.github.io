<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta itemprop="name" content="<?php $this->title() ?> - <?php $this->options->title() ?>">
	<meta itemprop="description" content="<?php $this->description(); ?>">
	<meta itemprop="image" content="<?php $this->options->logoUrl(); ?>">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?>
	</title>
	<link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/app.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/iconfont.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/jquery.fancybox.min.css'); ?>">
<?php $this->header(); ?>
<?php $this->options->toubu(); ?>
</head>
<body>
<div class="wrapper">