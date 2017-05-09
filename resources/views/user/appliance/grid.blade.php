<table class="table" id="myTable">
    <thead>
    <tr>
        <th class="th_chk"><input type="checkbox" id="checkAll"></th>
        <th>{{ trans('appliances.name') }}</th>
        <th>{{ trans('category.cate_name') }}</th>
        <th>{{ trans('appliances.status') }}</th>
        
        <th>{{ trans('appliances.electric_value') }}</th>
        <th>{{ trans('appliances.action') }}</th>
    </tr>
    </thead>
    <tbody>
        @foreach($apps as $app)
            <tr id="{{ $app['id'] }}">
                <td class="chk">
                    <input type="checkbox" class="case" value="{{ $app['id'] }}"/>
                </td>
                <td>{{ $app->name }}</td>
                <td>{{ $app->category->name }}</td>
                <td>{!! fill_status($app->status) !!}</td>
                
                <td>{{ $app->electric_value }}</td>

                <td class="col-md-2 td_action">
                    <a href="{{ route('appliances.edit', [$app->id]) }}" class="btn btn-link">
                        <i class="fa fa-pencil fa-fw"></i>
                        {{ trans('common.edit') }}
                    </a>
                </td>

                <td class="col-md-2 td_action">
                    {!! Form::open(['method' => 'DELETE', 'route' => ['appliances.destroy',$app->id]]) !!}
                        {{ Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ' . 'Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure to delete ?')"]) }}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
