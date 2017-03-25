<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Mirrored from html.crunchpress.com/book-store/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Mar 2017 05:22:19 GMT -->
<head>
<title>{{$title}}</title>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width">
 
<link href="{{ $pub_url }}/css/style.css" rel="stylesheet" type="text/css"/> 
<link href="{{ $pub_url }}/css/bs.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" type="text/css" href="{{ $pub_url }}/css/main-slider.css"/> 
<!--[if lte IE 10]><link rel="stylesheet" type="text/css" href="{{ $pub_url }}/css/customIE.css" /><![endif]-->
<link href="{{ $pub_url }}/css/font-awesome.css" rel="stylesheet" type="text/css"/> 
<link href="{{ $pub_url }}/css/font-awesome-ie7.css" rel="stylesheet" type="text/css"/> 
 
<link href="{{ $pub_url }}/css/jquery.booklet.latest.css" type="text/css" rel="stylesheet" media="screen, projection, tv"/>
<noscript>
<link rel="stylesheet" type="text/css" href="{{ $pub_url }}/css/nojs.css"/>
</noscript>
 

<link rel="stylesheet" href="{{ asset('/global/css/frontend.css') }}"/> 
<link href="{{ $pub_url }}/css/switcher.css" rel="stylesheet" type="text/css"/>
 
<link rel="stylesheet" name="skins" href="{{ $pub_url }}/css/default.css" type="text/css" media="all">
 
 
</head>
<body>
 
<div class="wrapper">
 
 
<section class="top-nav-bar">
<section class="container-fluid container">
<section class="row-fluid">
<section class="span6">
<ul class="top-nav">
<li><a href="index-2.html" class="active">Home page</a></li>
<li><a href="grid-view.html">Online Store</a></li>
<li><a href="blog.html">Blog</a></li>
<li><a href="shortcodes.html">Short Codes</a></li>
<li><a href="blog-detail.html">News</a></li>
<li><a href="contact.html">Contact Us</a></li>
</ul>
</section>
<section class="span6 e-commerce-list">
<ul>
<li>Welcome! <a href="checkout.html">Login</a> or <a href="checkout.html">Create an account</a></li>
<li class="p-category"><a href="#">$</a> <a href="#">£</a> <a href="#">€</a></li>
<li class="p-category"><a href="#">eng</a> <a href="#">de</a> <a href="#">fr</a></li>
</ul>
<div class="c-btn"> <a href="cart.html" class="cart-btn">Cart</a>
<div class="btn-group">
<button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">0 item(s) - $0.00<span class="caret"></span></button>
<ul class="dropdown-menu">
<li><a href="#">Action</a></li>
<li><a href="#">Another action</a></li>
<li><a href="#">Something else here</a></li>
</ul>
</div>
</div>
</section>
</section>
</section>
</section>
 
<header id="main-header">
<section class="container-fluid container">
<section class="row-fluid">
<section class="span4">
<h1 id="logo"> <a href="index-2.html"><img src="{{ $pub_url }}/png/logo.png"/></a> </h1>
</section>
<section class="span8">
<ul class="top-nav2">
<li><a href="checkout.html">My Account</a></li>
<li><a href="cart.html">My Cart</a></li>
<li><a href="checkout.html">Checkout</a></li>
<li><a href="order-recieved.html">Track Your Order</a></li>
</ul>
<div class="search-bar">
<input name="" type="text" value="search entire store here..."/>
<input name="" type="button" value="Serach"/>
</div>
</section>
</section>
</section>
 
<nav id="nav">
<div class="navbar navbar-inverse">
<div class="navbar-inner">
<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
<div class="nav-collapse collapse">
<ul class="nav">
@foreach($categories['parent_id'][0] as $c)
	@if( isset($categories['parent_id'][$c]) )
		<li class="dropdown"> <a class="dropdown-toggle" href="{{ url('book/'.$categories['id_url'][$c]) }}" data-toggle="dropdown">{{ strtoupper($categories['id_name'][$c]) }}<b class="caret"></b> </a>
		<ul class="dropdown-menu">
		@foreach($categories['parent_id'][$c] as $c)
		<li> <a href="{{ url('book/'.$categories['id_url'][$c]) }}">{{ ucwords($categories['id_name'][$c]) }}</a> </li>
		@endforeach
		</ul>
	@else
	<li> <a href="{{ url('book/'.$categories['id_url'][$c]) }}">{{ strtoupper($categories['id_name'][$c]) }}</a> </li>
	@endif
@endforeach
</ul>
</div>
 
</div>
 
</div>
 
</nav>
 
</header>
 
 
@yield('content')
 
