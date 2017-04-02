<?php foreach($row as $r): ?>
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