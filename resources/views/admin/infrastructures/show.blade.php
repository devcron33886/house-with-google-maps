@extends('layouts.admin')
@section('content')
@can('infrastructure_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.infrastructures.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.infrastructure.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.infrastructure.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Infrastructure">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.infrastructure.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.infrastructure.fields.house') }}
                        </th>
                        <th>
                            {{ trans('cruds.infrastructure.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.infrastructure.fields.latitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.infrastructure.fields.longitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.infrastructure.fields.photos') }}
                        </th>
                        <th>
                            {{ trans('cruds.infrastructure.fields.day') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($infrastructure as $key => $infrastructure)
                        <tr data-entry-id="{{ $infrastructure->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $infrastructure->id ?? '' }}
                            </td>
                            <td>
                                @foreach($infrastructure->houses as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $infrastructure->name ?? '' }}
                            </td>
                            <td>
                                {{ $infrastructure->latitude ?? '' }}
                            </td>
                            <td>
                                {{ $infrastructure->longitude ?? '' }}
                            </td>
                            <td>
                                {{ $infrastructure->photos ?? '' }}
                            </td>
                            <td>
                                @foreach($infrastructure->days as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('infrastructure_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.infrastructures.show', $infrastructure->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('infrastructure_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.infrastructures.edit', $infrastructure->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('infrastructure_delete')
                                    <form action="{{ route('admin.infrastructures.destroy', $infrastructure->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('infrastructure_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.infrastructures.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Infrastructure:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
