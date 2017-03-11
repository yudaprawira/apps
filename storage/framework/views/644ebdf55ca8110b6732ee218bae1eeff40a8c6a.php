<?php
    $range = array();
    foreach( $rows as $r )
    {
        $range[$r->bagian][] = $r->toArray(); 
    }
 ?>
 <h3 style="text-align: center;font-size: 20px;">Laporan Karyawan</h3>
 <div style="width: 100%;background: 1px solid; #000">
    <table style="width: 100%; border-collapse: collapse;" cellpadding=5 border=1>
        <thead>
            <tr style="background: #ddd;">
                <th>NAMA</th> <th>BAGIAN</th> <th>GOLONGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $range as $golongan=>$value ): ?>
                <tr style="background: #efefef;">
                    <th colspan="3" style="text-align: left;"><?php echo e($golongan); ?></th>
                </tr>
                <?php foreach( $value as $v ): ?>
                <tr>
                    <td style="text-indent: 25px;"><?php echo e(ucwords(strtolower($v['nama']))); ?></td>
                    <td><?php echo e(ucwords(strtolower($v['bagian']))); ?></td>
                    <td style="width: 10px; text-align: center;"><?php echo e($v['golongan']); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script>
    window.print();
</script>