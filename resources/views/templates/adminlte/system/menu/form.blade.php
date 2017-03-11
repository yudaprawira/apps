<div class="box">
    <div class="box-header">
      <h3 class="box-title">{{ $title }}</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <form role="form" action="{{ BeUrl('system-menu/save') }}" method="POST" id="formData">
            <div class="form-group has-feedback" style="display: none;" id="data-parent">
              <label>{{ trans('system/menu.parent') }}</label>
              <span class="form-control disabled" disabled="disabled"></span>
              <input type="hidden" class="form-control" name="parent_id" value="" />
            </div>
            <div class="form-group has-feedback">
              <label>{{ trans('system/menu.name') }}</label><span class="char_count"></span>
              <input type="text" class="form-control" name="name" maxlength="35" value="{{ isset($name) ? $name : '' }}" />
            </div>
            <div class="form-group has-feedback">
              <label>{{ trans('system/menu.url') }}</label><span class="char_count"></span>
              <input type="text" class="form-control" name="url" maxlength="35" value="{{ isset($url) ? $url : '' }}" />
            </div>
            <div class="form-group has-feedback">
              <label>{{ trans('system/menu.icon') }}</label><span class="char_count"></span>
              <input type="text" class="form-control" name="icon" maxlength="15" value="{{ isset($icon) ? $icon : '' }}" />
            </div>
            <div class="form-group has-feedback">
              <label>{{ trans('system/menu.desc') }}</label><span class="char_count"></span>
              <textarea class="form-control" name="description" maxlength="75">{{ isset($description) ? $description : '' }}</textarea>
            </div>

            <a href="#" id="show_advance">{{ trans('system/menu.advance') }}</a>
            <div id="area-advance" style="display: none;">
              test
            </div>
            
            <input type="hidden" name="id" value="{{ isset($id) ? $id : '' }}" />
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit" class="btn btn-primary btn-flat">{{ isset($id) ? trans('global.act_edit') : trans('global.act_add') }}</button>
            <a href="{{ BeUrl('system-menu/edit/0') }}" class="btn btn-default btn-flat btn-reset">{{ trans('global.act_cancel') }}</a>
        </form>
    </div>
</div>
@push('style')
<style>
#show_advance {
  display: block;
  text-align: center;
  margin: 15px 0;
  color: #696969;
  position: relative;
}
</style>
@endpush
@push('scripts')
<script>
$(document).on('click', '#show_advance', function(){
  $('#area-advance').toggle();

  if ( $('#area-advance').is(':visible') )
    $(this).text('{{ trans('system/menu.hide_advance') }}');
  else
    $(this).text('{{ trans('system/menu.advance') }}');
  
  return false;
});
</script>
@endpush