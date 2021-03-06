<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> {{ val($dataForm, 'form_title') }} </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <form method="POST" action="{{ BeUrl(config('rating.info.alias').'/save') }}" id="formData">
                
                <div class="form-group has-feedback">
                    <input type="checkbox" name="status" {{ isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked' }} /> {{ trans('global.status_active') }}
                </div>

                <div class="form-group has-feedback">
                    <label>{{ trans('rating::global.text') }}</label><span class="char_count"></span>
                    <textarea class="form-control" name="text" maxlength="255">{{ val($dataForm, 'text') }}</textarea>
                </div>

                <input type="hidden" name="id" value="{{ val($dataForm, 'id') }}" />
                <input type="hidden" name="member_id" value="{{ val($dataForm, 'member_id') }}" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit" class="btn btn-primary btn-flat">{{ val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add') }}</button>
                <a href="{{ BeUrl(config('rating.info.alias').'/edit/0') }}" class="btn btn-default btn-flat btn-reset">{{ trans('global.act_back') }}</a>
                </form>
                
            </div><!-- /.box-body -->
        </div>
    </div>
</div>