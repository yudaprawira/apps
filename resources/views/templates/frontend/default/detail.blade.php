@extends( config('app.template') . 'layouts.master')

@section('content')
<section id="content-holder" class="container-fluid container">
    <section class="row-fluid"> 
        <section class="span9 first">
            <section class="b-detail-holder">
                <article class="title-holder">
                    <div class="span6">
                        <h4>Kategori : 
                        <ul class="breadcrumb-category">
                        @foreach( categoryLink( val($row, 'kategori') ) as $l)
                            <li>{!! $l !!}</li>
                        @endforeach
                        </ul>
                        </h4>
                    </div>
                    <div class="span6 book-d-nav">
                        <ul>
                        <li><a href="#">2 Reviews</a></li>
                        <li><i class="icon-envelope"></i><a href="#"> Email to a Friend</a></li>
                        </ul>
                    </div>
                </article>
                <div class="book-i-caption">
                    <div class="span6 b-img-holder">
                        <span class='zoom' id='mainImage'> <img src='{{ getBookImage(val($row, 'image'))['big'] }}' height="219" width="300" id='jack' alt=''/></span>
                    </div>
 
                    <div class="span6">
                        <strong class="title">{{ ucwords(val($row, 'title')) }}</strong>
                        <table class="table table-info">
                            <tr><th>Ketersediaan</th><td>{!! val($row, 'tersedia') ? 'Tersedia' : 'Tidak tersedia' !!}</td></tr>

                            @if( val($row, 'isbn') )
                            <tr><th>{{trans('book::global.isbn')}}</th><td>{!! val($row, 'isbn') !!}</td></tr>
                            @endif

                            @if( val($row, 'rilis') )
                            <tr><th>{{trans('book::global.rilis')}}</th><td>{!! val($row, 'rilis') !!}</td></tr>
                            @endif

                            @if( val($row, 'halaman') )
                            <tr><th>{{trans('book::global.halaman')}}</th><td>{!! val($row, 'halaman') !!}</td></tr>
                            @endif

                            @if( val($row, 'bahasa') )
                            <tr><th>{{trans('book::global.bahasa')}}</th><td>{!! val($row, 'bahasa') !!}</td></tr>
                            @endif

                            @if( val($row, 'berat') )
                            <tr><th>{{trans('book::global.berat')}}</th><td>{!! val($row, 'berat') !!}</td></tr>
                            @endif

                            @if( val($row, 'rel_pengaran.pengarang') )
                            <tr><th>{{trans('book::global.pengarang')}}</th><td>{!! val($row, 'rel_pengaran.pengarang') !!}</td></tr>
                            @endif

                            @if( val($row, 'rel_penerebit.penerebit') )
                            <tr><th>{{trans('book::global.penerbit')}}</th><td>{!! val($row, 'rel_penerebit.penerebit') !!}</td></tr>
                            @endif

                            <tr><th>&nbsp;</th><td>{!! val($row, 'rel_penerebit.penerebit') !!}</td></tr>

                        </table>
                        <div class="comm-nav">
                            <strong class="title2">Quantity</strong>
                            <ul>
                            <li><input id="cart-qty" type="number" class="text-center" style="width: 50px;padding-right: 0;"/></li>
                            <li class="b-price">{!! getPrice($row) !!}</li>
                            <li><a href="{{ getBookUrl($row)['cart'] }}" class="more-btn add-cart">+ Add to Cart</a></li>
                            </ul>
                            <a href="{{ getBookUrl($row)['wish'] }}">Add to Wishlist</a>
                        </div>
                    </div>
                </div>
 
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                    <li class="active"><a href="#pane1" data-toggle="tab">Book Summary</a></li>
                    <!--li><a href="#pane2" data-toggle="tab">Additional Information</a></li-->
                    </ul>
                <div class="tab-content">
                    <div id="pane1" class="tab-pane active">
                        {!! val($row, 'deskripsi') !!}
                    </div>
                    <!--div id="pane2" class="tab-pane">
                        <h4>Pane 2 Content</h4>
                        <p> and so on ...</p>
                    </div-->
                </div> 
            </div> 
 
 
            <section class="related-book">
                <div class="heading-bar">
                    <h2>Related Books</h2>
                    <span class="h-line"></span>
                </div>
                <div class="slider6 figure-related-parent">
                    @foreach( $related as $r )
                    <div class="slide figure-related-item">
                        <a href="{{ getBookUrl($r)['detail'] }}"><img src="{{ getBookImage(val($r, 'image'))['medium'] }}" alt="{{ ucwords(val($r, 'title')) }}" class="pro-img"/></a>
                        <span class="title"><a href="{{ getBookUrl($r)['detail'] }}">{{ ucwords(val($r, 'title')) }}</a></span>
                        <span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span>
                        <div class="cart-price">
                        <a class="cart-btn2" href="{{ getBookUrl($r)['cart'] }}">Add to Cart</a>
                            <span class="price">{!! getPrice($r) !!}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
 
 
