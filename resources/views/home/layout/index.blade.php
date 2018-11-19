<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>{{ $wzsz->head }}</title>
<link rel="shortcut icon" href="{{ $wzsz->ico }}">
<meta name="keywords" content="个人博客模板,博客模板,响应式" />
<meta name="description" content="如影随形主题的个人博客模板，神秘、俏皮。" />
<link href="/h/css/base.css" rel="stylesheet">
<link href="/h/css/index.css" rel="stylesheet">
<link href="/h/css/media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<div class="ibody">
  <header>
    <h1>{{ $wzsz->head }}</h1>
    <h2 style="width: 530px;font-family: '楷体';">我们的目的是要鼓舞青年热爱生活，对生活满怀信心，我们要在人们身上培养英雄主义精神。必须使每一个人明白：他是世界的创造者和主人，他对地球上的一切不幸负有责任，而争取生活中的一切美好事物的荣誉，也都是属于他的...</h2>
      <a href="/"><img src="{{ $wzsz->logo }}" style="display: inline-block;"></a>
    <nav id="topnav"><a href="index.html">首页</a><a href="about.html">关于我</a><a href="newlist.html">慢生活</a><a href="share.html">模板分享</a><a href="new.html">模板主题</a></nav>
  </header>
  <article>

    @section('txt')

    @show

  </article>
  <aside>
    <div class="avatar" style="width: 110px;height: 110px;">
      <a href="">
        <img src="{{ $wzsz->logo }}" style="width: 90px; margin-left: 10px;">
      </a>
    </div>
    <div class="topspaceinfo">
      <h1>青年是人类的精华</h1>
      <p>青年应当有朝气，敢作为....</p>
    </div><br><br>

    

    <div class="tj_news">
      <h2><p class="tj_t1">网站公告</p></h2>
      <div class="about_c">
        <p>{{ $notice->wzbt }}</p>
      </div>
      <img src="{{ $notice->pic }}" style="width: 150px;margin-left: 20px;border-radius: 20px;">
      <div class="bdsharebuttonbox">
        <h3 style="color: #fff;font-family: '楷体';">{!! $notice->txt !!}</h3>
      </div>

      <h2><p class="tj_t1">最新文章</p></h2>   
      <ul>
        <li><a href="/">犯错了怎么办？</a></li>
        <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
        <li><a href="/">春暖花开-走走停停-发现美</a></li>
        <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
        <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
        <li><a href="/">简单手工纸玫瑰</a></li>
        <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
        <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
      </ul>
      <h2>
        <p class="tj_t2">推荐文章</p>
      </h2>
      <ul>
        <li><a href="/">犯错了怎么办？</a></li>
        <li><a href="/">两只蜗牛艰难又浪漫的一吻</a></li>
        <li><a href="/">春暖花开-走走停停-发现美</a></li>
        <li><a href="/">琰智国际-Nativ for Life官方网站</a></li>
        <li><a href="/">个人博客模板（2014草根寻梦）</a></li>
        <li><a href="/">简单手工纸玫瑰</a></li>
        <li><a href="/">响应式个人博客模板（蓝色清新）</a></li>
        <li><a href="/">蓝色政府（卫生计划生育局）网站</a></li>
      </ul>
    </div>
    <div class="links">
      <h2>
        <p>友情链接</p>
      </h2>
      <ul>
        @foreach ($link as $k=>$v)
          <li><a href="{{ $v->link }}">{{ $v->lname }}</a></li>
        @endforeach
      </ul>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">DanceSmile</a></p>
        <p>蜀ICP备11002373号-1</p>
        </p>
      </ul>
    </div>
  </aside>
  <script src="/h/js/silder.js"></script>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>
