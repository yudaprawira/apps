@extends( config('app.be_template') . 'layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data {{ config('member.info.name') }} </h3>
                  <a href="{{ BeUrl(config('member.info.alias').'/add') }}" class="btn btn-primary btn-flat btn-add pull-right">{{ trans('global.add') }} {{ config('member.info.name') }} </a>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table" data-url="{{ BeUrl(config('member.info.alias')) }}" data-token="{{ csrf_token() }}">
                    <thead>
                    <tr>
                      <th data-sort="1" data-search="1" data-column="id" style="width: 10px">ID</th>
                      <th data-sort="1" data-search="1" data-column="nama">{{ trans('member::global.nama') }}</th>
                      <th data-sort="1" data-search="1" data-column="email" class="col-md-1 nowrap">{{ trans('member::global.email') }}</th>
                      <th data-sort="1" data-search="1" data-column="status" class="col-md-1 nowrap">{{ trans('global.status') }}</th>
                      <th data-sort="1" data-search="1" data-column="created_at" class="col-md-1 nowrap">{{ trans('member::global.created_at') }}</th>
                      <th data-sort="1" data-search="1" data-column="lastlogin" class="col-md-1 nowrap">{{ trans('member::global.last_login') }}</th>
                      <th data-sort="0" data-search="0" data-column="action" style="width: 90px;white-space: nowrap;">{{ trans('global.action') }}</th>
                    </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
        </div>
    </div>
@stop
@push('style')
<style>
.btn-add{
  margin-right: 5px;
}
#list-table td:nth-child(4),
#list-table td:nth-child(5),
#list-table td:nth-child(6){
  white-space: nowrap;
  text-align: center;
}
</style>
@endpush