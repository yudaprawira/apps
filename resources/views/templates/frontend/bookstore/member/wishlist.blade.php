<div class="row-fluid">
    <div class="span12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th style="width: 64px;">ITEM</th>
                <th>JUDUL</th>
                <th style="width: 30px;">TANGGAL</th>
                <th style="width: 30px;">AKSI</th>
            </thead>
            <tbody>
                @if(count($rows)>0)
                    @foreach( $rows as $k=>$t )
                    <tr>
                        <td class="text-center nowrap">
                            <a href="{{ getBookUrl(val($t, 'book'))['detail'] }}" target="_blank">
                            <img src="{{ getBookImage(val($t, 'book.image'))['small'] }}" />
                            </a>
                        </td>
                        <td class="text-left nowrap">
                            <a href="{{ getBookUrl(val($t, 'book'))['detail'] }}" target="_blank">
                            {{ ucwords(val($t, 'book.title')) }}
                            </a>
                        </td>
                        <td class="text-left nowrap">{{ formatDate($t->tanggal, 5) }}</td>
                        <td class="text-center nowrap">
                        <a href="{{ url('wishlist/delete/'.$t->id) }}" onclick="return confirm('Apakah yakin akan menghapus item {{ucwords(val($t, 'book.title'))}}?')">hapus</a>
                        </td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="5">Belum ada wishlist</td>
                </tr>
                @endif
            </tbody>
        </table>
        <div class="text-center">{!! $rows->appends(Input::except('page'))->render() !!}</div>
    </div>
</div>
@push('styles')
<style>
.nowrap {
    white-space: nowrap;
}
.text-center {
    text-align: center!important;
}
.text-right {
    text-align: right!important;
}
</style>
@endpush