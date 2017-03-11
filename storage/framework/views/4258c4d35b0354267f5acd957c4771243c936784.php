<ul id="text-message-notif" style="display: none;">
    <?php if( !empty($notif) ): ?> 
        <?php foreach( $notif as $n ): ?>
        <li data-type="<?php echo e($n['type']); ?>" data-align="<?php echo e($n['align']); ?>" data-width="<?php echo e($n['width']); ?>" data-close="<?php echo e($n['close']); ?>" data-name="<?php echo e($n['name']); ?>"><?php echo $n['text']; ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>