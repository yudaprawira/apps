<!doctype html>
<html class="no-js" lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content=""/>
<!-- Document Title -->
<title>Bookstore HTML5 Template</title>

<!-- StyleSheets -->
<link rel="stylesheet" href="{{ $pub_url }}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ $pub_url }}/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ $pub_url }}/css/animate.css">
<link rel="stylesheet" href="{{ $pub_url }}/css/icomoon.css">
<link rel="stylesheet" href="{{ $pub_url }}/css/main.css">
<link rel="stylesheet" href="{{ $pub_url }}/css/color-1.css">
<link rel="stylesheet" href="{{ $pub_url }}/css/style.css">
<link rel="stylesheet" href="{{ $pub_url }}/css/responsive.css">
<link rel="stylesheet" href="{{ $pub_url }}/css/transition.css">
<link rel="stylesheet" href="{{ asset('/global/css/star.css') }}"/> 
<link rel="stylesheet" href="{{ asset('/global/css/frontend.css') }}"/> 
<style>
#main-loding .indicator{
	height: 75px;
}
.result-rating-item {
	float: right;
}
.result-rating-item a {
	font-size: 10px!important;
	cursor: default!important;
}
</style>
@stack('styles')

<!-- Online Lib -->
<link rel="stylesheet" href="{{ $pub_url }}/css/tether.min.css">
<script src="{{ $pub_url }}/js/tether.min.js"></script>

<!-- Switcher CSS -->
<link href="{{ $pub_url }}/css/switcher.css" rel="stylesheet" type="text/css"/> 
<link rel="stylesheet" id="skins" href="{{ $pub_url }}/css/default.css" type="text/css" media="all">

<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>

<!-- JavaScripts -->
<script src="{{ $pub_url }}/js/modernizr.js"></script>
</head>
<body>

<!-- Preloader -->
<div id="status">
	<div id="preloader">
		<div class="preloader position-center-center">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>
<!-- Preloader -->

