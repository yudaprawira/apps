<div class="well" style="border-radius: 0;">
    <form id="formAccount" method="POST" action="<?php echo e(url('member/do-update')); ?>">
        
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group form-group">
                    <label class="control-label">Nama <sup>*</sup> <span class="char_count"></span></label>
                    <div class="controls has-feedback">
                        <input class="span12" type="text" name="nama" value="<?php echo e(Session::get('member_nama')); ?>" maxlength="75" placeholder="" class=" " required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label">Email <sup>*</sup> <span class="char_count"></span></label>
                    <div class="controls has-feedback">
                        <input class="span12" type="email" name="email" value="<?php echo e(Session::get('member_email')); ?>" maxlength="75" placeholder="" class=" " required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label">Telepon <sup>*</sup> <span class="char_count"></span></label>
                    <div class="controls has-feedback">
                        <input class="span12" type="text" value="<?php echo e(Session::get('member_telepon')); ?>" required name="telepon" maxlength="20" placeholder="" class=" ">
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label">Kode Pos <span class="char_count"></span></label>
                    <div class="controls has-feedback">
                        <input class="span12" type="text" value="<?php echo e(Session::get('member_kodepos')); ?>" name="kodepos" maxlength="5" placeholder="" class=" ">
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group form-group">
                    <label class="control-label">Alamat <sup>*</sup> <span class="char_count"></span></label>
                    <div class="controls has-feedback">
                        <textarea class="span12" style="height: 116px;" name="alamat" maxlength="255" placeholder="" class=" " required><?php echo e(Session::get('member_alamat')); ?></textarea>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label">Provinsi <sup>*</sup> <span class="char_count"></span></label>
                    <div class="controls has-feedback">
                        <input class="span12" type="text"  value="<?php echo e(Session::get('member_provinsi')); ?>" name="provinsi" maxlength="30" placeholder="" class=" " required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label class="control-label">Kota <sup>*</sup> <span class="char_count"></span></label>
                    <div class="controls has-feedback">
                        <input class="span12" type="text" name="kota" value="<?php echo e(Session::get('member_kota')); ?>" maxlength="35" placeholder="" class=" " required>
                    </div>
                </div>
                
            </div>
        </div>
        <br/>
        <i>Kosongi jika tidak akan mengubah password</i>
        <hr/>
        <div class="row-fluid">
            <div class="span4">
                <div class="control-group form-group">
                    <label class="control-label">Password Baru</label>
                    <div class="controls has-feedback">
                        <input class="span12" type="password" name="password" value="" maxlength="255" placeholder="" class="">
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group form-group">
                    <label class="control-label">Ulangi Password Baru</label>
                    <div class="controls has-feedback">
                        <input class="span12" type="password" name="ulangi_password" value="" maxlength="255" placeholder="" class="">
                    </div>
                </div>
            </div>
            <div class="span4">
                <div class="control-group form-group">
                    <label class="control-label">Password Lama</label>
                    <div class="controls has-feedback">
                        <input class="span12" type="password" name="password_lama" value="" maxlength="255" placeholder="" class="">
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
            <button type="submit" class="btn btn-success">UPDATE</button>
        </div>

    </div>
</div>