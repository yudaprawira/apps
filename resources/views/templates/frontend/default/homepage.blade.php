@extends( config('app.template') . 'layouts.master')

@section('content')
<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        
        @if( $headline )
        <section class="book-box">
            <div class="book-outer">
                
                <div id="mybook">
                    
                    @foreach( $headline as $h)
                    <div title="first page">
                        <div class="left-page">
                            <div class="frame"><img src="{{ getBookImage(val($h, 'image'))['big'] }}" alt="img"></div>
                            <div class="bottom">
                                <div class="cart-price"> <span class="cart">&nbsp;</span> <strong class="price">{!! getPrice($h) !!}</strong> </div>
                            </div>
                        </div>
                    </div>
                    <div title="second page">
                        <div class="right-page">
                            <div class="text">
                                <h1>{{ ucwords(val($h, 'title')) }}</h1>
                                <strong class="name">by {{ val($h, 'rel_pengaran.pengarang') }}</strong>
                                <div class="rating-box"><img src="{{ $pub_url }}/png/rating-img.png" alt="img"></div>
                                <a href="{{ getBookUrl($h)['cart'] }}" class="btn-shop">SHOP NOW</a> 
                            </div>
                            <div class="bottom">
                                <div class="text">
                                    <div class="inner">
                                        <p>{{ substr(strip_tags(val($h,'deskripsi')),0, 150) }}</p>
                                        <a href="{{ getBookUrl($h)['detail'] }}" class="readmore">Read More</a> </div>
                                        <div class="batch-icon"><img src="{{ $pub_url }}/png/batch-img.png" alt="img"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        @endif


        <section class="span12 wellcome-msg m-bottom first">
            <h2>{{ config('app.title') }}.</h2>
            <p>{{ config('app.slogan') }}</p>
        </section>
    </section>
    <section class="row-fluid ">
        @foreach( $terjual as $h )
        <figure class="span4 s-product">
            <div class="s-product-img"><a href="{{ getBookUrl($h)['detail'] }}"><img src="{{ getBookImage(val($h, 'image'))['medium'] }}" alt="{{ ucwords(val($h, 'title')) }}"/></a></div>
            <article class="s-product-det">
            <h3><a href="{{ getBookUrl($h)['detail'] }}">{{ ucwords(val($h, 'title')) }}</a></h3>
            <p>{{ substr(strip_tags(val($h, 'deskripsi')),0, 100) }}</p>
            <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span>
            <div class="cart-price"> <a href="{{ getBookUrl($h)['cart'] }}" class="cart-btn2">Add to Cart</a> <span class="price">{!!getPrice($h)!!}</span> </div>
            <span class="sale-icon">Sale</span> </article>
        </figure>
        @endforeach
    </section>
    
    @foreach( $products as $parentID=>$producValue )
    <section id="content-holder" class="container-fluid container">
        <section class="row-fluid">
            
            <div class="heading-bar">
                <h2><a href="{{ url('book/'.val($categories, 'id_url.'.$parentID)) }}">{{ ucwords(strtolower(val($categories, 'id_name.'.$parentID))) }}</a></h2>
                <span class="h-line"></span>
            </div>
            
            <section class="span12 first">
                <section class="grid-holder features-books figure-parent">
                    @foreach($producValue as $k=>$v)
                    <figure class="span3 slide {{ $k%4==0?'first':'' }} figure-item">
                        <a href="{{ getBookUrl($v)['detail'] }}"><img src="{{ getBookImage(val($v, 'image'))['medium'] }}" alt="{{ ucwords(val($v, 'title')) }}" class="pro-img"/></a>
                        <span class="title"><a href="{{ getBookUrl($v)['detail'] }}">{{ ucwords(val($v, 'title')) }}</a></span>
                        <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span>
                        <div class="cart-price">
                        <a class="cart-btn2" href="{{ getBookUrl($v)['cart'] }}">Add to Cart</a>
                        <span class="price">{!!getPrice($v)!!}</span>
                        </div>
                    </figure>
                    @endforeach
                </section>
            </section>
        
        </section>
    </section>
    @endforeach
    
    
    <!--section class="row-fluid m-bottom">
        <section class="span9">
        <div class="featured-author">
        <div class="left"> <span class="author-img-holder"><a href="about-us.html"><img src="{{ $pub_url }}/jpg/image16.jpg" alt=""/></a></span>
        <div class="author-det-box">
        <div class="ico-holder">
        <div id="socialicons" class="hidden-phone"> <a id="social_linkedin" class="social_active" href="#" title="Visit Google Plus page"><span></span></a> <a id="social_facebook" class="social_active" href="#" title="Visit Facebook page"><span></span></a> <a id="social_twitter" class="social_active" href="#" title="Visit Twitter page"><span></span></a> </div>
        </div>
        <div class="author-det"> <span class="title">Featured Author</span> <span class="title2">Mr. Khalid Hosseini</span>
        <ul class="books-list">
        <li><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image11.jpg" alt=""/></a></li>
        <li><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image12.jpg" alt=""/></a></li>
        <li><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image13.jpg" alt=""/></a></li>
        <li><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image14.jpg" alt=""/></a></li>
        </ul>
        </div>
        </div>
        </div>
        <div class="right">
        <div class="current-book"> <strong class="title"><a href="book-detail.html">The Kite Runner</a></strong>
        <p>Lorem ipsum dolor slo nsec tueraliquet rbi nec In nisl lorem in ...</p>
        <div class="cart-price"> <a href="cart.html" class="cart-btn2">Add to Cart</a> <span class="price">$129.90</span> </div>
        </div>
        <div class="c-b-img"> <a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image17.jpg" alt=""/></a> </div>
        </div>
        </div>
        </section>
        <section class="span3 best-sellers">
        <div class="heading-bar">
        <h2>Best Sellers</h2>
        <span class="h-line"></span> </div>
        <div class="slider2">
        <div class="slide"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image15.jpg" alt=""/></a>
        <div class="slide2-caption">
        <div class="left"> <span class="title"><a href="book-detail.html">Thousand Splendid Miles</a></span> <span class="author-name">by Khalid Housseini</span> </div>
        <div class="right"> <span class="price">$139.50</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
        </div>
        </div>
        <div class="slide"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image15.jpg" alt=""/></a>
        <div class="slide2-caption">
        <div class="left"> <span class="title"><a href="book-detail.html">Thousand Splendid Miles</a></span> <span class="author-name">by Khalid Housseini</span> </div>
        <div class="right"> <span class="price">$139.50</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
        </div>
        </div>
        <div class="slide"><a href="book-detail.html"><img src="{{ $pub_url }}/jpg/image15.jpg" alt=""/></a>
        <div class="slide2-caption">
        <div class="left"> <span class="title"><a href="book-detail.html">Thousand Splendid Miles</a></span> <span class="author-name">by Mr. Khalid </span> </div>
        <div class="right"> <span class="price">$139.50</span> <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span> </div>
        </div>
        </div>
        </div>
        </section>
    </section>
    
    <section class="row-fluid m-bottom">
    
        <section class="span9 blog-section">
        <div class="heading-bar">
        <h2>Latest from the Blog</h2>
        <span class="h-line"></span> </div>
        <div class="slider3">
        <div class="slide">
        <div class="post-img"><a href="blog-detail.html"><img src="{{ $pub_url }}/jpg/image18.jpg" alt=""/></a> <span class="post-date"><span>02</span> May</span> </div>
        <div class="post-det">
        <h3><a href="blog-detail.html">Our latest arrival is the Spring Summer 2013 Book Fair</a></h3>
        <span class="comments-num">6 comments</span>
        <p>Gluten-free quinoa selfies carles, kogi gentrify retro marfa viral. Aesthetic before they sold out put a bird on it sriracha typewriter. Skateboard viral irony tonx ... </p>
        </div>
        </div>
        <div class="slide">
        <div class="post-img"><a href="blog-detail.html"><img src="{{ $pub_url }}/jpg/image29.jpg" alt=""/></a> <span class="post-date"><span>24</span> Oct</span> </div>
        <div class="post-det">
        <h3><a href="blog-detail.html">Our latest arrival is the Spring Summer 2012 Book Fair</a></h3>
        <span class="comments-num">48 comments</span>
        <p>Gluten-free quinoa selfies carles, kogi gentrify retro marfa viral. Aesthetic before they sold out put a bird on it sriracha typewriter. Skateboard viral irony tonx ... </p>
        </div>
        </div>
        <div class="slide">
        <div class="post-img"><a href="blog-detail.html"><img src="{{ $pub_url }}/jpg/image30.jpg" alt=""/></a> <span class="post-date"><span>10</span> Aug</span> </div>
        <div class="post-det">
        <h3><a href="blog-detail.html">Our latest arrival is the Spring Summer 2011 Book Fair</a></h3>
        <span class="comments-num">24 comments</span>
        <p>Gluten-free quinoa selfies carles, kogi gentrify retro marfa viral. Aesthetic before they sold out put a bird on it sriracha typewriter. Skateboard viral irony tonx ... </p>
        </div>
        </div>
        </div>
        </section>
    
    
        <section class="span3 testimonials">
        <div class="heading-bar">
        <h2>Testimonials</h2>
        <span class="h-line"></span> </div>
        <div class="slider4">
        <div class="slide">
        <div class="author-name-holder"> <img src="{{ $pub_url }}/png/image19.png"/> </div>
        <strong class="title">Robert Smith <span>Manager</span></strong>
        <div class="slide">
        <p>Lorem ipsum dolor slo onsec nelioro tueraliquet Morbi nec In Curabitur lorem in design Morbi nec In Curabituritus gojus, </p>
        </div>
        </div>
        <div class="slide">
        <div class="author-name-holder"> <img src="{{ $pub_url }}/png/image19.png"/> </div>
        <strong class="title">Mr. Khalid Hosseini <span>Manager</span></strong>
        <div class="slide">
        <p>Gluten-free quinoa selfies carles, kogi gentrify retro marfa viral. Aesthetic before they sold out put a bird on it sriracha typewriter. Skateboard viral irony tonx ... </p>
        </div>
        </div>
        </div>
        </section>
    
    </section-->
</section> 
@endsection