<!-- Wrapper -->
<div class="wrapper push-wrapper">

	<!-- Header -->
	<header id="header">
		
		<!-- Top Bar -->
		<div class="topbar">
			<div class="container">
				
				<!-- Online Option -->
				<div class="online-option">
					<ul>
						<li><a href="#">online store</a></li>
						<li><a href="#">Payment</a></li>
						<li><a href="#">shipping</a></li>
						<li><a href="#">Return</a></li>
					</ul>
				</div>
				<!-- Online Option -->

				<!-- Social Icons -->
				<div class="social-icons pull-right">
					<ul>
						<li><a class="fa fa-facebook" href="#"></a></li>	
						<li><a class="fa fa-twitter" href="#"></a></li>	
						<li><a class="fa fa-google-plus" href="#"></a></li>	
						<li><a class="fa fa-pinterest-p" href="#"></a></li>	
					</ul>
				</div>
				<!-- Social Icons -->

				<!-- Cart Option -->
				<div class="cart-option">
					<ul>
						<li class="add-cart"><a href="#"><i class="fa fa-shopping-bag"></i><span>3</span></a></li>
						<li><a href="#"><i class="fa fa-heart-o"></i>wish List 0 items</a></li>
						<li><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user"></i>Login</a></li>
					</ul>
				</div>
				<!-- Cart Option -->

			</div>
		</div>
		<!-- Top Bar -->

		<!-- Nav -->
		<nav class="nav-holder style-1">
			<div class="container">
				<div class="mega-dropdown-wrapper">

					<!-- Logo -->
					<div class="logo">
						<a href="index.html"><img src="{{ $pub_url }}/png/logo-1.png" alt=""></a>
					</div>
					<!-- Logo -->

					<!-- Search bar -->
					<div class="search-bar">
						<a href="#"><i class="fa fa-search"></i></a>
					</div>
					<!-- Search bar -->

					<!-- Responsive Button -->
					<div class="responsive-btn">
						<a href="#menu" class="menu-link circle-btn"><i class="fa fa-bars"></i></a>
					</div>
					<!-- Responsive Button -->

					<!-- Navigation -->
					<div class="navigation">
						<ul>
							<li class="active dropdown-icon">
								<a href="#"><i class="fa fa-home"></i>Home</a>
								<ul>
									<li><a href="index.html">home 1</a></li>
									<li><a href="index-2.html">home 2</a></li>
								</ul>
							</li>
							<li class="dropdown-icon">
								<a href="#"><i class="fa fa-shopping-bag"></i>shop</a>
								<ul>
									<li><a href="shop.html">shop</a></li>
									<li><a href="shop-detail.html">shop Detail</a></li>
								</ul>
							</li>
							<li class="dropdown-icon">
								<a href="#"><i class="fa fa-pencil"></i>blog</a>
								<ul>
									<li><a href="blog-all-views.html">blog all views</a></li>
									<li><a href="blog-larg.html">blog Larg</a></li>
									<li><a href="blog-list.html">blog List</a></li>
									<li><a href="blog-grid.html">blog Grid</a></li>
									<li><a href="blog-detail.html">blog detail</a></li>
								</ul>	
							</li>
							<li class="dropdown-icon mega-dropdown-holder">
								<a href="#"><i class="fa fa-book"></i>categories</a>
								<ul>
									<li>
										<div class="mega-dropdown">
											<div class="row">
												<div class="col-sm-2">
													<div class="categories-list">
														<h6>Categories</h6>
														<a href="#">Technology</a>
														<a href="#">Fiction</a>
														<a href="#">Health &amp; fitness</a>
														<a href="#">History</a>
														<a href="#">Mystery</a>
														<a href="#">Politics &amp; current Affairs</a>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="categories-list">
														<h6>Eduacation</h6>
														<a href="#">The Rosie Effect</a>
														<a href="#">Accounting Coach</a>
														<a href="#">Al-Islam</a>
														<a href="#">American Literature</a>
														<a href="#">Antique Books</a>
														<a href="#">Baby School</a>
													</div>
												</div>
												<div class="col-sm-2">
													<div class="categories-list">
														<h6>print top 10</h6>
														<a href="#">My Brilliant Friend</a>
														<a href="#">Everywhere I Look</a>
														<a href="#">The Rosie Project</a>
														<a href="#">The Trap</a>
														<a href="#">The High Mountains of</a>
														<a href="#">The Rosie Effect</a>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="row">
														<div class="col-sm-4">
															<div class="s-product">
																<div class="s-product-img">
																	<img src="{{ $pub_url }}/jpg/img-01.jpg" alt="">
																</div>
																<span>James oliver</span>
															</div>
														</div>
														<div class="col-sm-4">
															<div class="s-product">
																<div class="s-product-img">
																	<img src="{{ $pub_url }}/jpg/img-02.jpg" alt="">
																</div>
																<span>James oliver</span>
															</div>
														</div>
														<div class="col-sm-4">
															<div class="s-product">
																<div class="s-product-img">
																	<img src="{{ $pub_url }}/jpg/img-03.jpg" alt="">
																</div>
																<span>James oliver</span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li class="dropdown-icon">
								<a href="#"><i class="fa fa-files-o"></i>Pages</a>
								<ul>
									<li><a href="about.html">about</a></li>
									<li><a href="gallery.html">gallery</a></li>
									<li><a href="event-list.html">event list</a></li>
									<li><a href="event-detail.html">event detail</a></li>
									<li><a href="book-list.html">book list</a></li>
									<li><a href="book-detail.html">book detail</a></li>
									<li><a href="404.html">404</a></li>
								</ul>
							</li>
							<li class="dropdown-icon">
								<a href="#"><i class="fa fa-file-text"></i>author</a>
								<ul>
									<li><a href="author.html">author</a></li>
									<li><a href="author-detail.html">author detail</a></li>
								</ul>
							</li>
							<li><a href="contact.html"><i class="fa fa-fax"></i>contact</a></li>
						</ul>
					</div>
					<!-- Navigation -->

				</div>
			</div>
		</nav>
		<!-- Nav -->

		

	</header>
	<!-- Header -->

	{!! $notif !!} 
	@yield('content')


	<!-- Footer -->
	<footer id="footer"> 

	    <!-- Footer columns -->
	    <div class="footer-columns">
	    	<div class="container">

	    		<!-- Add banner -->
	    		<div class="footer-ad-banner">
	    			<a href="#"><img src="{{ $pub_url }}/jpg/footer-ad-banner.jpg" alt=""></a>
	    		</div>
	    		<!-- Add banner -->

	    		<!-- Columns Row -->
	    		<div class="row">
	    			
		    		<!-- Footer Column -->
		    		<div class="col-lg-4 col-sm-6">
		    			<div class="footer-column logo-column">
		    				<a href="index-1.html"><img src="{{ $pub_url }}/png/logo-2.png" alt=""></a>
		    				<p>Find out how to prepare your book for an editor with these 4 writing tips! The editing process can be a wonderful opportunity for writers.</p>
		    				<ul class="address-list">
		    					<li><i class="fa fa-home"></i>888 South Avenue Street, New York City.</li>
		    					<li><i class="fa fa-phone"></i>00+123-456-789</li>
		    					<li><i class="fa fa-envelope"></i>contact@onlinbookshops.com</li>
		    				</ul>
		    			</div>
		    		</div>
		    		<!-- Footer Column -->

		    		<!-- Footer Column -->
		    		<div class="col-lg-2 col-sm-6">
		    			<div class="footer-column footer-links">
		    				<h4>Information</h4>
		    				<ul>
		    					<li><a href="#">Home</a></li>
		    					<li><a href="#">shop</a></li>
		    					<li><a href="#">blog</a></li>
		    					<li><a href="#">categories</a></li>
		    					<li><a href="#">Pages</a></li>
		    					<li><a href="#">contact</a></li>
		    				</ul>
		    			</div>
		    		</div>
		    		<!-- Footer Column -->

		    		<!-- Footer Column -->
		    		<div class="col-lg-2 col-sm-6">
		    			<div class="footer-column footer-links">
		    				<h4>Shipping info</h4>
		    				<ul>
		    					<li><a href="#">New Products</a></li>
		    					<li><a href="#">top Sellers</a></li>
		    					<li><a href="#">Manufactirers</a></li>
		    					<li><a href="#">Suppliers</a></li>
		    					<li><a href="#">Special</a></li>
		    					<li><a href="#">Imported</a></li>
		    				</ul>
		    			</div>
		    		</div>
		    		<!-- Footer Column -->

						<!-- Footer Column -->
						<div class="col-lg-4 col-sm-6">
							<div class="footer-column newsletter">
								<h4>Weekly Newsletter</h4>
								<p>Get our awesome releases and latest updates with exclusive news and offers in your inbox.</p>
								<form class="newsletter-input">
									<i class="fa fa-envelope-o"></i>
									<input class="form-control.newsletter" type="text" placeholder="Enter Your Email">
									<button>SUBSCRIBE</button>
								</form>
								<p>We're on Social Networks. Follow us &amp; get in touch!</p>
								<ul class="social-icons">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
									<li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- Footer Column -->

	    		</div>
	    		<!-- Columns Row -->

	    	</div>
	    </div>
	    <!-- Footer columns -->
	    
	    <!-- Sub Footer -->
	   	<div class="sub-foorer">
	   		<div class="container">
	   			<div class="row">
		   			<div class="col-sm-6">
		   				<p>Copyright <i class="fa fa-copyright"></i> 2005-2016 <span class="theme-color">FineLayers</span> All Rights Reserved.</p>
		   			</div>
		   			<div class="col-sm-6">
		   				<a class="back-top" href="#">Back to Top<i class="fa fa-caret-up"></i></a>
		   				<ul class="cards-list">
		   					<li><img src="{{ $pub_url }}/jpg/img-39.jpg" alt=""></li>
		   					<li><img src="{{ $pub_url }}/jpg/img-40.jpg" alt=""></li>
		   					<li><img src="{{ $pub_url }}/jpg/img-41.jpg" alt=""></li>
		   					<li><img src="{{ $pub_url }}/jpg/img-42.jpg" alt=""></li>
		   				</ul>
		   			</div>
	   			</div>
	   		</div>
	   	</div>
	    <!-- Sub Footer -->

	</footer>
	<!-- Footer -->

