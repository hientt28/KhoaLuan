<div class="responstable-toolbar">
    <button class="ui circular blue icon button add-course" onclick="courseBuilder.utils().redirect(&quot;{{route('rooms.create')}}&quot;)">
        <i class="add icon"></i>
    </button>

    <button class="ui circular red icon button del-course-multi">
        <i class="trash icon"></i>
    </button>

    <button class="ui circular yellow icon button btn-excel">
        <i class="file excel outline icon"></i>
    </button>

    <button class="ui circular orange icon button btn-csv">
        <i class="file text outline icon"></i>
    </button>

    <div class="f-right">
        <div class="ui fluid category search">
            <div class="ui icon input">
                <form role="form" name="search" method="GET" action="{{ url('/search') }}">
                    {{ csrf_field() }}
                    <input name="term" type="hidden">
                </form>
                <input class="prompt" type="text" placeholder="Search rooms...">
                <i class="search icon"></i>
            </div>
            <div class="results"></div>
        </div>
    </div>
</div>
<table class="responstable">
    <tbody>
    <tr>
        <th><input type="checkbox" name="select-all"/></th>
        <th>{{ trans('common.id') }}</th>
        <th>{{ trans('common.name') }}</th>
        <th>{{ trans('common.action') }}</th>
    </tr>
    @if(empty($rows))
        @foreach ($rows as $row)
            {{ Form::open(['method' => 'DELETE', 'route' => ['rooms.destroy', $row->id], 'name' => 'delRoute'.$row->id, 'id' => 'delRoute']) }}
            <tr class="row-{{$row->id}}">
                <td>
                    <input type="checkbox" name="radio-{{ $row->id }}" value="{{ $row->id }}" onclick="courseBuilder.saveStorage('{{$row->id}}')">
                </td>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>
                    <div class="field">
                        <button class="ui circular facebook icon button" onclick="courseBuilder.utils().redirect(&quot;{{route('rooms.edit', ['row' => $row->id])}}&quot;)">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="ui circular twitter icon button" onclick="couserBuilder.utils().redirect(&quot;{{route('rooms.show', ['row' => $row->id])}}&quot;)">
                            <i class="info icon"></i>
                        </button>
                        <button class="ui circular red icon button del-course" type="submit" onclick="courseBuilder.saveSelect('{{$row->id}}')">
                            <i class="trash icon"></i>
                        </button>
                    </div>
                </td>
            </tr>
            {{ Form::close() }}
        @endforeach
    @else
        <tr>
            <td>{{ trans('label.data_empty') }}</td>
        </tr>
    @endif
    </tbody>
</table>
{{ Form::open(['method' => 'GET', 'route' => 'rooms.index', 'name' => 'show-entry']) }}
    <input type="hidden" name="entry"/>
{{ Form::close() }}
<!-- {!! show_entry($rows) !!} -->
@include('errors.confirm')
