@extends( config('app.template') . 'layouts.master')

@section('content')
<div class="parallax-window inner-banner tc-padding overlay-dark" data-parallax="scroll" >
    <div class="container">
        <div class="inner-page-heading style-2 h-white">
            <h2>MEMBER AREA</h2>
        </div>
    </div>
</div>
<div class="breadcrumb-holder white-bg">
    <div class="container">
        <div class="breadcrumbs">
            <ul>
                <li><a href="{{url('/')}}">BERANDA</a></li>
                <li><a href="{{url('member')}}">MEMBER</a></li>
            </ul>
        </div>
    </div>
</div>
<main class="main-content">
    <section id="content-holder" class="container-fluid container">
        <section class="row">
            <section class="col-md-12 cart-holder">
                <div class="row">
                    <div class="col-md-3">
                        <div class="well">
                            <ul class="menu-member">
                                <li> <a href="{{ url('member') }}">Profil</a> </li>
                                <li> <a href="{{ url('member/wishlist') }}">Wishlist</a> </li>
                                <li> <a href="{{ url('member/histori-transaksi') }}">Histori Transaksi</a> </li>
                                <li> <a href="{{ url('member/logout') }}">Logout</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        {!! $member_content !!}
                    </div>
                </div>

            </section>
        </section>
    </section>
</main>
@stop
@push('styles')
<style>
.well{
    border-radius: 0!important;
}
.menu-member {
    margin: 0;
    padding: 0;
    list-style: none;
}
.menu-member a {
    display: block;
    padding: 10px 5px;
    font-size: 16px;
    border-bottom: 1px solid #ddd;
    text-decoration: none;
}
.menu-member li a:hover {
    background: #ddd;
}
.menu-member li:last-child a {
    border-bottom: none;
}
#formAccount{
    margin: 0;
}
#formAccount [type="submit"] {
    border: 0;
    font-size: 14px;
    color: #fff;
    padding: 10px 20px;
    background: #98b827;
    cursor: pointer;
    transition: width 1s;
    -moz-transition: 1s;
    -webkit-transition: 1s;
    -o-transition: 1s;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function(){
    $(document).on('submit', '#formAccount', function(){
        
        var frm = $(this);

        $.ajax({
            type		: 'POST',
            url			: frm.attr('action'),
            data		: frm.serialize(),
            beforeSend	: function(xhr) { loading(1); },
            success		: function(dt){
                if ( dt.message ) initNotif(atob(dt.message));

                if ( dt.status == true )
                {
                    $('[type=password]').val('');
                }
            },
        }).done(function(){ loading(0); });
        
        return false;
    });
});
</script>
@endpush