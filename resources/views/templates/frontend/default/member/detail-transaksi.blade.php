<div class="well">
    <h3>Terima kasih</h3>
    <strong>Invoice Anda : {{ $row->invoice }}</strong>
    <p>Anda menggunakan metode pembayaran transfer.<br/>
    Batas akhir pembayaran untuk metode transfer adalah <strong>{{ formatDate(date("Y-m-d H:i:s", strtotime(config('app.expired_order'), strtotime($row->tanggal))), 5) }}</strong>.</p>
    <p>Agar {{ config('app.title') }} dapat mengirimkan pesanan Anda, silakan lakukan dua tahap selanjutnya, yaitu</p>
    <ol>
        <li>Transfer total pembayaran ke salah satu rekening bank pembayaran {{ config('app.title') }}</li>
        <li>Lakukan pengisian form konfirmasi pembayaran di situs {{ config('app.title') }}. Konfirmasi pembayaran ada dihalaman histori transaksi di <a href="{{ url('member/histori-transaksi') }}">sini</a> (login dulu sebelum masuk ke halaman histori transaksi)</li>
    </ol>
    <br/>
    <strong>Keterangan : </strong>
    <ul>
        <li>Pesanan Anda akan kami kirim setelah Anda menyelesaikan kedua tahap diatas.</li>
        <li class="red">Pesanan yang tidak disertai konfirmasi pembayaran, akan mengalami penundaan pengiriman</li>
    </ul>
    <div class="row-fluid">
        <div class="span12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr><th class="key">TANGGAL</th> <td>{{ formatDate($row->tanggal, 5) }}</td></tr>
                    <tr><th class="key">INVOICE</th> <td>{{ $row->invoice }}</td></tr>
                    <tr><th class="key">TOTAL</th> <td>{{ formatNumber($row->subtotal, 0, true) }}</td></tr>
                    <tr><th class="key">STATUS</th> <td>{{ $row->status_pesanan }}</td></tr>
                    <tr><th class="key">METODE PEMBAYARAN</th> <td>{{ strtoupper($row->metode_pembayaran) }}</td></tr>
                    @if(val($row, 'ongkir'))
                    <tr><th class="key">ONGKOS KIRIM</th> <td>{{ formatNumber($row->ongkir, 0, true) }}</td></tr>
                    @endif
                    @if(val($row, 'nomor_resi'))
                    <tr><th class="key">NOMOR RESI</th> <td>{{ val($row, 'nomor_resi', '-') }}</td></tr>
                    @endif
                    @if(val($row, 'ongkir'))
                    <tr><th class="key">TOTAL BAYAR</th> <td>{{ formatNumber($row->total, 0, true) }}</td></tr>
                    @endif
                </thead>
            </table>
            <br/>
            <h4>Detail</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Sampul</th><th>JUDUL BUKU</th> <th>HARGA</th> <th>JUMLAH</th> <th>SUBTOTAL</th>
                </thead>
                <tbody>
                    @foreach( $row->detail as $d )
                    <tr>
                        <td style="width: 50px;"><a href="{{ getBookUrl($d->item)['detail'] }}" target="_blank"><img src="{{ getBookImage(val($d, 'item.image'))['small'] }}"/></a></td>
                        <td class="text-left">{{ $d->item->title }}</td> 
                        <td class="text-right">{{ formatNumber($d->harga, 0, true) }}</td> 
                        <td class="text-center">{{ formatNumber($d->qty) }}</td> 
                        <td class="text-right">{{ formatNumber($d->subtotal, 0, true) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right">TOTAL</td> <th class="text-right">{{ formatNumber($row->subtotal, 0, true) }}</th>
                    </tr>
                </tfoot>
            </table>
            
            <div class="row-fluid">
                <div class="span6">
                    <h4>Data Pembeli</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">NAMA</th> <td>{{ ucwords($row->nama_pembeli) }}</td></tr>
                            <tr><th class="key">EMAIL</th> <td>{{ strtolower($row->email_pembeli) }}</td></tr>
                            <tr><th class="key">ALAMAT</th> <td>{!! nl2br($row->alamat_pembeli) !!}</td></tr>
                            <tr><th class="key">PROVINSI</th> <td>{{ ucwords($row->provinsi_pembeli) }}</td></tr>
                            <tr><th class="key">KOTA</th> <td>{{ ucwords($row->kota_pembeli) }}</td></tr>
                            <tr><th class="key">KODE POS</th> <td>{{ $row->kodepos_pembeli }}</td></tr>
                            <tr><th class="key">TELEPON</th> <td>{{ $row->telepon_pembeli }}</td></tr>
                        </thead>
                    </table>
                </div>
                <div class="span6">
                    <h4>Data Penerima</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">NAMA</th> <td>{{ ucwords($row->nama_penerima) }}</td></tr>
                            <tr><th class="key">EMAIL</th> <td>{{ strtolower($row->email_penerima) }}</td></tr>
                            <tr><th class="key">ALAMAT</th> <td>{!! nl2br($row->alamat_penerima) !!}</td></tr>
                            <tr><th class="key">PROVINSI</th> <td>{{ ucwords($row->provinsi_penerima) }}</td></tr>
                            <tr><th class="key">KOTA</th> <td>{{ ucwords($row->kota_penerima) }}</td></tr>
                            <tr><th class="key">KODE POS</th> <td>{{ $row->kodepos_penerima }}</td></tr>
                            <tr><th class="key">TELEPON</th> <td>{{ $row->telepon_penerima }}</td></tr>
                        </thead>
                    </table>
                </div>
            </div>
            <br/>
            <h4>Pembayaran Tranfer Bank</h4>
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                    @foreach(getBank() as $b)
                        <div class="span4">
                            <img src="{{ asset( 'media/' . val($b, 'image') ) }}" alt="{{ val($b, 'nama_bank') }}" style="widht: 80px;"/><br/>
                            {{ val($b, 'nama_bank') }}</br/>
                            A.N : {{ val($b, 'nama_akun') }}</br/>
                            Rek : {{ val($b, 'rekening') }}
                        </div>
                    @endforeach
                </div>
            </div>

            @if($rowConfirm)
            <div class="row-fluid">
                <div class="span12">
                    <h4>Bukti Pembayaran</h4>
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr><th class="key">TANGGAL</th> <td>{{ formatDate($rowConfirm->tanggal, 5) }}</td></tr>
                            <tr><th class="key">TRANSFER KE AKUN</th> <td>{{ val($rowConfirm, 'bank.nama_bank') }} <br/>
                                                                      {{ val($rowConfirm, 'bank.nama_akun') }}<br/>
                                                                      {{ val($rowConfirm, 'bank.rekening') }}
                                                                      </td></tr>
                            <tr><th class="key">TRANSFER DARI</th> <td>{{ val($rowConfirm, 'bank_dari') }} <br/>
                                                                      {{ val($rowConfirm, 'nama_pemilik') }}
                                                                      </td></tr>
                            <tr><th class="key">TOTAl TRANSFER</th> <td>{{ formatNumber($rowConfirm->total, 0, true) }}</td></tr>
                            <tr><th class="key">LAMPIRAN</th> <td>
                            @if( val($rowConfirm, 'image') )
                                <img src="{{ asset('media/'.val($rowConfirm, 'image')) }}" style="max-width: 100%;"/>
                            @else
                                -
                            @endif
                            </td></tr>
                        </thead>
                    </table>
                </div>
            </div>
            <br/>
            @endif

            <div class="text-left">
                <a href="{{ url('member/histori-transaksi?page='.val($_GET, 'page')) }}" class="btn btn-default">Kembali</a>
                @if($row->status_pesanan=='PESANAN')
                <a href="{{ url('konfirmasi?inv='.$row->invoice) }}" class="btn btn-info" target="_blank">Konfirmasi</a>
                @endif
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
table  {
    background: #FFF;
}
table tr {
    vertical-align: top!important;
}
.key {
    width: 10px;
    white-space: nowrap;
    vertical-align: top!important;
}
.text-center {
    text-align: center!important;
}
.text-right {
    text-align: right!important;
}
</style>
@endpush