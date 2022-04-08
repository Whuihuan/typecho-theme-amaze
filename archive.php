<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>


<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed">
    <ol class="breadcrumb">
        <li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
        <?php if ($this->is('index')) : ?>
            <!-- 页面为首页时 -->
            <li class="active">文章列表</li>
        <?php elseif ($this->is('post')) : ?>
            <!-- 页面为文章单页时 -->
            <li><?php $this->category(); ?></li>
            <li class="active"><?php $this->title() ?></li>
        <?php else : ?>
            <!-- 页面为其他页时 -->
            <li><?php $this->archiveTitle(' &raquo; ', '', ''); ?></li>
        <?php endif; ?>
    </ol>
    <div class="am-u-md-12 am-u-sm-12">
        <h2 class="am-margin-top-lg"><?php $this->archiveTitle(array(
                                            'category'  =>  _t('分类 %s 下的文章'),
                                            'search'    =>  _t('包含关键字 %s 的文章'),
                                            'tag'       =>  _t('标签 %s 下的文章'),
                                            'author'    =>  _t('%s 发布的文章')
                                        ), '', ''); ?></h2>
        <?php if ($this->have()) : ?>
            <?php while ($this->next()) : ?>
                <article class="am-g blog-entry-article">
                    <div class="am-u-lg-6 am-u-lg-12 am-u-sm-12 blog-entry-text post-preview">
                        <div class="topic-header">
                            <div class="pull-left">
                                <div class="blog-flex-center">
                                    <div class="blog-flex0">
                                        <?php if ($this->options->avatarUrl) { ?>
                                            <img src="<?php $this->options->avatarUrl(); ?>" alt="<?php $this->author(); ?>" class="link avatar avatar-image" />
                                        <?php } else if (class_exists("QQSupport_Plugin") && QQSupport_Plugin::getQQ($this->author->uid) != "") { ?>
                                            <img src="<?php QQSupport_Plugin::getQQAvatar($this->author->uid); ?>" alt="<?php $this->author(); ?>" class="link avatar avatar-image" />
                                        <?php } else { ?>
                                            <?php $this->author->gravatar(36, "G", "", "link avatar avatar-image"); ?>
                                        <?php } ?>
                                    </div>
                                    <div class="author-lockup blog-flex1">
                                        <a class="link" href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a><?php if ($this->author->uid == 1) { ?> <span class="am-icon-user" title="博主"></span><?php } ?>
                                        <span class="in">写于</span>
                                        <span class="category-name">
                                            <?php $this->category('  '); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <span class="pull-right time pc_time"><?php $this->date('Y/m/d H:i'); ?></span>
                        </div>
                        <div class="post-card">
                            <div class="post-content-preview-img" style="background-image:url(<?php showThumbnail($this, 0) ?>)">
                            </div>
                            <h1 class="post-index-title"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                            <div class="post-content-preview">
                                <?php $this->excerpt(100, '...'); ?>
                            </div>
                        </div>
                        <div class="clearfix topic-footer">
                            <span class="pull-left time mobile_time"><?php $this->date('Y/m/d H:i'); ?></span>
                        </div>
                        <span class="pull-right" style="font-size:16px;line-height:36px;"><a itemtype="url" href="<?php $this->permalink() ?>">阅读全文</a></span>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <article class="am-g blog-entry-article am-text-center">
                <?php _e('没有找到内容'); ?>
            </article>
        <?php endif; ?>
        <ul class="am-pagination">
            <?php $this->pageLink('&laquo; Prev', 'prev'); ?>
            <?php $this->pageLink('Next &raquo;', 'next'); ?>
        </ul>
    </div>
</div>
<!-- content end -->

<?php $this->need('footer.php'); ?>