</div>
<!-- Wrapper -->

<!-- Slide Menu -->
<nav id="menu" class="responive-nav">
	<a class="r-nav-logo" href="index.html"><img src="{{ $pub_url }}/png/logo-1.png" alt=""></a>
	<ul class="respoinve-nav-list">
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-1"><i class="pull-right fa fa-angle-down"></i>Home</a>
			<ul class="collapse" id="list-1">
				<li><a href="index.html">home 1</a></li>
				<li><a href="index-2.html">home 2</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-2"><i class="pull-right fa fa-angle-down"></i>Shop</a>
			<ul class="collapse" id="list-2">
				<li><a href="shop.html">shop</a></li>
				<li><a href="shop-detail.html">shop Detail</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-3"><i class="pull-right fa fa-angle-down"></i>Blog</a>
			<ul class="collapse" id="list-3">
				<li><a href="blog-all-views.html">blog all views</a></li>
				<li><a href="blog-larg.html">blog Larg</a></li>
				<li><a href="blog-list.html">blog List</a></li>
				<li><a href="blog-grid.html">blog Grid</a></li>
				<li><a href="blog-detail.html">blog detail</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-4"><i class="pull-right fa fa-angle-down"></i>Pages</a>
			<ul class="collapse" id="list-4">
				<li><a href="about.html">about</a></li>
				<li><a href="gallery.html">gallery</a></li>
				<li><a href="event-list.html">event list</a></li>
				<li><a href="event-detail.html">event detail</a></li>
				<li><a href="book-list.html">blog list</a></li>
				<li><a href="book-detail.html">book detail</a></li>
				<li><a href="404.html">404</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-5"><i class="pull-right fa fa-angle-down"></i>author</a>
			<ul class="collapse" id="list-5">
				<li><a href="author.html">author</a></li>
				<li><a href="author-detail.html">author detail</a></li>
			</ul>
		</li>
		<li><a href="contact.html">Contact</a></li>                       
	</ul>
