<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<!-- content start -->
<div class="am-g am-g-fixed blog-fixed">
    <div class="am-u-sm-12">
        <article class="am-article blog-article-p">
            <div class="am-article-hd">
                <h1 class="am-article-title blog-text-center" style="font-size: 30px;"><?php $this->title() ?></h1>
                <div class="header_line"></div>
            </div>
            <div class="am-article-bd">
                <?php $this->content(); ?>
            </div>
        </article>

        <?php if ($this->options->DisplayComment == '1' && $this->options->ICPMode == '0'): ?>
            <?php $this->need('comments.php'); ?>
        <?php endif; ?>

        <hr>
    </div>
</div>
<!-- content end -->

<?php $this->need('footer.php'); ?>
