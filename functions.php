<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $faviconUrl = new Typecho_Widget_Helper_Form_Element_Text('faviconUrl', NULL, NULL, _t('站点favicon.ico地址'), _t('站点favicon.ico地址'));
    $form->addInput($faviconUrl);

    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('站点LOGO地址'));
    $form->addInput($logoUrl);

    $backgroundImage = new Typecho_Widget_Helper_Form_Element_Text('backgroundImage', NULL, NULL, _t('背景图片地址'), _t('请输入背景图片地址'));
    $form->addInput($backgroundImage);

    $backgroundStyle = new Typecho_Widget_Helper_Form_Element_Textarea('backgroundStyle', NULL, NULL, _t('背景样式代码'), _t('请输入背景样式代码'));
    $form->addInput($backgroundStyle);

    $backgroundText = new Typecho_Widget_Helper_Form_Element_Text('backgroundText', NULL, NULL, _t('背景图片大标题'), _t('请输入背景图片大标题内容'));
    $form->addInput($backgroundText);

    $searchPage = new Typecho_Widget_Helper_Form_Element_Text('searchPage', NULL, NULL, _t('搜索页地址'), _t('输入你的 Seach 的独立页面地址,记得带上 http:// 或 https://'));
    $form->addInput($searchPage);

    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text('avatarUrl', NULL, NULL, _t('头像地址'), _t('输入头像地址'));
    $form->addInput($avatarUrl);

    $socialQQ = new Typecho_Widget_Helper_Form_Element_Text('socialQQ', NULL, NULL, _t('QQ'), _t('请输入QQ号码'));
    $form->addInput($socialQQ);

    $socialWechat = new Typecho_Widget_Helper_Form_Element_Text('socialWechat', NULL, NULL, _t('微信'), _t('请输入微信二维码图片地址'));
    $form->addInput($socialWechat);

    $socialGithub = new Typecho_Widget_Helper_Form_Element_Text('socialGithub', NULL, NULL, _t('Github'), _t('请输入 Github 用户名'));
    $form->addInput($socialGithub);

    $socialTwitter = new Typecho_Widget_Helper_Form_Element_Text('socialTwitter', NULL, NULL, _t('Twitter'), _t('请输入 Twitter 用户名'));
    $form->addInput($socialTwitter);

    $socialWeibo = new Typecho_Widget_Helper_Form_Element_Text('socialWeibo', NULL, NULL, _t('Weibo'), _t('请输入微博短网址名称'));
    $form->addInput($socialWeibo);

    $DisplayComment = new Typecho_Widget_Helper_Form_Element_Radio('DisplayComment', array('0' => _t('不显示'), '1' => _t("显示")), '0', _t("是否显示评论"));
    $form->addInput($DisplayComment);

    $ICPText = new Typecho_Widget_Helper_Form_Element_Text('ICPText', NULL, NULL, _t('ICP备案号'), _t('请输入ICP备案号'));
    $form->addInput($ICPText);

    $ICPMode = new Typecho_Widget_Helper_Form_Element_Radio('ICPMode', array('0' => _t('禁用'), '1' => _t("启用")), '0', _t("ICP备案模式"));
    $form->addInput($ICPMode);

    $ICPTitle = new Typecho_Widget_Helper_Form_Element_Text('ICPTitle', NULL, NULL, _t('ICP备案的网站名称'), _t('请输入ICP备案记录的网站名称，不填写为默认站点名称'));
    $form->addInput($ICPTitle);

    $MoeICPText = new Typecho_Widget_Helper_Form_Element_Text('MoeICPText', NULL, NULL, _t('萌国ICP备案号'), _t('请输入萌国ICP备案号'));
    $form->addInput($MoeICPText);
}

function getCommentAt($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }
}

function getSiteTitle($var = false)
{
    if (Helper::options()->ICPMode == '1' && Helper::options()->ICPTitle) {
        return $var ? Helper::options()->ICPTitle : Helper::options()->ICPTitle();
    } else {
        return $var ? Helper::options()->title : Helper::options()->title();
    }
}

/** 输出文章缩略图 */
function showThumbnail($widget, $imgnum, $var = false)
{ //获取两个参数，文章的ID和需要显示的图片数量
    // 当文章无图片时的默认缩略图
    $rand = rand(1, 5);
    $random = Helper::options()->themeUrl . '/img/rand/' . $rand . '.jpg'; // 随机缩略图路径
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';

    $image = "";
    //如果文章内有插图，则调用插图
    if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
        $image =  $thumbUrl[1][$imgnum];
    }
    //没有就调用第一个图片附件
    else if ($attach && $attach->isImage) {
        $image =  $attach->url;
    }
    //如果是内联式markdown格式的图片
    else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
        $image =  $thumbUrl[1][$imgnum];
    }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
        $image =  $thumbUrl[1][$imgnum];
    }
    //如果真的没有图片，就调用一张随机图片
    else {
        $image =  $random;
    }
    if ($var) {
        return $image;
    } else {
        echo $image;
    }
}


/** 卡片式分享header */
function getCardHeader($widget = null)
{
    $site = getSiteTitle(true);
    $title = archiveTitle($widget, array(
        'category'  =>  _t('分类 %s 下的文章'),
        'search'    =>  _t('包含关键字 %s 的文章'),
        'tag'       =>  _t('标签 %s 下的文章'),
        'author'    =>  _t('%s 发布的文章')
    ), '', ' - ') . $site;
    $desc = ($widget->is('post') || $widget->is('page')) ? $widget->description : Helper::options()->description;
    $url = ($widget->is('post') || $widget->is('page')) ? $widget->permalink : Helper::options()->siteUrl;
    $image =  ($widget->is('post') || $widget->is('page')) ? showThumbnail($widget, 0, true) : Helper::options()->siteUrl . ((Helper::options()->logoUrl) ? Helper::options()->logoUrl :  "logo.jpg");
    echo "<meta itemprop='site_name' content='${site}'>
    <meta itemprop='title' content='${title}'>
    <meta itemprop='description' content='${desc}'>
    <meta itemprop='url' content='${url}'>
    <meta itemprop='image' content='${image}'>
    <meta property='og:site_name' content='${site}'>
    <meta property='og:title' content='${title}'>
    <meta property='og:description' content='${desc}'>
    <meta property='og:url' content='${url}'>
    <meta property='og:image' content='${image}'>
    <meta property='twitter:site_name' content='${site}'>
    <meta property='twitter:title' content='${title}'>
    <meta property='twitter:description' content='${desc}'>
    <meta property='twitter:url' content='${url}'>
    <meta property='twitter:image' content='${image}'>";
}

function archiveTitle($widget, $defines = NULL, $before = ' &raquo; ', $end = '')
{
    if ($widget->getArchiveTitle()) {
        $define = '%s';
        if (is_array($defines) && !empty($defines[$widget->getArchiveType()])) {
            $define = $defines[$widget->getArchiveType()];
        }

        return $before . sprintf($define, $widget->getArchiveTitle()) . $end;
    }
}
