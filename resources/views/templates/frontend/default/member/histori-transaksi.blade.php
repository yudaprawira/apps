<div class="row-fluid">
    <div class="span12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th>TANGGAL</th>
                <th>INVOICE</th>
                <th>TOTAL</th>
                <th>STATUS</th>
                <th>AKSI</th>
            </thead>
            <tbody>
                @foreach( $trans as $k=>$t )
                <tr>
                    <td class="text-left nowrap">{{ formatDate($t->tanggal, 5) }}</td>
                    <td class="text-center nowrap">{{ $t->invoice }}</td>
                    <td class="text-right nowrap">{{ formatNumber($t->total, 0, true) }}</td>
                    <td class="text-center nowrap">{{ $t->status_pesanan }}</td>
                    <td class="text-center nowrap">
                    <a href="{{ url('member/histori-transaksi?page='.val($_GET, 'page').'&inv='.$t->invoice) }}">Detail</a>
                    @if($t->status_pesanan=='PESANAN')
                    | <a href="{{ url('konfirmasi?inv='.$t->invoice) }}" target="_blank">Konfirmasi</a>
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">{!! $trans->appends(Input::except('page'))->render() !!}</div>
    </div>
</div>
@push('styles')
<style>
.text-center {
    text-align: center!important;
}
.text-right {
    text-align: right!important;
}
</style>
@endpush