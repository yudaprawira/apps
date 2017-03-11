<select name="product_month" class="form-control input-param">
    <?php for( $i=1; $i<=12; $i++ ): ?>
    <option value="<?php echo e(str_pad($i, 2, "0", STR_PAD_LEFT)); ?>" <?php echo isset($product_month) && intval($product_month)==$i ? "selected='selected'" : ""; ?> data-week="<?php echo e(isset($product_weeks[str_pad($i, 2, "0", STR_PAD_LEFT)]) ? $product_weeks[str_pad($i, 2, "0", STR_PAD_LEFT)] : date('W')); ?>"><?php echo e(trans('global.month_long')[($i-1)]); ?></option>
    <?php endfor; ?>
</select>