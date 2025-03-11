<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<footer class="blog-footer" id="footer">
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
  <div class="blog-text-center">
    <div>© <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php getSiteTitle(); ?></a>
      由 <a href="http://www.typecho.org" target="_blank">Typecho</a> 强力驱动</div>
    <div>Theme is <a href="https://spiritree.me" target="_blank">Amaze made by Spiritree.</a> Modified by 涂山萃萃
      <?php if ($this->options->ICPText) : ?>
    </div>
    <div><a href="https://beian.miit.gov.cn/" target="_blank"><?php $this->options->ICPText(); ?></a><?php endif; ?>
    <?php if ($this->options->MoeICPText) : ?>　<a href="https://icp.gov.moe" target="_blank">萌ICP备 </a><a href="https://icp.gov.moe/?keyword=<?php $this->options->MoeICPText(); ?>" target="_blank"> <?php $this->options->MoeICPText(); ?>号</a><?php endif; ?></div>
    <div><span id="yiyan">　</span><span class="typed-cursor">|</div>
  </div>
</footer>
<script src="https://fastly.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://fastly.jsdelivr.net/npm/highlight.js@9.12.0/lib/highlight.min.js"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('fancybox/jquery.fancybox.min.js'); ?>"></script>
<script>
  $({
    property: 0
  }).animate({
    property: 100
  }, {
    duration: 10000,
    step: function() {
      var n = $("#loadpro").width();
      var p = $("#loadpro").parent().width();
      var r = Math.round((parseFloat(n) / parseFloat(p)) * 100.0);
      if (r >= 100) {
        $("#loadpro").fadeOut(500);
        return false;
      }
      var percentage = Math.round(this.property);
      $('#loadpro').css('width', percentage + '%');
    }
  });

  $().ready(function() {
    $("#loadpro").css('width', '100%');
  });
</script>
<script>
  var $body = document.body;
  var $toggle = document.querySelector(".navbar-toggle");
  var $navbar = document.querySelector("#huxblog_navbar");
  var $collapse = document.querySelector(".navbar-collapse");
  var __HuxNav__ = {
    close: function() {
      $navbar.className = " ";
      setTimeout(function() {
        if ($navbar.className.indexOf("in") < 0) {
          $collapse.style.height = "0px"
        }
      }, 400)
    },
    open: function() {
      $collapse.style.height = "auto";
      $navbar.className += " in"
    }
  };
  $toggle.addEventListener("click", function(a) {
    if ($navbar.className.indexOf("in") > 0) {
      __HuxNav__.close()
    } else {
      __HuxNav__.open()
    }
  });
  document.addEventListener("click", function(a) {
    if (a.target == $toggle) {
      return
    }
    if (a.target.className == "icon-bar") {
      return
    }
    __HuxNav__.close()
  });
  jQuery(document).ready(function(c) {
    var d = 1170;
    if (c(window).width() > d) {
      var b = c(".navbar-custom").height(),
        a = c(".intro-header .container").height();
      c(window).on("scroll", {
        previousTop: 0
      }, function() {
        var e = c(window).scrollTop(),
          f = c(".side-catalog");
        if (e < this.previousTop) {
          if (e > 0 && c(".navbar-custom").hasClass("is-fixed")) {
            c(".navbar-custom").addClass("is-visible")
          } else {
            c(".navbar-custom").removeClass("is-visible is-fixed")
          }
        } else {
          c(".navbar-custom").removeClass("is-visible");
          if (e > b && !c(".navbar-custom").hasClass("is-fixed")) {
            c(".navbar-custom").addClass("is-fixed")
          }
        }
        this.previousTop = e;
        f.show();
        if (e > (a + 41)) {
          f.addClass("fixed")
        } else {
          f.removeClass("fixed")
        }
      })
    }
  });
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
        $('body,html').animate({
          scrollTop: 0
        }, 1000);
        return false;
      });
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#post-content img').not('.group-picture img').each(function() {
      var $image = $(this);
      var imageTitle = $image.attr('title');
      var $imageWrapLink = $image.parent('a');
      $imageWrapLink = $image.wrap('<a href="' + this.getAttribute('src') + '"></a>').parent('a');
      $imageWrapLink.attr('data-caption', imageTitle);
      $imageWrapLink.attr('data-fancybox', 'imggroup');
      $imageWrapLink.attr('data-type', 'image');
      if (imageTitle) {
        $imageWrapLink.append('<p class="image-caption">' + imageTitle + '</p>');
        $imageWrapLink.attr("title", imageTitle); //make sure img title tag will show correctly in fancybox
      }
    });
    $('[data-fancybox="imggroup"]').fancybox({
      protect: true,
      autoScale: true,
      animationEffect: "zoom",
      keyboard: true,
      arrows: true,
      infobar: true,
      transitionEffect: "slide",
      thumbs: {
        hideOnClose: false
      }
    });
  });
</script>
<script>
  console.clear();
  console.log('\n%c 愛しい『私のアリス』 \n%c 我亲爱的爱丽丝 \n', 'background-color:#000;color: #fff; text-shadow: -1px 0 0.4rem #2196f3, 0 1px 0.4rem #2196f3, 1px 0 0.4rem #2196f3, 0 -1px 0.4rem #2196f3; padding:5px 0;', 'background-color:#000;color: #fff; text-shadow: -1px 0 0.4rem #e91e63, 0 1px 0.4rem #e91e63, 1px 0 0.4rem #e91e63, 0 -1px 0.4rem #e91e63; padding:5px 0;');

  var yiyan = "";
  var yiyanIndex = 0;
  var yiyanTimer = 0;
  var divTyping = $("#yiyan");

  function getYiyan() {
    $.get("/api/yiyan", function(res) {
      if (res.status == "success") {
        yiyan = res.data;
        typing();
      }
    });
  }

  function typing() {
    if (yiyanIndex < yiyan.length) {
      divTyping.html(yiyan.slice(0, yiyanIndex++));
      clearTimeout(yiyanTimer);
      yiyanTimer = setTimeout(typing, 200);
    } else {
      divTyping.html(yiyan); //结束打字,移除 _ 光标
      $(".typed-cursor").addClass("typed-cursor--blink");
      clearTimeout(yiyanTimer);
      setTimeout(clearing, 2000);
    }
  }

  function clearing() {
    $(".typed-cursor").removeClass("typed-cursor--blink");
    if (yiyanIndex > 0) {
      divTyping.html(yiyan.slice(0, yiyanIndex--));
      clearTimeout(yiyanTimer);
      yiyanTimer = setTimeout(clearing, 20);
    } else {
      divTyping.html("　"); //结束退格,移除 _ 光标
      clearTimeout(yiyanTimer);
      yiyanIndex = 0;
      getYiyan();
    }
  }

  getYiyan();
</script>
<?php $this->footer(); ?>
</body>

</html>