</nav>
<!-- Slide Menu -->

<!-- View Pages -->
<div class="modal fade open-book-view" id="open-book-view" role="dialog">
  	<div class="position-center-center" role="document">
 	   	<div class="modal-content">
 	   		<button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    	<div id="magazine">
				<div style="background-image:url({{ $pub_url }}/jpg/01.jpg);"></div>
				<div style="background-image:url({{ $pub_url }}/jpg/02.jpg);"></div>
				<div style="background-image:url({{ $pub_url }}/jpg/03.jpg);"></div>
				<div style="background-image:url({{ $pub_url }}/jpg/04.jpg);"></div>
				<div style="background-image:url({{ $pub_url }}/jpg/04.jpg);"></div>
				<div style="background-image:url({{ $pub_url }}/jpg/05.jpg);"></div>
				<div style="background-image:url({{ $pub_url }}/jpg/05.jpg);"></div>
				<div style="background-image:url({{ $pub_url }}/jpg/06.jpg);"></div>
			</div>
    	</div>
  	</div>
</div>
<!-- View Pages -->

<!-- Login Modal -->
<div class="modal fade login-modal" id="login-modal" role="dialog">
	<div class="position-center-center" role="document">
		<div class="modal-content">
			<strong>LOGIN</strong>
			<button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<form class="sending-form formAccountLogin"  method="POST" action="{{ url('member/do-login') }}">
				<div class="form-group has-feedback">
					<input class="form-control" required="required" name="username" placeholder="Username" maxlength=50>
					<i class="fa fa-user"></i>
				</div>
				<div class="form-group has-feedback">
					<input class="form-control" type="password" name="password" required="required" maxlength=255 placeholder="Password">
					<i class="fa fa-key"></i>
				</div>
				<button class="btn-1 sm shadow-0 full-width" type="submit">LOGIN</button>

				<br/><br/>
				<div class="text-center">
					<i>Belum punya akun? <a href="{{ url('member/register?next='.urlencode(val($_GET,'next'))) }}" target="_blank">daftar sekarang</a></i>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			</form>
		</div>
	</div>
</div>
<!-- Login Modal -->

<div id="main-loding"><div class="indicator">Sedang Proses...</div></div>

<!-- Quick View -->
<div class="modal fade quick-view" id="quick-view" role="dialog">
	<div class="position-center-center" role="document">
		<div class="modal-content">
			<button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div id="quickviewContent">
				<div class="text-center">
					<i>Sedang Proses...</i><br/>
					<img src="{{asset('global/images/loading_bar.gif')}}"/>
				</div>
			<div>
		</div>
	</div>
</div>
<!-- Quick View -->


