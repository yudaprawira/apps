@extends( config('app.be_template') . 'layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> {{ val($dataForm, 'form_title') }} </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <form method="POST" action="{{ BeUrl(config('pesanan.info.alias').'/save') }}">
                    
                    <div class="form-group has-feedback hide">
                        <input type="checkbox" name="status" {{ isset($dataForm['status']) ? (val($dataForm, 'status')=='1' ? 'checked' : '') : 'checked' }} /> {{ trans('global.status_active') }}
                    </div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">TANGGAL</th> <td>{{ formatDate(val($dataForm, 'tanggal'), 5) }}</td></tr>
                            <tr><th class="key">INVOICE</th> <th>{{ val($dataForm, 'invoice') }}</th></tr>
                            <tr><th class="key">TOTAL</th> <td>{{ formatNumber(val($dataForm, 'subtotal'), 0, true) }}</td></tr>
                            <tr><th class="key">STATUS</th> <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="status_pesanan" class="form-control">
                                            <option value="PESANAN" {{ val($dataForm, 'status_pesanan')=='PESANAN' ? 'selected' : '' }} >PESANAN</option>
                                            <option value="DIBAYAR" {{ val($dataForm, 'status_pesanan')=='DIBAYAR' ? 'selected' : '' }} >DIBAYAR</option>
                                            <option value="DIKIRIM" {{ val($dataForm, 'status_pesanan')=='DIKIRIM' ? 'selected' : '' }} >DIKIRIM</option>
                                            <option value="TERKIRIM" {{ val($dataForm, 'status_pesanan')=='TERKIRIM' ? 'selected' : '' }} >TERKIRIM</option>
                                            <option value="BATAL" {{ val($dataForm, 'status_pesanan')=='BATAL' ? 'selected' : '' }} >BATAL</option>
                                        </select>
                                    </div>
                                </div>
                            </td></tr>
                            <tr><th class="key">METODE PEMBAYARAN</th> <td>{{ strtoupper(val($dataForm, 'metode_pembayaran')) }}</td></tr>
                            <tr><th class="key">ONGKOS KIRIM</th> <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input type="text" class="form-control tNum" name="ongkir" value="{{ formatNumber(val($dataForm, 'ongkir')) }}"/>
                                        </div>
                                    </div>
                                </div>
                            </td></tr>
                             <tr><th class="key">RESI</th> <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="nomor_resi" value="{{ val($dataForm, 'nomor_resi') }}"/>
                                    </div>
                                </div>
                            </td></tr>
                            @if(val($dataForm, 'ongkir'))
                             <tr><th class="key">TOTAL BAYAR</th> <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon" disabled>Rp</span>
                                            <input type="text" class="form-control" disabled value="{{ formatNumber(val($dataForm, 'total')) }}"/>
                                        </div>
                                    </div>
                                </div>
                            </td></tr>
                            @endif
                        </thead>
                    </table>

                    <input type="hidden" name="id" value="{{ val($dataForm, 'id') }}" />
                    <input type="hidden" name="invoice" value="{{ val($dataForm, 'invoice') }}" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <button type="submit" class="btn btn-primary btn-flat">{{ val($dataForm, 'id') ? trans('global.act_edit') : trans('global.act_add') }}</button>
                    <a href="{{ BeUrl(config('pesanan.info.alias')) }}" class="btn btn-default btn-flat btn-reset">{{ trans('global.act_back') }}</a>
                  </form>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> DETAIL ITEM </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Sampul</th><th>JUDUL BUKU</th> <th>HARGA</th> <th>JUMLAH</th> <th>SUBTOTAL</th>
                    </thead>
                    <tbody>
                        @foreach( val($dataForm, 'detail') as $d )
                        <tr>
                            <td style="width: 50px;"><a href="{{ getBookUrl(val($d, 'item'))['detail'] }}" target="_blank"><img src="{{ getBookImage(val($d, 'item.image'))['small'] }}"/></a></td>
                            <td class="text-left">{{ val($d, 'item.title') }}</td> 
                            <td class="text-right">{{ formatNumber(val($d, 'harga'), 0, true) }}</td> 
                            <td class="text-center">{{ formatNumber(val($d, 'qty')) }}</td> 
                            <td class="text-right">{{ formatNumber(val($d, 'subtotal'), 0, true) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-right">TOTAL</td> <th class="text-right">{{ formatNumber(val($dataForm, 'subtotal'), 0, true) }}</th>
                        </tr>
                    </tfoot>
                </table>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> DATA PEMBELI </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">NAMA</th> <td>{{ ucwords(val($dataForm, 'nama_pembeli')) }}</td></tr>
                            <tr><th class="key">EMAIL</th> <td>{{ strtolower(val($dataForm, 'email_pembeli')) }}</td></tr>
                            <tr><th class="key">ALAMAT</th> <td>{!! nl2br(val($dataForm, 'alamat_pembeli')) !!}</td></tr>
                            <tr><th class="key">PROVINSI</th> <td>{{ ucwords(val($dataForm, 'provinsi_pembeli')) }}</td></tr>
                            <tr><th class="key">KOTA</th> <td>{{ ucwords(val($dataForm, 'kota_pembeli')) }}</td></tr>
                            <tr><th class="key">KODE POS</th> <td>{{ val($dataForm, 'kodepos_pembeli') }}</td></tr>
                            <tr><th class="key">TELEPON</th> <td>{{ val($dataForm, 'telepon_pembeli') }}</td></tr>
                        </thead>
                    </table>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> DATA PENERIMA </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">NAMA</th> <td>{{ ucwords(val($dataForm, 'nama_penerima')) }}</td></tr>
                            <tr><th class="key">EMAIL</th> <td>{{ strtolower(val($dataForm, 'email_penerima')) }}</td></tr>
                            <tr><th class="key">ALAMAT</th> <td>{!! nl2br(val($dataForm, 'alamat_penerima')) !!}</td></tr>
                            <tr><th class="key">PROVINSI</th> <td>{{ ucwords(val($dataForm, 'provinsi_penerima')) }}</td></tr>
                            <tr><th class="key">KOTA</th> <td>{{ ucwords(val($dataForm, 'kota_penerima')) }}</td></tr>
                            <tr><th class="key">KODE POS</th> <td>{{ val($dataForm, 'kodepos_penerima') }}</td></tr>
                            <tr><th class="key">TELEPON</th> <td>{{ val($dataForm, 'telepon_penerima') }}</td></tr>
                        </thead>
                    </table>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> BUKTI PEMBAYARAN </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr><th class="key">TANGGAL</th> <td>{{ formatDate(val($rowConfirm, 'tanggal'), 5) }}</td></tr>
                        <tr><th class="key">TRANSFER KE AKUN</th> <td>{{ val($rowConfirm, 'bank.nama_bank') }} <br/>
                                                                    {{ val($rowConfirm, 'bank.nama_akun') }}<br/>
                                                                    {{ val($rowConfirm, 'bank.rekening') }}
                                                                    </td></tr>
                        <tr><th class="key">TRANSFER DARI</th> <td>{{ val($rowConfirm, 'bank_dari') }} <br/>
                                                                    {{ val($rowConfirm, 'nama_pemilik') }}
                                                                    </td></tr>
                        <tr><th class="key">TOTAl TRANSFER</th> <td>{{ formatNumber(val($rowConfirm, 'total'), 0, true) }}</td></tr>
                        <tr><th class="key">LAMPIRAN</th> <td>
                        @if( val($rowConfirm, 'image') )
                            <img src="{{ asset('media/'.val($rowConfirm, 'image')) }}" style="max-width: 100%;"/>
                        @else
                            -
                        @endif
                        </td></tr>
                    </thead>
                </table>
                  
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>
@stop


@push('style')
<style>
.key {
    width: 10px!important;
    white-space: nowrap;
    vertical-align: top!important;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function(){
    initNumber();
    $(document).on('submit', 'form', function(){
        stringToNumForm($(this));
    });
});
</script>
@endpush