<?php $__env->startSection('content'); ?>
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll" data-image-src="<?php echo e(getBookImage(val($row, 'image'))['big']); ?>">
    <div class="container">
        <div class="inner-page-heading style-2 h-white">
            <h2><?php echo e(ucwords(val($row, 'title'))); ?></h2>
        </div>
    </div>
</div>
<div class="breadcrumb-holder white-bg">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
            <li><a href="<?php echo e(url('/')); ?>">BERANDA</a></li>
            <?php foreach( categoryLink( val($row, 'kategori') ) as $l): ?>
                <li><?php echo $l; ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<main class="main-content">

    <!-- Shop Detail -->
    <div class="product-grid-holder">
        <div class="container">
            
            <!-- Alert >
            <div class="add-cart-alert">
                <p><i class="fa fa-check-circle"></i><?php echo e(ucwords(val($row, 'title'))); ?></p>
                <a class="btn-1 sm pull-right shadow-0" href="<?php echo e(getBookUrl($row)['cart']); ?>">view cart</a>
            </div>
            < Alert -->

            <!-- Single Product Detail -->
            <div class="single-product-detail">
                <div class="row">
                    
                    <!-- Product Thumnbnail -->
                    <div class="col-lg-4 col-md-5">
                        <div class="product-thumnbnail">
                            <img src="<?php echo e(getBookImage(val($row, 'image'))['big']); ?>" alt="">
                        </div>
                    </div>
                    <!-- Product Thumnbnail -->

                    <!-- Product Detail -->
                    <div class="col-lg-8 col-md-7">
                        <div class="single-product-detail">
                            <span class="availability">Ketersediaan :<?php echo val($row, 'tersedia') ? '<strong>Tersedia<i class="fa fa-check-circle"></i></strong>' : '<strong>Kosong &times;</strong>'; ?></span>
                            <h3><?php echo e(ucwords(val($row, 'title'))); ?></h3>
                            <?php if(val($row, 'rating_count')): ?>
                            <div class="result-rating starrr" data-value="<?php echo e(roundUp(val($row, 'rating'))); ?>"></div>
                            <i><?php echo e(formatNumber(val($row, 'rating_count'))); ?> customer review</i>
                            <?php endif; ?>

                            <table class="table table-info">

                                <?php if( val($row, 'isbn') ): ?>
                                <tr><th><?php echo e(trans('book::global.isbn')); ?></th><td><?php echo val($row, 'isbn'); ?></td></tr>
                                <?php endif; ?>

                                <?php if( val($row, 'rilis') ): ?>
                                <tr><th><?php echo e(trans('book::global.rilis')); ?></th><td><?php echo val($row, 'rilis'); ?></td></tr>
                                <?php endif; ?>

                                <?php if( val($row, 'halaman') ): ?>
                                <tr><th><?php echo e(trans('book::global.halaman')); ?></th><td><?php echo val($row, 'halaman'); ?></td></tr>
                                <?php endif; ?>

                                <?php if( val($row, 'bahasa') ): ?>
                                <tr><th><?php echo e(trans('book::global.bahasa')); ?></th><td><?php echo val($row, 'bahasa'); ?></td></tr>
                                <?php endif; ?>

                                <?php if( val($row, 'berat') ): ?>
                                <tr><th><?php echo e(trans('book::global.berat')); ?></th><td><?php echo val($row, 'berat'); ?> Kg</td></tr>
                                <?php endif; ?>

                                <?php if( val($row, 'rel_pengaran.pengarang') ): ?>
                                <tr><th><?php echo e(trans('book::global.pengarang')); ?></th><td><?php echo val($row, 'rel_pengaran.pengarang'); ?></td></tr>
                                <?php endif; ?>

                                <?php if( val($row, 'rel_penerebit.penerebit') ): ?>
                                <tr><th><?php echo e(trans('book::global.penerbit')); ?></th><td><?php echo val($row, 'rel_penerebit.penerebit'); ?></td></tr>
                                <?php endif; ?>

                                <tr><th>&nbsp;</th><td><?php echo val($row, 'rel_penerebit.penerebit'); ?></td></tr>

                            </table>
                            <div class="quantity-box">
                                <label>Qty :</label>
                                <div class="sp-quantity">
                                    <div class="sp-minus fff"><a class="ddd" data-multi="-1">-</a></div>
                                    <div class="sp-input">
                                        <input type="text" class="quntity-input" value="1">
                                    </div>
                                    <div class="sp-plus fff"><a class="ddd" data-multi="1">+</a></div>
                                </div>
                            </div>
                            <ul class="btn-list">
                                <li><a class="btn-1 sm shadow-0 " href="<?php echo e(getBookUrl($row)['cart']); ?>">add to cart</a></li>
                                <li><a class="btn-1 sm shadow-0 blank" href="<?php echo e(getBookUrl($row)['wish']); ?>"><i class="fa fa-heart"></i></a></li>
                                <li><a class="btn-1 sm shadow-0 blank" href="<?php echo e(getBookUrl($row)['share']); ?>"><i class="fa fa-share-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Product Detail -->

                </div>
            </div>
            <!-- Single Product Detail -->

            <!-- Disc Nd Reviews -->
            <div class="disc-nd-reviews tc-padding-bottom">
                <div class="row">
                    <div id="disc-reviews-tabs" class="disc-reviews-tabs">

                        <!-- Tabs Nav -->
                        <div class="col-lg-3 col-xs-12">
                            <div class="tabs-nav">
                                <ul>
                                    <li><a href="#tab-1" role="tab" data-toggle="tab">Reviews</a></li>
                                    <li><a href="#tab-2" role="tab" data-toggle="tab">Description</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Tabs Nav -->

                        <!-- Tabs Content -->
                        <div class="col-lg-9 col-xs-12">
                            <div class="tabs-content tab-content">
                                
                                <!-- Reviews -->
                                <div id="tab-1" class="tab-pane fade in active" role="tabpanel">
                                    <div class="reviews">
                                        
                                        <!-- Reviews List -->
                                        <div class="reviews-list">
                                            <ul>
                                                <?php foreach( $reviews as $r ): ?>
                                                <li>
                                                    <img src="<?php echo e(val($r, 'member.image') ? asset('media/'.val($r, 'member.image')) : asset('/global/images/no-image.png')); ?>" alt="<?php echo e(val($r, 'member.nama')); ?>" style="width: 64px;">
                                                    <div class="comment">
                                                        <div class="reviews-detail">
                                                            <h6><?php echo e(ucwords(val($r, 'member.nama'))); ?> <span><?php echo e(formatDate(val($r, 'created_at'), 5)); ?></span></h6>
                                                            <div class="result-rating result-rating-item starrr" style="float: none;" data-value="<?php echo e(roundUp(val($r, 'rating'))); ?>"></div>
                                                        </div>
                                                        <p><?php echo nl2br(val($r, 'text')); ?></p>
                                                    </div>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php if(count($reviews)>=3): ?>
                                            <div id="oldercomment" data-url="<?php echo e(url('rating/more?item='.val($row, 'id').'&start=3&offset=3&_token='.csrf_token())); ?>"><span>Komentar sebelumnya</span></div>
                                            <?php endif; ?>
                                        </div>
                                        <!-- Reviews List -->

                                        <!-- Form -->
                                        <div class="form-holder add-review">
                                            <h5>Add a Review</h5>
                                            <h6>Your Rating</h6>
                                            <div id="set-rating" class="starrr readonly"></div>
                                            <br/><br/>
                                            <form class="sending-form" id="formRating" method="POST" action="<?php echo e(url('rating/save')); ?>">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group has-feedback">
                                                            <label class="control-label">Komentar <sup>*</sup> <span class="char_count"></span> </label>
                                                            <textarea class="form-control" name="review" id="reviewText" required="required" maxlength="255" rows="3" placeholder="Text here..."></textarea>
                                                            <i class="fa fa-pencil-square-o" style="top: 25px;"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input type="hidden" name="rating" id="rateval"/>
                                                        <input type="hidden" name="itemid" id="itemid" value="<?php echo e(val($row, 'id')); ?>"/>
                                                        <input type="hidden" name="itemurl" id="itemurl" value="<?php echo e(val($row, 'url')); ?>"/>
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                                        <button class="btn-1 shadow-0 sm">submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Form -->

                                        <!-- Related Products -->
                                        <div class="related-products">
                                            <h5>You May <span>also like this</span></h5>
                                            <div class="related-produst-slider">
                                                <?php foreach( $related as $r): ?>
                                                <div class="product-box">
                                                    <div class="product-img">
                                                        <img src="<?php echo e(getBookImage(val($r, 'image'))['medium']); ?>" alt="">
                                                        <ul class="product-cart-option position-center-x">
                                                            <li><a href="<?php echo e(getBookUrl($r)['detail']); ?>"><i class="fa fa-eye"></i></a></li>
                                                            <li><a href="<?php echo e(getBookUrl($r)['cart']); ?>"><i class="fa fa-cart-arrow-down"></i></a></li>
                                                            <li><a href="<?php echo e(getBookUrl($r)['share']); ?>"><i class="fa fa-share-alt"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-detail">
                                                        <span><?php echo e(val(categoryArray(), 'id_name.'.val($r, 'kategori'))); ?></span>
                                                        <h5><?php echo e(str_limit(strip_tags(val($r, 'title')), 20)); ?></h5>
                                                        <p><?php echo e(str_limit(strip_tags(val($r, 'deskripsi')), 40)); ?></p>
                                                        <div class="rating-nd-price">
                                                            <strong><?php echo getPrice($r); ?></strong>
                                                            <div class="result-rating result-rating-item starrr" data-value="<?php echo e(roundUp(val($r, 'rating'))); ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                        <!-- Related Products -->

                                    </div>
                                </div>
                                <!-- Reviews -->

                                <!-- Description -->
                                <div id="tab-2" class="tab-pane fade" role="tabpanel">
                                    <div class="description">
                                        <?php echo val($row, 'deskripsi'); ?>

                                    </div>
                                </div>
                                <!-- Description -->

                            </div>
                        </div>
                        <!-- Tabs Content -->

                    </div>
                </div>
            </div>
            <!-- Disc Nd Reviews -->

        </div>
    </div>
    <!-- Shop Detail -->

