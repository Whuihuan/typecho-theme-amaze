<?php
/**
* FriendLinks
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<?php
$gs='<div class="post-list-item">
  <div class="post-list-item-container">
    <div class="item-label"><div class="item-title">
      <a href="{url}" title="{title}" target="_blank">{name}</a>
    </div>
    <div class="item-meta clearfix">
      <div class="item-meta-date"><a href="{url}" title="{title}" target="_blank"><img src="{image}" width="32px" height="32px"/></a></div>
    </div>
  </div>
</div>
</div>';
?>

<div class="container-fluid archive-page clearfix">
  <div class="post-lists">
    <div class="post-lists-body">
        <h1>有效友链</h1>
        <?php Links_Plugin::output($gs,0,"yes"); ?>

    </div>
  </div>
  <div class="post-lists">
    <div class="post-lists-body">
        <h1>失效友链</h1>
        <?php Links_Plugin::output($gs,0,"no"); ?>
    </div>
  </div>
</div>

<?php $this->need('footer.php'); ?>