<section class="reviews-section">
<figure class="left-sec">
<div class="r-title-bar">
<strong>Customer Reviews</strong>
</div>
<ul class="review-list">
<li>
<span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span>
<em class="">The Kite Runner</em>
<p>“ Suspendisse tortor lacus, suscipit eget pharetra sed, ornare sed elit. Curabitur mollis, justo sit amet fermentum ” Review by Bookshoppe’</p>
</li>
<li>
<span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span>
<em class="">The Kite Runner</em>
<p>“ Suspendisse tortor lacus, suscipit eget pharetra sed, ornare sed elit. Curabitur mollis, justo sit amet fermentum ” Review by Bookshoppe’</p>
</li>
</ul>
<a href="#" class="grey-btn">Write Your Own Review</a>
</figure>
<figure class="right-sec">
<div class="r-title-bar">
<strong>Write Your Own Review</strong>
</div>
<ul class="review-f-list">
<li>
<label>Your name *</label>
<input name="" type="text"/>
</li>
<li>
<label>Summary of your review *</label>
<input name="" type="text"/>
</li>
<li>
<label>Your review *</label>
<textarea name="" cols="2" rows="20"></textarea>
</li>
<li>
<label>How do you rate this book? *</label>
<div class="rating-list">
<div class="rating-box">
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
Star 1
</label>
</div>
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
Star 2
</label>
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
Star 3
</label>
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
Star 4
</label>
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
Star 5
</label>
</div>
</li>
</ul>
<a href="#" class="grey-btn left-btn">Write Your Own Review</a>
</figure>
</section>
 
</section>
 
</section>
 
 
<section class="span3">
<div class="side-holder">
<article class="banner-ad"><img src="{{ $pub_url }}/jpg/image20.jpg" alt="Banner Ad"/></article>
</div>
 
