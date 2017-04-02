<?php $__env->startSection('content'); ?>
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll" data-image-src="<?php echo e(getBookImage(val($rows[rand(0, count($rows)-1)], 'image'))['big']); ?>">
    <div class="container">
        <div class="inner-page-heading style-2 h-white">
            <h2><?php echo e($section); ?></h2>
        </div>
    </div>
</div>
<main class="main-content">

    <!-- Shop Grid -->
    <div class="product-grid-holder tc-padding">
        <div class="container">
            <div class="row">

                <!-- Content -->
                <div class="col-lg-9 col-md-8 pull-right pull-none">
                    
                    <!-- Products -->
                    <div class="row">
                        <?php foreach($rows as $k=>$v): ?>
                        <div class="col-lg-4 col-xs-6 r-full-width book-item">
                            <div class="product-box">
                                <div class="product-img">
                                    <img src="<?php echo e(getBookImage(val($v, 'image'))['medium']); ?>" alt="<?php echo e(ucwords(val($v, 'title'))); ?>">
                                    <ul class="product-cart-option position-center-x">
                                        <li><a href="<?php echo e(getBookUrl($v)['detail']); ?>"><i class="fa fa-eye"></i></a></li>
                                        <li><a href="<?php echo e(getBookUrl($v)['cart']); ?>"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        <li><a href="<?php echo e(getBookUrl($v)['share']); ?>"><i class="fa fa-share-alt"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <span><?php echo e(val(categoryArray(), 'id_name.'.val($v, 'kategori'))); ?></span>
                                    <h5><?php echo e(str_limit(strip_tags(val($v, 'title')), 20)); ?></h5>
                                    <p><?php echo e(str_limit(strip_tags(val($v, 'deskripsi')), 30)); ?></p>
                                    <div class="rating-nd-price">
                                        <strong><?php echo getPrice($v); ?></strong>
                                        <div class="result-rating result-rating-item starrr" data-value="<?php echo e(roundUp(val($v, 'rating'))); ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Products -->

                    <!-- Pagination -->
                    <div class="pagination-holder">
                        <?php echo $rows->appends(Input::except('page'))->render(); ?>

                    </div>
                    <!-- Pagination -->

                </div>
                <!-- Content -->

                <!-- Aside -->
                <aside class="col-lg-3 col-md-4 pull-left pull-none">


                    <!-- Aside Widget -->
                    <div class="aside-widget">
                        <h6>Books by Category</h6>
                        <ul class="Category-list">
                            <?php foreach( val(categoryArray(), 'id_name') as $catID=>$catName ): ?>
                                <?php if( val(categoryArray(), 'id_parent.'.$catID)==0 ): ?>
                                    <li><a href="<?php echo e(url('book/'.val(categoryArray(), 'id_url.'.$catID))); ?>"><?php echo e($catName); ?></a></li>
                                <?php else: ?>
                                    <li><a href="<?php echo e(url('book/'.val(categoryArray(), 'id_url.'.val(categoryArray(), 'id_parent.'.$catID)).'/'.val(categoryArray(), 'id_url.'.$catID))); ?>"><?php echo e($catName); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Aside Widget -->

                    <!-- Aside Widget -->
                    <div class="aside-widget">
                        <h6>Books of the Year</h6>
                        <ul class="books-year-list best-seller">
                            <?php foreach($this_year as $v): ?>
                            <li>
                                <div class="books-post-widget">
                                    <img src="<?php echo e(getBookImage(val($v, 'image'))['small']); ?>" alt="<?php echo e(val($v, 'title')); ?>">
                                    <h6><a href="<?php echo e(getBookUrl($v)['detail']); ?>"><?php echo e(str_limit(strip_tags(val($v, 'title')), 20)); ?></a></h6>
                                    <div class="result-rating result-rating-item starrr" data-value="<?php echo e(roundUp(val($v, 'rating'))); ?>"></div>
                                    <div class="offer-price"><?php echo getPrice($v); ?></div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Aside Widget -->


                </aside>
                <!-- Aside -->

            </div>
        </div>
    </div>
    <!-- Shop Grid -->

</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.pagination>.disabled>a, .pagination>.disabled>a:focus, .pagination>.disabled>a:hover, .pagination>.disabled>span, .pagination>.disabled>span:focus, .pagination>.disabled>span:hover {
    border-color: transparent!important;
}
.pagination-holder ul li.active span{
    border-color: #ff851d;
}
.pagination-holder ul li.active span, .pagination-holder ul li a:hover {
    color: #ff851d;
}
.pagination-holder ul li.active span {
    border: 1px solid;
    border-radius: 100%;
    background: none;
}
.pagination > .active > span, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #337ab7;
    border-color: #337ab7;
}
.books-post-widget .result-rating-item {
    float: none;
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>