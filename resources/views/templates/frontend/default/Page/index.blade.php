@extends( config('app.template') . 'layouts.master')

@section('content')
    test content 12 <?php echoPre($_SERVER['REQUEST_URI']) ?>
@stop

@push('style')
    
@endpush
@push('scripts')
@endpush