<div class="side-holder">
<article class="shop-by-list">
<h2>Shop by</h2>
<div class="side-inner-holder">
<strong class="title">Category</strong>
<ul class="side-list">
<li><a href="grid-view.html">Fiction (15)</a></li>
<li><a href="grid-view.html">Healthcare (15)</a></li>
<li><a href="grid-view.html">Technology (15)</a></li>
<li><a href="grid-view.html">Science(15)</a></li>
</ul>
<strong class="title">Price</strong>
<ul class="side-list">
<li><a href="#">$0.00 - $10,00.00 (13)</a></li>
<li><a href="#">$10,00.00 - $20,00.00 (2)</a></li>
</ul>
<strong class="title">Author</strong>
<ul class="side-list">
<li><a href="book-detail.html">Khalid Hoessini (9)</a></li>
<li><a href="book-detail.html">William Blake (2)</a></li>
<li><a href="book-detail.html">Anna Kathrinena (1)</a></li>
<li><a href="book-detail.html">Gray Alvin (3)</a></li>
</ul>
</div>
</article>
</div>
 
 
<div class="side-holder">
<article class="l-reviews">
<h2>Latest Reviews</h2>
<div class="side-inner-holder">
<article class="r-post">
<div class="r-img-title">
<img src="{{ $pub_url }}/jpg/image21.jpg"/>
<div class="r-det-holder">
<strong class="r-author"><a href="book-detail.html">The Kite Runner</a></strong>
<span class="r-by">by Khalid Hoessini</span>
<span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span>
</div>
</div>
<span class="r-type">Vivamus bibendum massa</span>
<p>“ Suspendisse tortor lacus, suscipit eget pharetra sed, ornare sed elit. Curabitur mollis, justo sit amet fermentum ” </p>
<span class="r-author">Review by BookShoppe’</span>
</article>
<article class="r-post">
<div class="r-img-title">
<img src="{{ $pub_url }}/jpg/image21.jpg"/>
<div class="r-det-holder">
<strong class="r-author"><a href="book-detail.html">The Kite Runner</a></strong>
<span class="r-by">by Khalid Hoessini</span>
<span class="rating-bar"><img src="{{ $pub_url }}/png/rating-star.png" alt="Rating Star"/></span>
</div>
</div>
<span class="r-type">Vivamus bibendum massa</span>
<p>“ Suspendisse tortor lacus, suscipit eget pharetra sed, ornare sed elit. Curabitur mollis, justo sit amet fermentum ” </p>
<span class="r-author">Review by BookShoppe’</span>
</article>
</div>
</article>
</div>
 
 
<div class="side-holder">
<article class="price-range">
<h2>Price Range</h2>
<div class="side-inner-holder">
<p>Select the price range for better search</p>
<div id="slider-range"></div>
<p> <input type="text" id="amount" class="r-input"> </p>
</div>
</article>
</div>
 
 
<div class="side-holder">
<article class="price-range">
<h2>Community Poll</h2>
<div class="side-inner-holder">
<p>Who is your favourite American author?</p>
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
Jane Austin
</label>
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
William Blake
</label>
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
Keith Urban
</label>
<label class="radio">
<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
Anna Smith
</label>
<a href="#" class="vote-btn">Vote</a>
</div>
</article>
</div>
 
</section>
 
</section>
</section>

@stop

@push('styles')
<style>.zoom{display:inline-block;position:relative;}.zoom:after{content:'';display:block;width:33px;height:33px;position:absolute;top:0;right:0;background:url(icon.html);}.zoom img{display:block;}.zoom img::selection{background-color:transparent;}#ex2 img:hover{cursor:url(grab.html),default;}#ex2 img:active{cursor:url(grabbed.html),default;}
.table-info th{
    width: 15px;
    white-space: nowrap;
    padding: 20px 0;
}
.table-info td{
    padding: 20px 15px;
}
.breadcrumb-category, .breadcrumb-category li {
    display: inline-block;
}
.breadcrumb-category {
    margin: 0;
    padding: 0;
}
.breadcrumb-category li:not(:last-child):after {
    content:"/";
    margin: 0 2px 0 5px;
}
.price-after {
    margin: 0 auto;
    font-size: 13px;
}
.price-before{
    font-size: 11px;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function(){
    $('#mainImage').zoom();	
    $(document).on('click', '.add-cart', function(){
        var qty = $('#cart-qty').val();
        var url = $(this).attr('href');
        window.location.href = url+'?qty='+qty;
        return false;
    })
});
$(window).load(function(){
    //auto height figure
    $('.figure-related-parent').each(function(){
        var h = $(this).find('.figure-related-item').first().outerHeight();
        $(this).find('.figure-related-item').each(function(){
            h = h > $(this).outerHeight() ? h : $(this).outerHeight();
        });
        h-=70;
        $(this).find('.figure-related-item').css({'height' : h+'px', 'position': 'relative'});
        $(this).find('.figure-related-item .cart-price').css({'bottom' : '15px', 'position': 'absolute', 'margin': '0'});
    });
});
</script>
@endpush