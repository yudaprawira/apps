<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> {{ val($dataForm, 'form_title') }} </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <form method="POST" action="{{ BeUrl(config('akunbank.info.alias').'/save') }}" id="formData" <form method="POST" action="{{ BeUrl(config('akunbank.info.alias').'/save') }}" enctype="multipart/form-data">
                
                <div class="box-body">
                    <div class="text-center">
                        <img  src="{{ val($dataForm, 'image') ? asset('media/'.val($dataForm, 'image')) : asset('/global/images/no-image.png') }}" id="imagePreview"><br/><br/>
                        <a href="#" class="btn btn-sm btn-flat btn-default" id="changeImage"><i class="fa fa-pencil"></i> {{ trans('akunbank::global.change_image') }} </a>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <input type="checkbox" name="status" {{ isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked' }} /> {{ trans('global.status_active') }}
                </div>

                <div class="form-group has-feedback">
                    <label>{{ trans('akunbank::global.nama_bank') }}</label><span class="char_count"></span>
                    <input type="text" class="form-control" name="nama_bank" maxlength="20" value="{{ val($dataForm, 'nama_bank') }}" />
                </div>
                <div class="form-group has-feedback">
                    <label>{{ trans('akunbank::global.nama_akun') }}</label><span class="char_count"></span>
                    <input type="text" class="form-control" name="nama_akun" maxlength="50" value="{{ val($dataForm, 'nama_akun') }}" />
                </div>
                <div class="form-group has-feedback">
                    <label>{{ trans('akunbank::global.rekening') }}</label><span class="char_count"></span>
                    <input type="text" class="form-control" name="rekening" maxlength="30" value="{{ val($dataForm, 'rekening') }}" />
                </div>

                <input type="hidden" name="id" value="{{ val($dataForm, 'id') }}" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="file" name="image" id="inputImage" />
                <button type="submit" class="btn btn-primary btn-flat">{{ val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add') }}</button>
                <a href="{{ BeUrl(config('akunbank.info.alias').'/edit/0') }}" class="btn btn-default btn-flat btn-reset">{{ trans('global.act_back') }}</a>
                </form>
                
            </div><!-- /.box-body -->
        </div>
    </div>
</div>