@extends( config('app.template') . 'layouts.master')

@section('content')
    test detail {{ $row->title }} <br/>
    test url {{ $row->url }} <br/>
    test content {!! $row->text !!} <br/>
@stop

@push('style')
    
@endpush
@push('scripts')
@endpush