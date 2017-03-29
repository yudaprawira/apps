<?php $__env->startSection('content'); ?>
<section id="content-holder" class="container-fluid container">
    <section class="row-fluid">
        <div class="heading-bar">
            <h2><?php echo e($section); ?></h2>
            <span class="h-line"></span>
        </div>
 
        <section class="span9 first">
 
            <div class="product_sort">
                <div class="row-1">
                    <div class="left">
                        <span class="s-title">Sort by</span>
                        <span class="list-nav">
                        <select name="">
                        <option>Position</option>
                        <option>Position 2</option>
                        <option>Position 3</option>
                        <option>Position 4</option>
                        </select>
                        </span>
                    </div>

                    <div class="right">
                        <span>Show</span>
                        <span>
                        <select name="show">
                            <option value="4" <?php echo e(val($_GET, 'show')==4?'selected':''); ?>>4</option>
                            <option value="8" <?php echo e(val($_GET, 'show')==8?'selected':''); ?>>8</option>
                            <option value="16" <?php echo e(val($_GET, 'show')==16?'selected':''); ?>>16</option>
                            <option value="32" <?php echo e(val($_GET, 'show')==32?'selected':''); ?>>32</option>
                        </select>
                        </span>
                        <span>per page</span>
                    </div>
                </div>

                <div class="row-2">
                    <span class="left">Items <?php echo e(paggingInfo($rows)['start']); ?> to <?php echo e(paggingInfo($rows)['end']); ?> of <?php echo e(paggingInfo($rows)['total']); ?> total</span>
                    <ul class="product_view">
                    <li>View as:</li>
                    <li>
                    <a class="grid-view" href="grid-view.html">Grid View</a>
                    </li>
                    <li>
                    <a class="list-view" href="list-view.html">List View</a>
                    </li>
                    </ul>
                </div>
            </div>

            <section class="span12 first">
                <section class="grid-holder features-books figure-parent">
                    <?php foreach($rows as $k=>$v): ?>
                    <figure class="span3 slide <?php echo e($k%4==0?'first':''); ?> figure-item">
                        <a href="<?php echo e(getBookUrl($v)['detail']); ?>"><img src="<?php echo e(getBookImage(val($v, 'image'))['medium']); ?>" alt="<?php echo e(ucwords(val($v, 'title'))); ?>" class="pro-img"/></a>
                        <span class="title"><a href="<?php echo e(getBookUrl($v)['detail']); ?>"><?php echo e(ucwords(val($v, 'title'))); ?></a></span>
                        <span class="rating-bar"><img src="<?php echo e($pub_url); ?>/png/rating-star.png" alt="Rating Star"/></span>
                        <div class="cart-price">
                        <a class="cart-btn2" href="<?php echo e(getBookUrl($v)['cart']); ?>">Add to Cart</a>
                        <span class="price"><?php echo getPrice($v); ?></span>
                        </div>
                    </figure>
                    <?php endforeach; ?>
                </section>
            </section>

            <div class="blog-footer">
                <?php echo $rows->appends(Input::except('page'))->render(); ?>

                <ul class="product_view">
                <li>View as:</li>
                <li><a class="grid-view" href="cart.html">Grid View</a></li>
                <li><a class="list-view" href="list-view.html">List View</a></li>
                </ul>
            </div>
 
        </section>
 
 
        <section class="span3">
            <div class="side-holder">
            <article class="banner-ad"><img src="<?php echo e($pub_url); ?>/jpg/image20.jpg" alt="Banner Ad"></article>
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
            <img src="<?php echo e($pub_url); ?>/jpg/image21.jpg">
            <div class="r-det-holder">
            <strong class="r-author"><a href="book-detail.html">The Kite Runner</a></strong>
            <span class="r-by">by Khalid Hoessini</span>
            <span class="rating-bar"><img src="<?php echo e($pub_url); ?>/png/rating-star.png" alt="Rating Star"></span>
            </div>
            </div>
            <span class="r-type">Vivamus bibendum massa</span>
            <p>“ Suspendisse tortor lacus, suscipit eget pharetra sed, ornare sed elit. Curabitur mollis, justo sit amet fermentum ” </p>
            <span class="r-author">Review by BookShoppe’</span>
            </article>
            <article class="r-post">
            <div class="r-img-title">
            <img src="<?php echo e($pub_url); ?>/jpg/image21.jpg">
            <div class="r-det-holder">
            <strong class="r-author"><a href="book-detail.html">The Kite Runner</a></strong>
            <span class="r-by">by Khalid Hoessini</span>
            <span class="rating-bar"><img src="<?php echo e($pub_url); ?>/png/rating-star.png" alt="Rating Star"></span>
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
            <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 15%; width: 45%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 15%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 60%;"></a></div>
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
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Jane Austin
            </label>
            <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            William Blake
            </label>
            <label class="radio">
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
.price-before {
    font-size: 11px;
}
.price-after {
    font-size: 13px;
    font-weight: bold;
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>