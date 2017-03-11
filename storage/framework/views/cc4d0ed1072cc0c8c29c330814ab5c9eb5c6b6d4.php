<?php $__env->startSection('content'); ?>
    <form role="form" action="<?php echo e(url('pegawai/save')); ?>" method="POST" id="formData">
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title"><?php echo e(trans('kepegawaian/pegawai.foto')); ?></h3>
                      <img src="<?php echo e(isset($row['foto']) && $row['foto'] ? url('photo/'.$row['foto']) : url('global/images/noimg.jpg')); ?>" id="previewFoto" />
                      <input type="file" name="inputImage" id="inputImage" accept="image/*" style="visibility: hidden;height: 0; width: 0;" />
                      <div class="text-center">
                        <a href="#" class="btn btn-default no-radius" id="changePhoto"><i class="fa fa-camera"></i> <?php echo e(trans('kepegawaian/pegawai.change_foto')); ?></a>
                      </div>
                    </div>
                    <div class="box-body">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-header">
                      <h3 class="box-title"><?php echo e($title); ?></h3>
                    </div>
                    <div class="box-body">
                        
                        <div class="row">
                            <div class="col-md-4">
                                
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.name')); ?></label><span class="char_count"></span>
                                  <input type="text" class="form-control" name="nama" value="<?php echo e(isset($row['nama']) ? $row['nama'] : ''); ?>" maxlength="50" />
                                </div>
                                
                                <div class="form-group has-feedback" style="margin-bottom: 27px;">
                                  <label><?php echo e(trans('kepegawaian/pegawai.gender')); ?></label> <br />
                                  <input class="icheckbox_square-blue" type="radio" name="jenis_kelamin" value="L" <?php echo e(isset($row['jenis_kelamin']) && $row['jenis_kelamin']=='L' ? 'checked="1"': ''); ?> /> <?php echo e(trans('kepegawaian/pegawai.male')); ?> &nbsp; &nbsp; &nbsp;
                                  <input class="icheckbox_square-blue" type="radio" name="jenis_kelamin" value="P" <?php echo e(isset($row['jenis_kelamin']) && $row['jenis_kelamin']=='P' ? 'checked="1"': ''); ?> /> <?php echo e(trans('kepegawaian/pegawai.female')); ?>

                                </div>
                                
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.ttl')); ?></label><span class="char_count"></span>
                                  <div class="input-group">
                                      <input type="text" class="form-control" name="kota_asal" id="kota_asal" value="<?php echo e(isset($row['kota_asal']) ? $row['kota_asal'] : ''); ?>" maxlength="20" data-source="<?php echo e(url('lookup-city')); ?>" data-populated="[]" />
                                      <span class="input-group-addon" style="padding: 0;">
                                      <input type="text" name="tgl_lahir" value="<?php echo e(isset($row['tgl_lahir']) ? date("d M Y", strtotime($row['tgl_lahir'])) : ''); ?>" style="height: 32px;width: 85px;border: none;padding: 3px" maxlength="10" />  
                                      </span>
                                  </div>
                                </div>

                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.address')); ?></label><span class="char_count"></span>
                                  <textarea name="alamat" class="form-control" maxlength="255" style="min-height: 109px;"><?php echo e(isset($row['alamat']) ? $row['alamat'] : ''); ?></textarea>
                                </div>

                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.city')); ?></label><span class="char_count"></span>
                                  <input type="text" class="form-control" name="kota" value="<?php echo e(isset($row['kota']) ? $row['kota'] : ''); ?>" maxlength="20" />
                                </div>

                            </div>
                            <div class="col-md-4">
                            
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.religion')); ?></label>
                                  <select name="agama" class="form-control">
                                  <?php foreach( config('app.religions') as $kRel=>$vRel ): ?>
                                    <option value="<?php echo e($kRel); ?>" <?php echo e(isset($row['agama']) && $row['agama']==$kRel ? 'selected="selected"' : ''); ?> ><?php echo e($vRel); ?></option>
                                  <?php endforeach; ?>
                                  </select>
                                </div>

                                <div class="form-group has-feedback" style="margin-bottom: 27px;">
                                  <label><?php echo e(trans('kepegawaian/pegawai.sts_kawin')); ?></label><br />
                                  <input class="icheckbox_square-blue" type="checkbox" name="menikah" value="1" <?php echo e(isset($row['menikah']) && $row['menikah']=='1' ? 'checked="1"' : ''); ?>/> <?php echo e(trans('kepegawaian/pegawai.nikah')); ?> 
                                </div>

                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.tgl_masuk')); ?></label>
                                  <input type="text" class="form-control" name="tgl_masuk" value="<?php echo e(isset($row['tgl_masuk']) ? date("d M Y", strtotime($row['tgl_masuk'])) : date("d M Y")); ?>" />
                                </div>                            

                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.bagian')); ?> <span>/ <?php echo e(trans('kepegawaian/pegawai.golongan')); ?></span></label>
                                  <div class="input-group">
                                      <select class="form-control select2 select-bagian" name="bagian" style="display: none;">
                                        <?php foreach( $bagian as $dID=>$b ): ?>
                                            <option value="<?php echo e($dID); ?>" <?php echo e(isset($row['bagian']) && $row['bagian']==$dID?'selected="selected"' : ''); ?> data-golongan="<?php echo e($b['maks_golongan']); ?>"><?php echo e($b['nama']); ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <span class="input-group-addon" style="padding: 0;border: 0;">
                                        <select name="golongan" class="form-control select2 select-golongan" style="display: none;" data-selected="<?php echo e(isset($row['golongan']) ? $row['golongan'] : ''); ?>">
                                        </select>
                                      </span>
                                  </div>
                                </div>                            


                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.nip')); ?></label><span class="char_count"></span>
                                  <input type="text" class="form-control" name="NIP" value="<?php echo e(isset($row['NIP']) ? $row['NIP'] : ''); ?>" maxlength="20" />
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.ktp')); ?></label><span class="char_count"></span>
                                  <input type="text" class="form-control" name="KTP" value="<?php echo e(isset($row['KTP']) ? $row['KTP'] : ''); ?>" maxlength="16" />
                                </div>
                            
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.npwp')); ?></label><span class="char_count"></span>
                                  <input type="text" class="form-control" name="NPWP" value="<?php echo e(isset($row['NPWP']) ? $row['NPWP'] : ''); ?>" maxlength="15" />
                                </div>
                                
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.bpjs')); ?></label><span class="char_count"></span>
                                  <input type="text" class="form-control" name="BPJS" value="<?php echo e(isset($row['BPJS']) ? $row['BPJS'] : ''); ?>" maxlength="15" />
                                </div>
                                
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.norek')); ?></label><span class="char_count"></span>
                                  <input type="text" class="form-control" name="rekening" value="<?php echo e(isset($row['rekening']) ? $row['rekening'] : ''); ?>" maxlength="15" />
                                </div>
                                
                                <div class="form-group has-feedback">
                                  <label><?php echo e(trans('kepegawaian/pegawai.sts_pegawai')); ?></label>
                                  <select name="status" class="form-control select2">
                                    <?php foreach( config('app.status') as $k=>$v ): ?>
                                    <option value="<?php echo e($k); ?>" <?php echo isset($row['status']) && $row['status']==$k ? 'selected="selected"' : ''; ?>><?php echo e($v); ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            
                            <ul id="tab" class="nav nav-tabs">
                              <li class="active" style="margin-left: 25px;"><a href="#family" class="no-radius" data-toggle="tab"><?php echo e(trans('kepegawaian/pegawai.family')); ?></a></li>
                              <li><a href="#education" class="no-radius" data-toggle="tab"><?php echo e(trans('kepegawaian/pegawai.education')); ?></a></li>
                              <li><a href="#job-history" class="no-radius" data-toggle="tab"><?php echo e(trans('kepegawaian/pegawai.job_experience')); ?></a></li>
                            </ul>
                            
                            <div id="TabContent" class="tab-content">
                              <div class="tab-pane fade in active" id="family">
                              
                                <div class="panel-group" id="accordionFamily">
                                  <div class="panel panel-default no-radius">
                                    <div class="panel-heading">
                                      <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordionFamily" href="#collapseFamily-1">
                                          Data <span id="pasangan"><?php echo e(trans('kepegawaian/pegawai.sutri')); ?></span>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseFamily-1" class="panel-collapse collapse in">
                                      <div class="panel-body box" id="box-pasangan">
                                        
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="form-group has-feedback">
                                                  <label><?php echo e(trans('kepegawaian/pegawai.name')); ?></label><span class="char_count"></span>
                                                  <input type="text" class="form-control" name="pasangan[nama]" value="<?php echo e(isset($row['pasangan']['nama']) ? $row['pasangan']['nama'] : ''); ?>" maxlength="50" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group has-feedback">
                                                  <label><?php echo e(trans('kepegawaian/pegawai.tgl_lahir')); ?></label>
                                                  <input class="birthdate form-control" type="text" name="pasangan[tgl_lahir]" value="<?php echo e(isset($row['pasangan']['tgl_lahir']) ? date("d M Y", strtotime($row['pasangan']['tgl_lahir'])) : ''); ?>"  maxlength="10" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="overlay" style="hide"></div>
                                      </div>
                                    </div>
                                  </div> 
                                  
                                  <?php if( isset($row['anak']) && !empty($row['anak']) ): ?>
                                      <?php foreach( $row['anak'] as $anak ): ?>
                                        <div class="panel panel-default no-radius item-anak" data-item="<?php echo e(str_replace('anak-', '', $anak['status'])); ?>">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordionFamily" href="#collapseFamily-<?php echo e($anak['status']); ?>">Anak ke- <span class="item-counter"><?php echo e(str_replace('anak-', '', $anak['status'])); ?></span></a>
                                                    <a href="#" class="pull-right del-item">&times;</a>
                                                </h4>
                                            </div>
                                            <div id="collapseFamily-<?php echo e($anak['status']); ?>" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group has-feedback">
                                                                <label>Nama</label> <span class="char_count"></span>
                                                                <input type="text" class="form-control" name="anak[<?php echo e(str_replace('anak-', '', $anak['status'])); ?>][nama]" value="<?php echo e($anak['nama']); ?>" maxlength="50">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group has-feedback">
                                                                <label>Jenis Kelamin</label>
                                                                <select class="form-control" name="anak[<?php echo e(str_replace('anak-', '', $anak['status'])); ?>][jenis_kelamin]">
                                                                    <option value="L" <?php echo e($anak['jenis_kelamin']=='L' ? 'selected="selected"' : ''); ?> >Laki-laki</option>
                                                                    <option value="P" <?php echo e($anak['jenis_kelamin']=='P' ? 'selected="selected"' : ''); ?>>Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group has-feedback">
                                                                <label>Tanggal lahir</label>
                                                                <input class="birthdate-anak form-control" type="text" name="anak[<?php echo e(str_replace('anak-', '', $anak['status'])); ?>][tgl_lahir]" value="<?php echo e(date('d M Y', strtotime($anak['tgl_lahir']))); ?>" maxlength="10">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                      <?php endforeach; ?>
                                  <?php endif; ?>
                                                                   
                                  <div class="text-right">
                                    <a href="#" class="add-anak"> <i class="fa fa-plus"></i> <?php echo e(trans('kepegawaian/pegawai.add_anak')); ?></a>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="education">
                                <div class="panel-group" id="accordionEducation">
                                  <?php if( isset($row['education']) && !empty($row['education']) ): ?>
                                    <?php foreach($row['education'] as $k=>$e): ?> 
                                        <div class="panel panel-default no-radius item-education" data-item="<?php echo e(($k+1)); ?>">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" class="panel-edu collapsed" data-parent="#accordionEducation" href="#collapseEducation-<?php echo e(($k+1)); ?>" aria-expanded="false"><?php echo e($e['nama_organisasi']); ?></a>
                                                    <a href="#" class="pull-right del-item">&times;</a>
                                                    <span class="countYear pull-right"></span>
                                                </h4>
                                            </div>
                                            <div id="collapseEducation-<?php echo e(($k+1)); ?>" class="panel-collapse collapse" aria-expanded="false">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group has-feedback">
                                                                <label><?php echo e(trans('kepegawaian/pegawai.edu_grade')); ?></label> <span class="char_count"></span><br>
                                                                <select class="form-control select2 panel-edu-input" name="education[<?php echo e(($k+1)); ?>][tingkat]" tabindex="-1" aria-hidden="true">  
                                                                    <?php foreach( config('app.grade_education') as $kE=>$vE  ): ?>
                                                                        <option value="<?php echo e($kE); ?>" <?php echo e($e['tingkat']==$kE ? 'selected="selected"' : ''); ?>><?php echo e($vE); ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group has-feedback">
                                                                <label><?php echo e(trans('kepegawaian/pegawai.edu_name')); ?></label> <span class="char_count"></span>
                                                                <input type="text" class="form-control change-panel-title" name="education[<?php echo e(($k+1)); ?>][nama_organisasi]" value="<?php echo e($e['nama_organisasi']); ?>" maxlength="50" style="padding: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row"><div class="col-md-4">
                                                        <div class="form-group has-feedback">
                                                            <label><?php echo e(trans('kepegawaian/pegawai.edu_divisi')); ?></label> <span class="char_count"></span>
                                                            <input type="text" class="form-control" name="education[<?php echo e(($k+1)); ?>][divisi]" value="<?php echo e($e['divisi']); ?>" maxlength="50" style="padding: 10px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group has-feedback">
                                                            <label><?php echo e(trans('kepegawaian/pegawai.start_year')); ?></label>
                                                            <input class="thn_masuk form-control text-center" type="text" name="education[<?php echo e(($k+1)); ?>][thn_masuk]" value="<?php echo e($e['thn_masuk']); ?>" maxlength="4" style="padding: 10px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group has-feedback">
                                                            <label><?php echo e(trans('kepegawaian/pegawai.end_year')); ?></label>
                                                            <input class="thn_keluar form-control text-center" type="text" name="education[<?php echo e(($k+1)); ?>][thn_keluar]" value="<?php echo e($e['thn_keluar']); ?>" maxlength="4" style="padding: 10px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group has-feedback">
                                                            <label><?php echo e(trans('kepegawaian/pegawai.edu_score')); ?></label> <span class="char_count"></span>
                                                            <input type="text" class="form-control text-center" name="education[<?php echo e(($k+1)); ?>][nilai]" maxlength="5" value="<?php echo e($e['nilai']); ?>" style="padding: 10px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group has-feedback">
                                                            <label><?php echo e(trans('kepegawaian/pegawai.edu_scale')); ?></label> <span class="char_count"></span>
                                                            <input type="text" class="form-control text-center" name="education[<?php echo e(($k+1)); ?>][skala]" maxlength="5" value="<?php echo e($e['skala']); ?>" style="padding: 10px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                  <?php endif; ?>      
                                  <div class="text-right">
                                    <a href="#" class="add-education"> <i class="fa fa-plus"></i> <?php echo e(trans('kepegawaian/pegawai.add_education')); ?></a>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="job-history">
                                <div class="panel-group" id="accordionJob">
                                  <?php if( isset($row['job']) && !empty($row['job']) ): ?>
                                    <?php foreach($row['job'] as $k=>$e): ?>
                                        <div class="panel panel-default no-radius item-job" data-item="<?php echo e(($k+1)); ?>">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" class="panel-job" data-parent="#accordionJob" href="#collapseJob-<?php echo e(($k+1)); ?>" aria-expanded="true"><?php echo e($e['nama_organisasi']); ?></a>
                                                    <a href="#" class="pull-right del-item">&nbsp;</a><span class="countYear pull-right"></span>
                                                </h4>
                                            </div>
                                            <div id="collapseJob-<?php echo e(($k+1)); ?>" class="panel-collapse collapsed collapse" aria-expanded="true">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group has-feedback">
                                                                <label><?php echo e(trans('kepegawaian/pegawai.job_name')); ?></label> <span class="char_count"></span>
                                                                <input type="text" class="form-control change-panel-title panel-job-input" name="job[<?php echo e(($k+1)); ?>][nama_organisasi]" value="<?php echo e($e['nama_organisasi']); ?>" maxlength="50" style="padding: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group has-feedback">
                                                                <label><?php echo e(trans('kepegawaian/pegawai.job_jabatan')); ?></label> 
                                                                <span class="char_count"></span><br>
                                                                <input type="text" class="form-control" name="job[<?php echo e(($k+1)); ?>][tingkat]" value="<?php echo e($e['tingkat']); ?>" maxlength="50" style="padding: 10px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group has-feedback">
                                                                <label><?php echo e(trans('kepegawaian/pegawai.edu_divisi')); ?></label> <span class="char_count"></span>
                                                                <input type="text" class="form-control" name="job[<?php echo e(($k+1)); ?>][divisi]" value="<?php echo e($e['divisi']); ?>" maxlength="50" style="padding: 10px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group has-feedback">
                                                                <label><?php echo e(trans('kepegawaian/pegawai.start_year')); ?></label>
                                                                <input class="thn_masuk form-control text-center" type="text" name="job[<?php echo e(($k+1)); ?>][thn_masuk]" value="<?php echo e($e['thn_masuk']); ?>" maxlength="4" style="padding: 10px;">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group has-feedback">
                                                                <label><?php echo e(trans('kepegawaian/pegawai.end_year')); ?></label>
                                                                <input class="thn_keluar form-control text-center" type="text" name="job[<?php echo e(($k+1)); ?>][thn_keluar]" value="<?php echo e($e['thn_keluar']); ?>" maxlength="4" style="padding: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                    
                                    <?php endforeach; ?>
                                  <?php endif; ?>      
                                  <div class="text-right">
                                    <a href="#" class="add-job"> <i class="fa fa-plus"></i> <?php echo e(trans('kepegawaian/pegawai.add_job')); ?></a>
                                  </div>
                                </div>

                              </div>
                            </div>
                            
                        </div>
                        
                        <div class="text-left">
                            <a href="<?php echo e(url('pegawai')); ?>" class="btn btn-default btn-flat btn-reset"><?php echo e(trans('global.act_back')); ?></a>
                            <button type="submit" class="btn btn-primary btn-flat"><?php echo e(isset($row['id']) ? trans('global.act_edit') : trans('global.act_add')); ?></button>
                        </div>
                          
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo e(isset($row['id']) ? $row['id'] : ''); ?>" />
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
    </form>
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
<style>
    #accordionFamily .panel, #accordionEducation .panel, #accordionJob .panel {
        margin-top: -1px;
    }
    #box-pasangan{
        box-shadow: none;
        background: #fff;
        margin-bottom: 0;
    }
    #TabContent {
        background: #fff;
        padding: 10px 10px 0;
        border: 1px solid #ddd;
        border-top: 0;
        margin-bottom: 20px;
    }
    .countYear{
        padding: 0 15px;
        font-size: 15px;
    }
    #previewFoto {
        max-width: 100%;
        margin: 20px 0;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    
    $(document).ready(function(){
        
        initJK();
        initYear();
        initDate();
        initNikah();
    
        //SUBMIT
        $(document).on('submit', '#formData', function(){
            
            var form = $(this);
            
            $.ajax({
        		type		: 'POST',
        		url			: form.attr('action'),
                data        : new FormData(this),
                cache       : false,
                contentType : false,
                processData : false,
        		beforeSend	: function(xhr) { loading(1) },
        		success		: function(dt){
                  
                  if ( dt.rdr ) window.location.href = dt.rdr;
                  
                  if ( dt.form ) form.closest('.box').replaceWith(atob(dt.form));
                  
        	      if ( dt.message ) initNotif(atob(dt.message));
    
            	},
        	}).done(function(){ loading(0) }); 
            
            return false;
        });
        
        
        $('[name=jenis_kelamin]').on('ifChecked', function(event){
          initJK();
        });
        $('[name=menikah]').on('ifChanged', function(event){
          initNikah();
        });
        //add anak
        $(document).on('click', '.add-anak', function(){
            addAnak();
            return false;
        });
        //add Pendidikan
        $(document).on('click', '.add-education', function(){
            addEducation();
            return false;
        });
        //add Kerjaan
        $(document).on('click', '.add-job', function(){
            addJob();
            return false;
        });
        
        //delete item
        $(document).on('click', '.del-item', function(){
            
            $(this).closest('.panel').remove();
            return false;
        });
        
        //chane panel title
        $(document).on('input', '.change-panel-title', function(){
            changePanelTitle($(this));
            $(this).val( $(this).val().toUpperCase() );
        });
        
        //upload image
        $(document).on('click', '#changePhoto', function(){
           $("#inputImage").click();     
           return false; 
        });
        $("#inputImage").change(function(){
            readURL(this, '#previewFoto');
        });
        
        //count education
        $(document).on('input', '.item-education .thn_masuk, .item-education .thn_keluar, .item-job .thn_masuk, .item-job .thn_keluar', function(){
            initYear();
        });
        
        function changePanelTitle(elm)
        {
            var panelTitle = elm.closest('.panel').find('.panel-title a:first');
            var title = '';
            elm.closest('.panel').find('.change-panel-title').each(function(){
                title += $(this).val() + ' '; 
            });
            panelTitle.text(title.toUpperCase());
        }
        
        function initDate()
        {
            //date picker
            $('[name="tgl_lahir"], .birthdate').datepicker({
                'startDate' : '<?php echo e(date("d M Y", strtotime("-70years"))); ?>',
                'endDate'  : '<?php echo e(date("d M Y", strtotime("-17years"))); ?>',
                'format' : 'dd M yyyy',
            });
            $('.birthdate-anak').datepicker({
                'startDate' : '<?php echo e(date("d M Y", strtotime("-60years"))); ?>',
                'endDate'  : '<?php echo e(date("d M Y", strtotime("-1day"))); ?>',
                'format' : 'dd M yyyy',
            });
            //date picker
            $('[name="tgl_masuk"], .tgl_masuk, .tgl_keluar').datepicker({
                'startDate' : '<?php echo e(date("d M Y", strtotime("-70years"))); ?>',
                'endDate'  : '<?php echo e(date("d M Y")); ?>',
                'format' : 'dd M yyyy',
            });

        }
        
        function initJK()
        {
          var current = $('[name=jenis_kelamin]:checked').val();
            
          if ( current=='P' )
          {
            $('#pasangan').text("<?php echo e(trans('kepegawaian/pegawai.suami')); ?>");  
          } 
          else if ( current=='L' )
          {
            $('#pasangan').text("<?php echo e(trans('kepegawaian/pegawai.istri')); ?>");  
          }
          else
          {
            $('#pasangan').text("<?php echo e(trans('kepegawaian/pegawai.sutri')); ?>");  
          }
        }
        
        function initNikah()
        {
            var isMenikah = $('[name=menikah]').is(':checked');
            
            if ( isMenikah )
            {
                $('#box-pasangan .overlay').hide();
            }
            else 
            {
                $('#box-pasangan .overlay').show();
            }
        }
        
        function addAnak()
        {
            var counter = $('.item-anak').length>0 ? $('.item-anak:last').data('item') + 1 : 1;
            var content = '<div class="panel panel-default no-radius item-anak" data-item="'+counter+'">'
                            +'<div class="panel-heading">'
                              +'<h4 class="panel-title">'
                                +'<a data-toggle="collapse" class="panel-anak" data-parent="#accordionFamily" href="#collapseFamily-'+ (counter+1) +'">'
                                  +'<?php echo e(trans('kepegawaian/pegawai.anak_ke')); ?> <span class="item-counter">' + counter +'</span>'
                                +'</a>'
                                +'<a href="#" class="pull-right del-item">&times;</a>'
                              +'</h4>'
                            +'</div>'
                            +'<div id="collapseFamily-'+ (counter+1) +'" class="panel-collapse collapse">'
                              +'<div class="panel-body">'
                                +'<div class="row">'
                                   +'<div class="col-md-6">'
                                        +'<div class="form-group has-feedback">'
                                          +'<label><?php echo e(trans('kepegawaian/pegawai.name')); ?></label><span class="char_count"></span>'
                                          +'<input type="text" class="form-control panel-anak-input" name="anak['+counter+'][nama]" value="" maxlength="50" />'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-3">'
                                        +'<div class="form-group has-feedback">'
                                          +'<label><?php echo e(trans('kepegawaian/pegawai.gender')); ?></label>'
                                          +'<select class="form-control" name="anak['+counter+'][jenis_kelamin]">'
                                            +'<option value="L"><?php echo e(trans('kepegawaian/pegawai.male')); ?></option>'
                                            +'<option value="P"><?php echo e(trans('kepegawaian/pegawai.female')); ?></option>'
                                          +'</select>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-3">'
                                        +'<div class="form-group has-feedback">'
                                          +'<label><?php echo e(trans('kepegawaian/pegawai.tgl_lahir')); ?></label>'
                                          +'<input class="birthdate-anak form-control" type="text" name="anak['+counter+'][tgl_lahir]" value=""  maxlength="10" />'
                                        +'</div>'
                                    +'</div>'
                                +'</div>'
                              +'</div>'
                            +'</div>'
                      +'</div>';
            
            if ( $('.item-anak').length>0 )
            {
                $('.item-anak:last').after(content);
            }
            else
            {
                $('#accordionFamily .panel:last').after(content);
            }
            $('.panel-anak:last').click();
            $('.panel-anak-input:last').focus();
            initDate();
        }
        
        function initYear()
        {
            $('.countYear').each(function(){
               var e = $(this);
               var p = $(this).closest('.panel');
               var m = p.find('.thn_masuk').val(); 
               var k = p.find('.thn_keluar').val();
               var r = (k-m)>0 ? (k-m) + ' tahun' : 'kurang dari setahun';
               e.text(r); 
            });
        }
        
        function addEducation()
        {
            var counter = $('.item-education').length>0 ? $('.item-education:last').data('item') + 1 : 1;
            var content = '<div class="panel panel-default no-radius item-education" data-item="'+counter+'">'
                            +'<div class="panel-heading">'
                                +'<h4 class="panel-title">'
                                    +'<a data-toggle="collapse" class="panel-edu" data-parent="#accordionEducation" href="#collapseEducation-'+ counter +'"><?php echo e(trans('kepegawaian/pegawai.education')); ?></a>'
                                    +'<a href="#" class="pull-right del-item">&times;</a>'
                                    +'<span class="countYear pull-right"></span>'
                                +'</h4>'
                            +'</div>'
                            +'<div id="collapseEducation-'+ counter +'" class="panel-collapse collapse">'
                                +'<div class="panel-body">'
                                    +'<div class="row">'
                                        +'<div class="col-md-3">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.edu_grade')); ?></label> <span class="char_count"></span><br/>'
                                                +'<select class="form-control select2 panel-edu-input" name="education['+counter+'][tingkat]">'
                                                +'  <?php foreach( config("app.grade_education") as $kE=>$vE ): ?> <option value="<?php echo e($kE); ?>"><?php echo e($vE); ?></option> <?php endforeach; ?>'
                                                +'</select>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-9">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.edu_name')); ?></label> <span class="char_count"></span>'
                                                +'<input type="text" class="form-control change-panel-title" name="education['+counter+'][nama_organisasi]" value="" maxlength="50" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                  
                                    +'<div class="row">'
                                        +'<div class="col-md-4">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.edu_divisi')); ?></label> <span class="char_count"></span>'
                                                +'<input type="text" class="form-control" name="education['+counter+'][divisi]" value="" maxlength="50" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-2">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.start_year')); ?></label>'
                                                +'<input class="thn_masuk form-control text-center" type="text" name="education['+counter+'][thn_masuk]" value="" maxlength="4" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-2">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.end_year')); ?></label>'
                                                +'<input class="thn_keluar form-control text-center" type="text" name="education['+counter+'][thn_keluar]" value="" maxlength="4" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-2">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.edu_score')); ?></label> <span class="char_count"></span>'
                                                +'<input type="text" class="form-control text-center" name="education['+counter+'][nilai]" maxlength="5" value="" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-2">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.edu_scale')); ?></label> <span class="char_count"></span>'
                                                +'<input type="text" class="form-control text-center" name="education['+counter+'][skala]" maxlength="5" value="" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                    
                                +'</div>'
                            +'</div>'
                        +'</div>';
            
            if ( $('.item-education').length>0 )
            {
                $('.item-education:last').after(content);
            }
            else
            {
                $('#accordionEducation div').before(content);
            }
            $('.panel-edu:last').click();
            $('.panel-edu-input:last').focus();
            initDate();
            select2();
        }
        
        function addJob()
        {
            var counter = $('.item-job').length>0 ? $('.item-job:last').data('item') + 1 : 1;
            var content = '<div class="panel panel-default no-radius item-job" data-item="'+counter+'">'
                            +'<div class="panel-heading">'
                                +'<h4 class="panel-title">'
                                    +'<a data-toggle="collapse" class="panel-job" data-parent="#accordionJob" href="#collapseJob-'+ counter +'"><?php echo e(trans('kepegawaian/pegawai.company')); ?></a>'
                                    +'<a href="#" class="pull-right del-item">&times;</a>'
                                    +'<span class="countYear pull-right"></span>'
                                +'</h4>'
                            +'</div>'
                            +'<div id="collapseJob-'+ counter +'" class="panel-collapse collapse">'
                                +'<div class="panel-body">'
                                    +'<div class="row">'
                                        +'<div class="col-md-12">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.job_name')); ?></label> <span class="char_count"></span>'
                                                +'<input type="text" class="form-control change-panel-title panel-job-input" name="job['+counter+'][nama_organisasi]" value="" maxlength="50" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                  
                                    +'<div class="row">'
                                        +'<div class="col-md-4">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.job_jabatan')); ?></label> <span class="char_count"></span><br/>'
                                                +'<input type="text" class="form-control" name="job['+counter+'][tingkat]" value="" maxlength="50" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-4">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.job_divisi')); ?></label> <span class="char_count"></span>'
                                                +'<input type="text" class="form-control" name="job['+counter+'][divisi]" value="" maxlength="50" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-2">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.start_year')); ?></label>'
                                                +'<input class="thn_masuk form-control text-center" type="text" name="job['+counter+'][thn_masuk]" value="" maxlength="4" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col-md-2">'
                                            +'<div class="form-group has-feedback">'
                                                +'<label><?php echo e(trans('kepegawaian/pegawai.end_year')); ?></label>'
                                                +'<input class="thn_keluar form-control text-center" type="text" name="job['+counter+'][thn_keluar]" value="" maxlength="4" style="padding: 10px;">'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'
                                    
                                +'</div>'
                            +'</div>'
                        +'</div>';
            
            if ( $('.item-job').length>0 )
            {
                $('.item-job:last').after(content);
            }
            else
            {
                $('#accordionJob div').before(content);
            }
            $('.panel-job:last').click();
            $('.panel-job-input:last').focus();
            initDate();
            select2();
        }
        
        
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make( config('app.template') . 'layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>