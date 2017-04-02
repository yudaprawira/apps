@extends( config('app.template') . 'layouts.master')

@section('content')
    <!--BANNER-->
    <div id="main-slider" class="main-slider">

        <!-- Item -->
        <div class="item">
            <img src="{{ $pub_url }}/jpg/bg-1.jpg" alt="">
            <div class="banner-overlay">
                <div class="container p-relative">
                    
                    <!-- Layer Img -->
                    <div class="layer-img">
                        <img src="{{ $pub_url }}/png/layer-1.png" alt="">
                    </div>
                    <!-- Layer Img -->

                    <!-- caption -->
                    <div class="caption style-1 position-center-x">
                        <h1>I love this idea!</h1>
                        <b>Cover up front of book and leave summary</b>
                        <p>Booking is Australia’s number-one source of news about the book industry, keeping subscribers</p>
                        <a href="#" class="btn-1">Learn more<i class="fa fa-arrow-circle-right"></i></a> 
                    </div>
                    <!-- caption -->

                </div>
            </div>
        </div>
        <!-- Item -->

        <!-- Item -->
        <div class="item">
            <img src="{{ $pub_url }}/jpg/bg-2.jpg" alt="">
            <div class="banner-overlay">
                <div class="container position-center-center">

                    <!-- caption -->
                    <div class="caption style-2">
                        <h1>Reading a book is like <span>Re Writing it for yourself</span></h1>
                        <p>A Cambridge academic claims to have found the first use of a ‘brilliant innovation’ that has endured as a mark of incomplete speech</p>
                    </div>
                    <!-- caption -->

                </div>
            </div>
        </div>
        <!-- Item -->

    </div>
    <!--BANNER-->
    
    <!-- Main Content -->
	<main class="main-content">
	
		<!-- Upcoming Release -->
		<section class="upcoming-release">

			<!-- Heading -->
			<div class="container-fluid p-0">
			  	<div class="release-heading pull-right h-white">
			  		<h5>New and Upcoming Release</h5>
			  	</div>
			</div>
			<!-- Heading -->

			<!-- Upcoming Release Slider -->
			<div class="upcoming-slider">
				<div class="container">

					<!-- Release Book Detail -->
					<div class="release-book-detail h-white p-white">
						<div class="release-book-slider">
                            @foreach( $newBooks as $k=>$r )
							<div class="item">
								<div class="detail">
									<h5><a href="{{ getBookUrl($r)['detail'] }}">{{ str_limit(strip_tags(val($r, 'title')), 20) }}</a></h5>
                                	<p>{{ str_limit(strip_tags(val($r, 'deskripsi')), 150) }}</p>
									{!!getPrice($r)!!}
									<i class="fa fa-angle-double-right"></i>
								</div>
								<div class="detail-img">
									<img src="{{ getBookImage(val($r, 'image'))['medium'] }}" alt="{{ ucwords(val($r, 'title')) }}">
								</div>
							</div>
                            @endforeach
						</div>
					</div>
					<!-- Release Book Detail -->

					<!-- Thumbs -->
					<div class="release-thumb-holder">
						<ul id="release-thumb" class="release-thumb">
                            @foreach( $newBooks as $k=>$r )
							<li>
								<a data-slide-index="{{$k}}" href="#">
									<span>{{ ucwords(val($r, 'title')) }}</span>
									<img src="{{ getBookImage(val($r, 'image'))['medium'] }}" alt="{{ ucwords(val($r, 'title')) }}">
									<img class="b-shadow" src="{{ $pub_url }}/png/b-shadow.png" alt="">
									<span data-toggle="modal" data-target="#quick-view" data-view="{{ getQuickView($r) }}" class="plus-icon load-quickview">+</span>
								</a>
                            </li>
                            @endforeach
						</ul>
					</div>
					<!-- Thumbs -->

				</div>
			</div>
			<!-- Upcoming Release Slider -->

		</section>
		<!-- Upcoming Release -->

		<!-- Best Seller Products -->
		<section class="best-seller tc-padding">
			<div class="container">
				
				<!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading style-1">
						<h2>Best <span class="theme-color">Seller</span> Books</h2>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- Best sellers Tabs -->
				<div id="best-sellers-tabs" class="best-sellers-tabs">

					<!-- Nav tabs -->
					<div class="tabs-nav-holder">
						<ul class="tabs-nav">
							@foreach( $products as $catID=>$r )
						    <li><a href="#tab-{{ $catID }}">{{ val(categoryArray(), 'id_name.'.$catID) }}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- Nav tabs -->

			  	<!-- Tab panes -->
			  	<div class="tab-content">

			  		<!-- Best Seller Slider -->
					@foreach( $products as $catID=>$value )
			    	<div id="tab-{{ $catID }}">
			    		<div class="best-seller-slider">
							@foreach( $value as $r )
							<!-- Product Box -->
			    			<div class="item">
			    				<div class="product-box">
			    					<div class="product-img">
			    						<img src="{{ getBookImage(val($r, 'image'))['medium'] }}" alt="">
			    						<ul class="product-cart-option position-center-x">
			    							<li><a href="{{ getBookUrl($r)['detail'] }}"><i class="fa fa-eye"></i></a></li>
			    							<li><a href="{{ getBookUrl($r)['cart'] }}"><i class="fa fa-cart-arrow-down"></i></a></li>
			    							<li><a href="{{ getBookUrl($r)['share'] }}"><i class="fa fa-share-alt"></i></a></li>
			    						</ul>
										@if ( val($r, 'terjual') )
			    						<span class="sale-bacth">sale</span>
										@endif
			    					</div>
			    					<div class="product-detail">
			    						<span>{{ val(categoryArray(), 'id_name.'.$catID) }}</span>
			    						<h5><a href="{{ getBookUrl($r)['detail'] }}">{{ ucwords(val($r, 'title')) }}</a></h5>
			    						<p>{{ substr(strip_tags(val($r, 'deskripsi')),0, 20) }}...</p>
			    						<div class="rating-nd-price">
			    							<strong>{!!getPrice($r)!!}</strong>
			    							<div class="result-rating result-rating-item starrr" data-value="{{roundUp(val($r, 'rating'))}}"></div>
			    						</div>
			    						<div class="aurthor-detail">
			    							<span><img src="{{ val($r, 'rel_pengarang.image') ? asset('media/'.val($r, 'rel_pengarang.image')) :  $pub_url . '/jpg/img-11.jpg'  }}" alt="{{ ucwords(val($r, 'rel_pengaran.pengarang')) }}" style="width: 34px;height: 34px;">{{ ucwords(val($r, 'rel_pengaran.pengarang')) }}</span>
			    							<a class="add-wish" href="{{ getBookUrl($r)['wish'] }}"><i class="fa fa-heart"></i></a>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
			    			<!-- Product Box -->
							@endforeach

			    		</div>
			    	</div>
					@endforeach
			    	<!-- Best Seller Slider -->

			  	</div>
			  	<!-- Tab panes -->

				</div>
				<!-- Best sellers Tabs -->

			</div>
		</section>
		<!-- Best Seller Products -->

		<!-- Add Banners -->
		<section class="add-banners-holder tc-padding-bottom">
			<div class="container">
				<div class="row">

					<!-- Banner -->
					<div class="col-lg-6 col-sm-12">
						<div class="add-banner add-banner-1">
							<div class="z-inedex-2 p-relative">
								<h3>Celebrate the Book Authors</h3>
								<p>How to Write a Book Review Request to Bloggers, a guide for authors</p>
								<hr>
								<strong class="font-merriweather">Buy Now 280.99 <sup>$</sup></strong>
							</div>
							<img class="adds-book" src="{{ $pub_url }}/png/img-01.png" alt="">
						</div>
					</div>
					<!-- Banner -->

					<!-- Banner -->
					<div class="col-lg-6 col-sm-12">
						<div class="add-banner add-banner-2">
							<div class="z-inedex-2 p-relative">
								<strong>Look Books 2016</strong>
								<h3>Up to 20% off</h3>
								<hr>
								<p>of advance enternce exam Books</p>
							</div>
							<img class="adds-book" src="{{ $pub_url }}/png/img-02.png" alt="">
						</div>
					</div>
					<!-- Banner -->

				</div>
			</div>
		</section>
		<!-- Add Banners -->

		<!-- Recomend products -->
		<div class="recomended-products tc-padding">
			<div class="container">
				
				<!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading">
						<h2>Staff <span class="theme-color">Recomended </span> Books</h2>
						<p>Whether you’re a large or small employer, enterpreneur, educational institution, professional</p>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- Recomend products Slider -->
				<div class="recomend-slider">
					@foreach($rekomendasi as $r)
					<!-- Item -->
					<div class="item">
						<a href="{{ getBookUrl($r)['detail'] }}"><img src="{{ getBookImage(val($r, 'image'))['medium'] }}" alt="{{ ucwords(val($r, 'title')) }}" style="height: 150px;"></a>
					</div>
					<!-- Item -->
					@endforeach

				</div>
				<!-- Recomend products Slider -->

			</div>
		</div>
		<!-- Recomend products -->

		<!-- Book Collections -->
		<section class="book-collection">
			<div class="container">
				<div class="row">

					<!-- Book Collections Tabs -->
					<div id="book-collections-tabs">

						<!-- collection Name -->
						<div class="col-lg-3 col-sm-12">
							<div class="sidebar">
								<h4>Top Books Catagories</h4>
								<ul>
									@foreach( val(categoryArray(), 'id_name') as $catID=>$catName )
										@if ( val(categoryArray(), 'id_parent.'.$catID)==0 )
											<li><a class="link-category" href="{{ url('book/'.val(categoryArray(), 'id_url.'.$catID)) }}">{{ $catName }}</a></li>
										@else
											<li><a class="link-category" href="{{ url('book/'.val(categoryArray(), 'id_url.'.val(categoryArray(), 'id_parent.'.$catID)).'/'.val(categoryArray(), 'id_url.'.$catID)) }}">{{ $catName }}</a></li>
										@endif
									@endforeach
								</ul>
							</div>
						</div>
						<!-- collection Name -->

						<!-- Collection Content -->
						<div class="col-lg-9 col-sm-12">
							<div class="collection">

								<!-- Secondary heading -->
								<div class="sec-heading">
									<h3>Shop <span class="theme-color">Books</span> Collection</h3>
									<a class="view-all" href="{{ url('book') }}">View All<i class="fa fa-angle-double-right"></i></a>
								</div>
								<!-- Secondary heading -->

								<!-- Collection Content -->
								<div class="collection-content">
									<ul class="collection-items">
										@foreach( $all_item as $r )
										<li>
											<div class="s-product">
												<div class="s-product-img">
													<img src="{{ getBookImage(val($r, 'image'))['medium'] }}" style="width: 100%;" alt="{{ ucwords(val($r, 'title')) }}">
													<div class="s-product-hover">
														<div class="position-center-x">
															<a href="{{ getBookUrl($r)['cart'] }}" class="plus-icon"><i class="fa fa-shopping-cart"></i></span>
															<a class="btn-1 sm shadow-0 load-quickview" data-toggle="modal" data-target="#quick-view" data-view="{{ getQuickView($r) }}">Quick view</a>
														</div>
													</div>
												</div>
												<h6><a href="{{ getBookUrl($r)['detail'] }}">{{ ucwords(val($r, 'title')) }}</a></h6>
												<span>{{ val($r, 'rel_pengarang.pengarang') }}</span>
											</div>
										</li>
										@endforeach
									</ul>
								</div>
								<!-- Collection Content -->

							</div>
						</div>
						<!-- Collection Content -->

					</div>
					<!-- Book Collections Tabs -->

				</div>
			</div>
		</section>
		<!-- Book Collections --> 

		
		<!-- Related Products -->
		<section style="    margin-bottom: 50px;">
		  <div class="container">

		      <!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading">
						<h2>Bookshop <span class="theme-color">Top</span> Rated</h2>
						<p>Have a reading loft in my house I will make this happen with</p>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- Content -->
		      <div class="best-seller-slider">
					@foreach( $top_rated as $r )
					<!-- Product Box -->
					<div class="item">
						<div class="product-box">
							<div class="product-img">
								<img src="{{ getBookImage(val($r, 'image'))['medium'] }}" alt="">
								<ul class="product-cart-option position-center-x">
									<li><a href="{{ getBookUrl($r)['detail'] }}"><i class="fa fa-eye"></i></a></li>
									<li><a href="{{ getBookUrl($r)['cart'] }}"><i class="fa fa-cart-arrow-down"></i></a></li>
									<li><a href="{{ getBookUrl($r)['share'] }}"><i class="fa fa-share-alt"></i></a></li>
								</ul>
								@if ( val($r, 'terjual') )
								<span class="sale-bacth">sale</span>
								@endif
							</div>
							<div class="product-detail">
								<span>{{ val(categoryArray(), 'id_name.'.$catID) }}</span>
								<h5><a href="{{ getBookUrl($r)['detail'] }}">{{ str_limit(strip_tags(val($r, 'title')), 20) }}</a></h5>
                                <p>{{ str_limit(strip_tags(val($r, 'deskripsi')), 30) }}</p>

								<div class="rating-nd-price">
									<strong>{!!getPrice($r)!!}</strong>
									<div class="result-rating result-rating-item starrr" data-value="{{roundUp(val($r, 'rating'))}}"></div>
								</div>
								<div class="aurthor-detail">
									<span><img src="{{ val($r, 'rel_pengarang.image') ? asset('media/'.val($r, 'rel_pengarang.image')) :  $pub_url . '/jpg/img-11.jpg'  }}" alt="{{ ucwords(val($r, 'rel_pengaran.pengarang')) }}" style="width: 34px;height: 34px;">{{ ucwords(val($r, 'rel_pengaran.pengarang')) }}</span>
									<a class="add-wish" href="{{ getBookUrl($r)['wish'] }}"><i class="fa fa-heart"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- Product Box -->
					@endforeach

				</div>
		      <!-- Content -->

		  </div>
		  <div class="clearfix">
		</section>
		<!-- Related Products --> 


	</main>
	<!-- Main Content -->
@endsection

@push('styles')
<style>
#release-thumb a img {
    max-width: 80px;
}
.release-thumb li a > span {
    overflow: hidden;
    max-width: 80px;
    white-space: nowrap;
}
</style>
@endpush

@push('scripts')
<script>
$(document).on('click', '.link-category', function(){
	var url = $(this).attr('href');
	window.location.href=url;
	return false;
});
</script>
@endpush