<!-- Java Script -->
@if($path!='')
<script src="{{ $pub_url }}/js/jquery.min.js"></script>        
@else
<script src="{{ $pub_url }}/js/jquery.js"></script>        
@endif
<script src="{{ $pub_url }}/js/bootstrap.min.js"></script>
<!--script src="http://maps.google.com/maps/api/js?sensor=false"></script-->
<script src="{{ $pub_url }}/js/gmap3.min.js"></script>					
<script src="{{ $pub_url }}/js/datepicker.js"></script>					
<script src="{{ $pub_url }}/js/contact-form.js"></script>					
<script src="{{ $pub_url }}/js/bigslide.js"></script>							
<script src="{{ $pub_url }}/js/3d-book-showcase.js"></script>					
<script src="{{ $pub_url }}/js/turn.js"></script>							
<script src="{{ $pub_url }}/js/jquery-ui.js"></script>								
<script src="{{ $pub_url }}/js/mcustom-scrollbar.js"></script>					
<script src="{{ $pub_url }}/js/timeliner.js"></script>					
<script src="{{ $pub_url }}/js/parallax.js"></script>			   	 
<script src="{{ $pub_url }}/js/countdown.js"></script>	
<script src="{{ $pub_url }}/js/countto.js"></script>		
<script src="{{ $pub_url }}/js/owl-carousel.js"></script>	
<script src="{{ $pub_url }}/js/bxslider.js"></script>	
<script src="{{ $pub_url }}/js/appear.js"></script>		 		
<script src="{{ $pub_url }}/js/sticky.js"></script>			 		
<script src="{{ $pub_url }}/js/prettyphoto.js"></script>			
<script src="{{ $pub_url }}/js/isotope.pkgd.js"></script>					 
<script src="{{ $pub_url }}/js/wow-min.js"></script>			
<script src="{{ $pub_url }}/js/classie.js"></script>					
<script src="{{ $pub_url }}/js/main.js"></script>
<script src="{{ asset('/global/js/jquery.bootstrap-growl.min.js') }}"></script>
<script src="{{ asset('/global/js/star.js') }}"></script>
<script src="{{ asset('/global/js/number.js') }}"></script>
<script src="{{ asset('/global/js/main.js') }}"></script>		
@stack('scripts')
<script>
	$(document).ready(function(){
		/** QUICK VIEW **/
		$(document).on('click', '.load-quickview', function(){
			var code = atob($(this).data('view'));
			$('#quickviewContent').html(code);
			initRating();
		});
		initNumber();
		$(document).on('click', '.btn-add-cart', function(){
			var parent = $(this).closest('.single-product-detail');
			var url = $(this).attr('href');
				url+= '?qty='+parseInt(parent.find('.quntity-input').val());
			window.location.href=url;
			return false;
		});
		$(document).on('click', '.quantity-box .sp-minus a', function(){
			var parent = $(this).closest('.quantity-box');
			stringToNumForm(parent);
			var val = parseInt(parent.find('.quntity-input').val());
				val-= 1;
				parent.find('.quntity-input').val((val>0?val:1));
			return false;
		});
		$(document).on('click', '.quantity-box .sp-plus a', function(){
			var parent = $(this).closest('.quantity-box');
			stringToNumForm(parent);
			var val = parseInt(parent.find('.quntity-input').val());
				val+= 1;
				parent.find('.quntity-input').val((val>0?val:1));
			return false;
		});

		/** RATING **/
		initRating();
		$(document).on('click', '.starrr a', function(){
			return false;
		});

		$(document).on('submit', '.formAccountLogin', function(){
			
			var frm = $(this);
			var isReload = $(this).attr('norefresh') ? false : true; 

			$.ajax({
				type		: 'POST',
				url			: frm.attr('action'),
				data		: frm.serialize(),
				beforeSend	: function(xhr) { loading(1); },
				success		: function(dt){
					if ( dt.message ) initNotif(atob(dt.message));

					if ( isReload )
					{
						if ( dt.status == true )
						{
							if ( dt.redirect ) 
							{
								if ( dt.redirect.indexOf("logout")  )
									window.location.href = '{{ url('member') }}';
								else
									window.location.href = dt.redirect;
							}
							else
							{
								if ( window.location.href.indexOf("logout")  )
									window.location.href = '{{ url('member') }}';
								else
									window.location.reload();
							}
						}
					}
					else
					{
						if ( dt.status == true )
						{
							$('#login-modal').modal('hide');

							//auto submit rating
							if ( $('#formRating').length>0 && $('#reviewText').length>0 && $('#reviewText').val()!='' ) $('#formRating').submit();
						}
					}
				},
			}).done(function(){ loading(0); });
			
			return false;
		});

	});
	$(window).load(function(){
		/** COLLECTION **/
		var hItem = 0;
		$('.collection-items li').each(function(){
			hItem = hItem>0 ? hItem : $(this).outerHeight();
		});
		$('.collection-items li').css('height', hItem+'px');
		/** BOOK ITEM **/
		var hItem = 0;
		$('.book-item').each(function(){
			hItem = hItem>0 ? hItem : $(this).outerHeight();
		});
		$('.book-item').css('height', hItem+'px');
		
	});

	function initRating()
	{
		var val = 0;

		$(document).find('.result-rating').each(function(){
			if ( val = $(this).data('value') )
			{
				$(this).starrr({
					readOnly:true,
					rating : val
				});
			}
		});
	}

	function scrollTo(elm)
	{
		$('html, body').animate({
			scrollTop: $(elm).offset().top
		}, 2000);
	}
</script>

<!-- Switcher JS -->
<script type="text/javascript" src="{{ $pub_url }}/js/cookie.js"></script>
<!-- Switcher JS -->

</body>
</html>