</main>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>.zoom{display:inline-block;position:relative;}.zoom:after{content:'';display:block;width:33px;height:33px;position:absolute;top:0;right:0;background:url(icon.html);}.zoom img{display:block;}.zoom img::selection{background-color:transparent;}#ex2 img:hover{cursor:url(grab.html),default;}#ex2 img:active{cursor:url(grabbed.html),default;}
.table-info th{
    width: 15px;
    white-space: nowrap;
    padding: 13px 0!important;
}
.table-info td{
    padding: 13px!important;
}
.rate-error {
    border: 1px solid #ce0000;
    padding: 5px;
    background: #fff5f5;
}
[name=review]{
    line-height: 24px;
    resize: vertical;
}
#oldercomment:before{
    content: " ";
    border: 1px dotted #ff851d;
    width: 100%;
    display: inline-block;
    z-index: -1;
    position:absolute;
    left: 0;
    top: 10px;
}
#oldercomment{
    position: relative;
    text-align: center;
    margin: 30px;
}
#oldercomment span{
    background: #fff;
    z-index: 1;
    padding: 8px;
    font-style: italic;
    color: #ff851d;
    cursor: pointer;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function(){
    //$('#mainImage').zoom();	
    
    initStart();
    $(document).on('submit', '#formRating', function(){
        
        var frm = $(this);

        $.ajax({
            type		: 'POST',
            url			: frm.attr('action'),
            data		: frm.serialize(),
            beforeSend	: function(xhr) { loading(1); },
            success		: function(dt){
                if ( dt.message ) initNotif(atob(dt.message));

                if ( dt.status )
                {
                    $('#rateval').val(0);
                    frm.find('textarea').val('');
                    $('#set-rating a').removeClass('fa-star');
                    $('#set-rating a').addClass('fa-star-o');

                    if ( dt.last )
                    {
                        var lastComment = '<li>'
                                                +'<img src="'+ dt.last.image +'" alt="'+ dt.last.name +'" style="width: 64px;">'
                                                +'<div class="comment">'
                                                    +'<div class="reviews-detail">'
                                                        +'<h6>'+ dt.last.name +' <span>'+ dt.last.date +'</span></h6>'
                                                        +'<div class="result-rating result-rating-item starrr" style="float: none;" data-value="'+ dt.last.rating +'"></div>'
                                                    +'</div>'
                                                    +'<p>'+ dt.last.text +'</p>'
                                                +'</div>'
                                            +'</li>';
                        initRating();
                        if($('.reviews-list ul li').length>0)
                        {
                            $('.reviews-list ul li:first').before(lastComment);
                        }
                        else
                        {
                            $('.reviews-list ul').html(lastComment);
                        }
                        scrollTo('.reviews-list ul li:first');
                    }
                }
                else
                {
                    if (!dt.is_login)
                    {
                        $('.formAccountLogin').attr('norefresh', 1);
                        $('#login-modal').modal('show');
                    }
                }
            },
        }).done(function(){ loading(0); });
        
        return false;
    });

    //MORE COMMENT
    $(document).on('click', '#oldercomment', function(){
        
        var btn = $(this);

        if ( !btn.data('url') ) return false;

        $.ajax({
            type		: 'POST',
            url			: btn.attr('data-url'),
            beforeSend	: function(xhr) { loading(1); },
            success		: function(dt){
                if ( dt.message ) initNotif(atob(dt.message));

                if ( dt.status )
                {
                    if ( dt.list )
                    {
                        var c = '';
                        if ( dt.list.length>0 )
                        {
                            $.each(dt.list, function(i, v){
                                c= '<li>'
                                    +'<img src="<?php echo e(asset('media')); ?>/'+ v.member.image +'" alt="'+ v.member.nama +'" style="width: 64px;">'
                                    +'<div class="comment">'
                                        +'<div class="reviews-detail">'
                                            +'<h6>'+ v.member.nama +' <span>'+ v.date +'</span></h6>'
                                            +'<div class="result-rating result-rating-item starrr" style="float: none;" data-value="'+ v.rating +'"></div>'
                                        +'</div>'
                                        +'<p>'+ v.text +'</p>'
                                    +'</div>'
                                +'</li>';
                                $('.reviews-list ul li:last').after(c);
                            });
                            btn.attr('data-url', dt.next);
                            initRating();
                        }
                        else
                        {
                            btn.remove();
                        }
                    }
                }
                else
                {
                    if (!dt.is_login)
                    {
                        $('.formAccountLogin').attr('norefresh', 1);
                        $('#login-modal').modal('show');
                    }
                }
            },
        }).done(function(){ loading(0); });
        
        return false;
    });

    function initStart()
    {
        $('#set-rating').starrr({
            readOnly:false,
            change: function(e, value){
                $('#rateval').val(value);
                $('#set-rating').removeClass('rate-error');
            }
        });
    }
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>