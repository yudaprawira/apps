@extends( config('app.template') . 'layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Level</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped table-bordered" id="list-table" data-url="{{ BeUrl('system-level') }}" data-token="{{ csrf_token() }}">
                    <thead>
                    <tr>
                      <th data-sort="1" data-search="1" data-column="id" style="width: 10px">#</th>
                      <th data-sort="1" data-search="1" data-column="name">{{ trans('system/level.name') }}</th>
                      <th data-sort="0" data-search="0" data-column="action" style="width: 90px;white-space: nowrap;">{{ trans('global.action') }}</th>
                    </tr>
                    </thead>
                    <tbody> </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div>
        </div>
        <div class="col-md-4">
            {!! $form !!}
        </div>
    </div>
@stop