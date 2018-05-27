<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer class="blog-footer">
    <ul class="list-inline text-center">
	    <li>
            <a href="https://github.com/spiritree/typecho-theme-amaze" target="_blank">
            <span class="am-icon-btn am-icon-md am-icon-github footer-icon"></span>
        </li>
	    <li>
            <a href="https://github.com/Whuihuan/typecho-theme-amaze" target="_blank">
            <span class="am-icon-btn am-icon-md am-icon-github footer-icon"></span>
        </li>
    </ul>
    <div class="blog-text-center">© <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a> 由 <a href="http://www.typecho.org" target="_blank">Typecho</a> 强力驱动<br>Theme is <a href="https://spiritree.me" target="_blank">Amaze made by Spiritree.</a> Modify by 涂山萃萃<?php if ($this->options->ICPText): ?><br><a href="http://www.miibeian.gov.cn" target="_blank"><?php $this->options->ICPText(); ?></a><?php endif; ?>
    </div>
</footer>
<div style="display:none;" class="back-to-top" id="back-to-top"></div>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
<script>
    var $body=document.body;var $toggle=document.querySelector(".navbar-toggle");var $navbar=document.querySelector("#huxblog_navbar");var $collapse=document.querySelector(".navbar-collapse");var __HuxNav__={close:function(){$navbar.className=" ";setTimeout(function(){if($navbar.className.indexOf("in")<0){$collapse.style.height="0px"}},400)},open:function(){$collapse.style.height="auto";$navbar.className+=" in"}};$toggle.addEventListener("click",function(a){if($navbar.className.indexOf("in")>0){__HuxNav__.close()}else{__HuxNav__.open()}});document.addEventListener("click",function(a){if(a.target==$toggle){return}if(a.target.className=="icon-bar"){return}__HuxNav__.close()});jQuery(document).ready(function(c){var d=1170;if(c(window).width()>d){var b=c(".navbar-custom").height(),a=c(".intro-header .container").height();c(window).on("scroll",{previousTop:0},function(){var e=c(window).scrollTop(),f=c(".side-catalog");if(e<this.previousTop){if(e>0&&c(".navbar-custom").hasClass("is-fixed")){c(".navbar-custom").addClass("is-visible")}else{c(".navbar-custom").removeClass("is-visible is-fixed")}}else{c(".navbar-custom").removeClass("is-visible");if(e>b&&!c(".navbar-custom").hasClass("is-fixed")){c(".navbar-custom").addClass("is-fixed")}}this.previousTop=e;f.show();if(e>(a+41)){f.addClass("fixed")}else{f.removeClass("fixed")}})}});
</script>
<script>
    $(document).ready(function() {
        $('pre code').each(function(i, block) {
            hljs.highlightBlock(block)
        })
        $('table').addClass('am-table')
    })
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#back-to-top").hide();
    $(function() {
      $(window).scroll(function() {
        if ($(window).scrollTop() > 100) {
          $("#back-to-top").fadeIn(500);
        } else {
          $("#back-to-top").fadeOut(500);
        }
      });
      $("#back-to-top").click(function() {
        $('body,html').animate({scrollTop: 0},1000);
        return false;
      });
    });
  });
</script>
<?php $this->footer(); ?>
</body>
</html>