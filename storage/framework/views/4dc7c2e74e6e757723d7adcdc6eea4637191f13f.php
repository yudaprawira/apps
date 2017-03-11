<?php if( strtotime($date)>time() ): ?>
    -
<?php else: ?>
    <select name="keterangan[<?php echo e($id); ?>]" data-id="<?php echo e($id); ?>" class="form-control">
        <option value="" <?php echo e(!$keterangan?'selected="selected"' : ''); ?> >-------------</option>
        <?php foreach( config('presensi.keterangan') as $k=>$v ): ?>
        <option value="<?php echo e($k); ?>" <?php echo e($keterangan==$k?'selected="selected"' : ''); ?> ><?php echo e($v); ?></option>
        <?php endforeach; ?>
    </select>
<?php endif; ?>