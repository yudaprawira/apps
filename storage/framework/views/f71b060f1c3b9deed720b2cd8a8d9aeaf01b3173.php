<li <?php echo $sub ? 'class="treeview '.$active.'"' : ''; ?>>
    <?php if( $sub ): ?>
        <a href="<?php echo e(url($url)); ?>">
            <i class="fa fa-<?php echo e($icon); ?>"></i> <span><?php echo e($name); ?></span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <?php echo $sub; ?>

    <?php else: ?>
        <li class="<?php echo e($active); ?>"><a href="<?php echo e(url($url)); ?>"><i class="fa fa-<?php echo e($icon); ?>"></i> <span><?php echo e($name); ?></span> </a></li>
    <?php endif; ?>
</li>