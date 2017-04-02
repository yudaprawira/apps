@extends( config('app.template') . 'layouts.master')

@section('content')
<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2>{{ $section }}</h2>
            <span class="h-line"></span>
        </div>
 
        <section class="span12 first">
 
            <section class="span12 first">
                <section class="grid-holder features-books figure-parent">
                    @foreach($rows as $k=>$v)
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

            <div class="blog-footer">
                {!! $rows->appends(Input::except('page'))->render() !!}
            </div>
 
        </section>
 
        
    </section>
</section>
@endsection
