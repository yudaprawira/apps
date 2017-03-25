@extends( config('app.be_template') . 'layouts.master')

@section('content')
<form method="POST" action="{{ BeUrl(config('book.info.alias').'/save') }}" enctype="multipart/form-data">

    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> {{ trans('book::global.image') }} </h3>
                    <a href="#" class="btn btn-sm btn-flat btn-default pull-right" id="changeImage"><i class="fa fa-pencil"></i> {{ trans('book::global.change_image') }} </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="text-center">
                        <img  src="{{ val($dataForm, 'image') ? asset(val($dataForm, 'image')) : asset('/global/images/no-image.png') }}" id="imagePreview">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> {{ val($dataForm, 'form_title') }} </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="status" {{ isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked' }} /> {{ trans('global.status_active') }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="headline" {{ isset($dataForm['headline']) ? (val($dataForm, 'headline')=='1' ? 'checked' : '') : '' }} /> {{ trans('book::global.headline') }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="tersedia" {{ isset($dataForm['tersedia']) ? (val($dataForm, 'tersedia')=='1' ? 'checked' : '') : 'checked' }} /> {{ trans('book::global.tersedia') }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <input type="checkbox" name="terjual" {{ isset($dataForm['terjual']) ? (val($dataForm, 'terjual')=='1' ? 'checked' : '') : '' }} /> {{ trans('book::global.terjual') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group has-feedback">
                                <label class="required">{{ trans('book::global.title') }}</label><span class="char_count"></span>
                                <input type="text" class="form-control" name="title" maxlength="125" value="{{ val($dataForm, 'title') }}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.kategori') }}</label>
                                <select class="form-control select2" name="kategori">
                                <option>-------------------</option>
                                @foreach($select_categories as $c=>$v)
                                    <option value="{{ $c }}" {{ val($dataForm, 'kategori')==$c?'selected':'' }} >{{$v}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.penulis') }}</label><span class="char_count"></span>
                                <select class="form-control select2" name="pengarang">
                                <option>-------------------</option>
                                @foreach($select_pengarang as $c=>$v)
                                    <option value="{{ $c }}" {{ val($dataForm, 'pengarang')==$c?'selected':'' }} >{{$v}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.penerbit') }}</label><span class="char_count"></span>
                                <select class="form-control select2" name="penerbit">
                                <option>-------------------</option>
                                @foreach($select_penerbit as $c=>$v)
                                    <option value="{{ $c }}" {{ val($dataForm, 'penerbit')==$c?'selected':'' }} >{{$v}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.isbn') }}</label><span class="char_count"></span>
                                <input type="text" class="form-control" name="isbn" maxlength="125" value="{{ val($dataForm, 'isbn') }}" />
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.rilis') }}</label>
                                <input type="number" style="padding-right: 0;" class="form-control" name="rilis" maxlength="50" value="{{ val($dataForm, 'rilis') }}" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.halaman') }}</label><span class="char_count"></span>
                                <div class="input-group">
                                    <input type="number" style="padding-right: 0;" class="form-control" name="halaman" maxlength="5" value="{{ val($dataForm, 'halaman') }}" />
                                    <span class="input-group-addon">{{ trans('book::global.lembar') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.berat') }}</label><span class="char_count"></span>
                                <div class="input-group">
                                    <input type="text" class="form-control tDec" name="berat" maxlength="5" value="{{ val($dataForm, 'berat') }}" />
                                    <span class="input-group-addon">Kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.bahasa') }}</label><span class="char_count"></span>
                                <input type="text" class="form-control" name="bahasa" maxlength="50" value="{{ val($dataForm, 'bahasa') }}" />
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label>{{ trans('book::global.harga_sebelum') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" class="form-control tNum" name="harga_sebelum" maxlength="15" value="{{ val($dataForm, 'harga_sebelum') ? formatNumber(val($dataForm, 'harga_sebelum')) : 0 }}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label class="required">{{ trans('book::global.harga') }}</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp</span>
                                    <input type="text" class="form-control tNum" name="harga" maxlength="15" value="{{ formatNumber(val($dataForm, 'harga')) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label class="required">{{ trans('book::global.deskripsi') }}</label><span class="char_count"></span>
                                <textarea class="form-control" name="deskripsi">{{ val($dataForm, 'deskripsi') }}</textarea>
                            </div>
                        </div>
                    </div>



                    <input type="hidden" name="id" value="{{ val($dataForm, 'id') }}" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="file" name="image" id="inputImage" />
                    <button type="submit" class="btn btn-primary btn-flat">{{ val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add') }}</button>
                    <a href="{{ BeUrl(config('book.info.alias')) }}" class="btn btn-default btn-flat btn-reset">{{ trans('global.act_back') }}</a>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

</form>
@stop

@push('scripts')
<script src="{{ asset('/global/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
$(document).ready(function(){
    initNumber();
    $(document).on('submit', 'form', function(){
        stringToNumForm($(this));
    });
});

tinymce.init({ 
    selector:'textarea',
    height: 200,
    theme: 'modern', 
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons | codesample',
    image_advtab: true,
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ] 
});
</script>
@endpush