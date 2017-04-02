@extends( config('app.template') . 'layouts.master')

@section('content')
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll">
    <div class="container">
        <div class="inner-page-heading style-2 h-white">
            <h2>KONFIRMASI PEMBAYARAN</h2>
        </div>
    </div>
</div>
<div class="breadcrumb-holder white-bg">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{url('/')}}">BERANDA</a></li>
                <li><a href="{{url('member')}}">MEMBER</a></li>
                <li><a href="{{url('member/login')}}">LOGIN</a></li>
            </ul>
        </div>
    </div>
</div>
<main class="main-content">
    <section id="content-holder" class="container-fluid container">
        <section class="row">
            <section class="col-md-4 col-md-offset-4 cart-holder">
                

                <div class="well" style="border-radius: 0;">
                    <form id="formAccount" method="POST" action="" enctype="multipart/form-data">
                        <div class="control-group form-group">
                            <label class="control-label">INVOICE</label>
                            <div class="controls has-feedback">
                                <input class="span12" type="text" name="invoice" maxlength="20" placeholder="BQxxxxxxxxxxxxx" class="" {!! val($row, 'invoice') ? 'value="'.val($row, 'invoice').'" readonly' : '' !!} required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">TRANSFER KE REKENING</label>
                            <div class="controls has-feedback">
                                <select class="span12" name="bank_tujuan">
                                    @foreach(getBank() as $b)
                                    <option value="{{ val($b, 'id') }}">{{ val($b, 'nama_bank') }} - A.N. {{ val($b, 'nama_akun') }} - {{ val($b, 'rekening') }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">BANK YANG DIGUNAKAN</label>
                            <div class="controls has-feedback">
                                <input class="span12" type="text" name="bank_dari" maxlength="20" placeholder="misal : BCA, Mandiri, BRI" class=" " required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">ATAS NAMA</label>
                            <div class="controls has-feedback">
                                <input class="span12" type="text" name="bank_name" maxlength="20" placeholder="Nama pemilik rekening" class=" " required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">JUMLAH NOMINAL</label>
                            <div class="controls has-feedback">
                                <input class="span12 tNum" type="text" name="total" maxlength="20" placeholder="80.000" {!! val($row, 'invoice') ? 'value="'.formatNumber(val($row, 'total')).'" readonly' : '' !!}  required>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="control-label">LAMPIRKAN BUKTI PEMBAYARAN</label>
                            <div class="controls has-feedback text-center">
                                <img  src="{{ asset('/global/images/no-image.png') }}" id="imagePreview"><br/><br/>
                                <a href="#" class="btn btn-sm btn-flat btn-default btn-small" id="changeImage"><i class="fa fa-pencil"></i> UPLOAD FOTO </a>
                            </div>
                        </div>
                        <br/>
                        <div class="text-center">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="file" name="image" id="inputImage" />
                            <button type="submit" class="btn-1 sm shadow-0 full-width">KONFIRMASI</button>
                        </div>

                    </div>
                </div>
            </section>
        </section>
    </section>
@stop
@push('styles')
<style>
#formAccount{
    margin: 0;
}
#formAccount input:not([disabled]) {
    background: #FFF;
}
#formAccount select {
    max-width: 100%;
    background: #FFF;
}
#inputImage {
    visibility: hidden;
    width: 0;
    height: 0;
}
#formAccount [type="text"], #formAccount [type="password"] , #formAccount select {
        padding: 20px 10px;
        height: 40px;
        border-radius: 0;  
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function(){
    
    initNumber();

    //UPLOAD
    if ( $('#changeImage').length>0 && $('#imagePreview').length>0 && $('#inputImage').length>0 )
    {
        $(document).on('click', '#changeImage', function(){
            $('#inputImage').trigger('click');
            return false;
        });
        $(document).on('change', '#inputImage', function(){
            readURL(this, '#imagePreview');
        });
    }

    function readURL(input, elm) 
    {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();            
            reader.onload = function (e) {
                
                $(elm).attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).on('submit', '#formAccount', function(){

        var form = $(this);
        stringToNumForm(form);
        var formData = new FormData();
        formData.append('file', $('#inputImage')[0].files[0]);
        formData.append('post', form.serialize());
        formData.append('_token', '".csrf_token()."');
        

        $.ajax({
            type		: 'POST',
            url			: form.attr('action'),
            data		: formData,
            cache       : false,
            contentType : false,
            processData : false,
            beforeSend	: function(xhr) { loading(1) },
            xhr: function() {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // if upload property exists
                    myXhr.upload.addEventListener('progress', function(e){
                        var percent = (e.loaded / e.total) * 100;
                        console.log(percent);
                    }, false); // progressbar
                }
                return myXhr;
            },
            error: errorHandler = function() {
                alert('Something went wrong!');
            },
            success		: function(dt){
                if ( dt.message ) initNotif(atob(dt.message));

                if ( dt.status == true )
                {
                    if ( dt.redirect ) 
                    {
                        window.location.href = dt.redirect;
                    }
                    else
                    {
                        window.location.reload();
                    }
                }
            },
        }).done(function(){ loading(0); });
        
        return false;
    });
});
</script>
@endpush