<div class="single-product-detail">
    <div class="row">

        <!-- Product Thumnbnail -->
        <div class="col-sm-5">
            <div class="product-thumnbnail">
                <img src="{{ getBookImage(val($r, 'image'))['big'] }}" alt="{{ ucwords(val($r, 'title')) }}">
            </div>
        </div>
        <!-- Product Thumnbnail -->

        <!-- Product Detail -->
        <div class="col-sm-7">
            <div class="single-product-detail">
                <span class="availability">Ketersediaan :{!! val($r, 'tersedia') ? '<strong>Tersedia<i class="fa fa-check-circle"></i></strong>' : '<strong>Kosong &times;</strong>' !!}</span>
                <h3>{{ ucwords(val($r, 'title')) }}</h3>
                @if(val($r, 'rating_count'))
                <div class="result-rating starrr" data-value="{{roundUp(val($r, 'rating'))}}"></div>
                <i>{{formatNumber(val($r, 'rating_count'))}} customer review</i><br/>
                @endif

                <div class="prics">{!!getPrice($r)!!}</div><br/>
                <h4>Overview</h4>
                <p>{{ substr(strip_tags( val($r, 'deskripsi') ),0, 400) }}</p>
                <div class="quantity-box">
                    <label>Qty :</label>
                    <div class="sp-quantity">
                        <div class="sp-minus fff"><a class="ddd" data-multi="-1">-</a></div>
                        <div class="sp-input">
                            <input type="text" class="quntity-input tNum" value="1" />
                        </div>
                        <div class="sp-plus fff"><a class="ddd" data-multi="1">+</a></div>
                    </div>
                </div>
                <ul class="btn-list">
                    <li><a class="btn-1 sm shadow-0 btn-add-cart" href="{{ getBookUrl($r)['cart'] }}">add to cart</a></li>
                    <li><a class="btn-1 sm shadow-0 blank" href="{{ getBookUrl($r)['wish'] }}"><i class="fa fa-heart"></i></a></li>
                    <!--li><a class="btn-1 sm shadow-0 blank" href="#"><i class="fa fa-repeat"></i></a></li-->
                    <li><a class="btn-1 sm shadow-0 blank" href="{{ getBookUrl($r)['share'] }}"><i class="fa fa-share-alt"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- Product Detail -->

    </div>
</div>
<!-- Single Product Detail -->