<section class="container-fluid footer-top2">
<section class="social-ico-bar">
<section class="container">
<section class="row-fluid">
<div id="socialicons" class="hidden-phone"> <a id="social_linkedin" class="social_active" href="#" title="Visit Google Plus page"><span></span></a> <a id="social_facebook" class="social_active" href="#" title="Visit Facebook page"><span></span></a> <a id="social_twitter" class="social_active" href="#" title="Visit Twitter page"><span></span></a> <a id="social_youtube" class="social_active" href="#" title="Visit Youtube"><span></span></a> <a id="social_vimeo" class="social_active" href="#" title="Visit Vimeo"><span></span></a> <a id="social_trumblr" class="social_active" href="#" title="Visit Vimeo"><span></span></a> <a id="social_google_plus" class="social_active" href="#" title="Visit Vimeo"><span></span></a> <a id="social_dribbble" class="social_active" href="#" title="Visit Vimeo"><span></span></a> <a id="social_pinterest" class="social_active" href="#" title="Visit Vimeo"><span></span></a> </div>
<ul class="footer2-link">
<li><a href="about-us.html">About Us</a></li>
<li><a href="contact.html">Customer Service</a></li>
<li><a href="order-recieved.html">Orders Tracking</a></li>
</ul>
</section>
</section>
</section>
<section class="container">
<section class="row-fluid">
<figure class="span4">
<h4>BestSellers</h4>
<ul class="f2-img-list">
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image19.jpg"/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">fields</a></strong> <span class="by-author">by Arnold Grey</span> <span class="f-price">$127.55</span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image31.jpg"/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Garfield</a></strong> <span class="by-author">by Arnold Grey</span> <span class="f-price">$127.55</span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image32.jpg"/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Penselviniya</a></strong> <span class="by-author">by Arnold Grey</span> <span class="f-price">$127.55</span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image33.jpg"/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Exemption</a></strong> <span class="by-author">by Arnold Grey</span> <span class="f-price">$127.55</span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image34.jpg"/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Penfield</a></strong> <span class="by-author">by Arnold Grey</span> <span class="f-price">$127.55</span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image32.jpg"/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Doors</a></strong> <span class="by-author">by Arnold Grey</span> <span class="f-price">$127.55</span> </div>
</li>
</ul>
</figure>
<figure class="span4">
<h4>Top Rated Books</h4>
<ul class="f2-img-list">
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image35.jpg" alt=""/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">A little rain</a></strong> <span class="by-author">by Arnold Grey</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image33.jpg" alt=""/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Son of Arabia</a></strong> <span class="by-author">by Arnold Grey</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image32.jpg" alt=""/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Serpents</a></strong> <span class="by-author">by Arnold Grey</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image34.jpg" alt=""/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Guns</a></strong> <span class="by-author">by Arnold Grey</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image19.jpg" alt=""/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Garfield</a></strong> <span class="by-author">by Arnold Grey</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
</li>
<li>
<div class="left"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image35.jpg" alt=""/></a></div>
<div class="right"> <strong class="title"><a href="book-detail.html">Wolfman</a></strong> <span class="by-author">by Arnold Grey</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
</li>
</ul>
</figure>
<figure class="span4">
<h4>From the blog</h4>
<ul class="f2-pots-list">
<li> <span class="post-date2">28 APR</span> <a href="blog-detail.html">Corso completo di grafica web completo di grafi dare...</a> <span class="comments-num">6 comments</span> </li>
<li> <span class="post-date2">28 APR</span> <a href="blog-detail.html">Corso completo di grafica web completo di grafi dare...</a> <span class="comments-num">6 comments</span> </li>
<li> <span class="post-date2">28 APR</span> <a href="blog-detail.html">Corso completo di grafica web completo di grafi dare...</a> <span class="comments-num">6 comments</span> </li>
</ul>
</figure>
</section>
</section>
</section>
 
 
<footer id="main-footer">
<section class="social-ico-bar">
<section class="container">
<section class="row-fluid">
<article class="span6">
<p>© 2013 BookShoppe’ - Premium WooCommerce Theme. </p>
</article>
<article class="span6 copy-right">
<p>Designed by <a href="http://www.crunchpress.com/">Crunchpress.com</a></p>
</article>
</section>
</section>
</section>
</footer>
 
</div>
 
 
<script type="text/javascript" src="{{ $pub_url }}/js/lib.js"></script> 
<script type="text/javascript" src="{{ $pub_url }}/js/modernizr.js"></script> 
<script type="text/javascript" src="{{ $pub_url }}/js/easing.js"></script> 
<script type="text/javascript" src="{{ $pub_url }}/js/bs.js"></script> 
<script type="text/javascript" src="{{ $pub_url }}/js/bxslider.js"></script> 
<script type="text/javascript" src="{{ $pub_url }}/js/input-clear.js"></script> 
<script src="{{ $pub_url }}/js/range-slider.js"></script> 
<script src="{{ $pub_url }}/js/jquery.zoom.js"></script> 
<script type="text/javascript" src="{{ $pub_url }}/js/bookblock.js"></script> 
<script type="text/javascript" src="{{ $pub_url }}/js/social.js"></script> 
<script src="{{ $pub_url }}/js/jquery.booklet.latest.js" type="text/javascript"></script> 
<script type="text/javascript">
	    $(function () {		
	        $("#mybook").booklet({
				width:'100%',
				height:430,
				auto: true,
				//speed: 250,
			});
	    });
    </script>
 
<noscript>
<style>#socialicons>a span{top:0px;left:-100%;-webkit-transition:all 0.3s ease;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;-ms-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out;}#socialicons>ahover div{left:0px;}</style>
</noscript>
<script type="text/javascript">
  /* <![CDATA[ */
  $(document).ready(function() {
  $('.social_active').hoverdir( {} );
})
/* ]]> */
</script>
  <div class="switcher"></div>  
 
<script type="text/javascript" src="{{ $pub_url }}/js/cookie.js"></script>
<script type="text/javascript" src="{{ $pub_url }}/js/colorswitcher.js"></script>
 
<script type="text/javascript" src="{{ $pub_url }}/js/custom.js"></script> 
</body>

<!-- Mirrored from html.crunchpress.com/book-store/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Mar 2017 05:23:03 GMT -->
</html>