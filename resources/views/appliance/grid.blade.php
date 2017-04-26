<table class="table" id="myTable">
    <thead>
    <tr>
        <th class="th_chk"><input type="checkbox" id="checkAll"></th>
        <th>{{ trans('appliances.id') }}</th>
        <th>{{ trans('appliances.name') }}</th>
        <th>{{ trans('appliances.status') }}</th>
        <th>{{ trans('appliances.electric_value') }}</th>
    </tr>
    </thead>
    <tbody>
        @foreach($apps as $app)
            <tr id="{{ $app['id'] }}">
                <td class="chk">
                    <input type="checkbox" class="case" value="{{ $app['id'] }}"/>
                </td>
                <td>{{ $app->id }}</td>
                <td>{{ $app->name }}</td>
                <td>{!! fill_status($app->status) !!}</td>
                <td>{{ $app->electric_value }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination pull-right">
    {{ $apps->links() }}
</div> 