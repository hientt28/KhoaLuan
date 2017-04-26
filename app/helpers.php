<?php

if (!function_exists('show_entry')) {
    function show_entry($records)
    {
        $entry_default = app('request')->input('entry');
        $entry_default = empty($entry_default) ? 5 : $entry_default;
        return
            '<div class="paginate f-left">' .
                '<span class="paginate-entry">
                    Total ' . Form::select('size', ['5' => 5, '10' => 10, '15' => 15], $entry_default,
                    ["class" => "dropdown-entry"]) . ' in ' . $records->total() . ' records
                </span>
            </div>' .
            '<div class="paginate f-right">'
                . $records->links() .
            '</div >';
    }
}

if (!function_exists('fill_status')) {
    function fill_status($status)
    {
        switch ($status) {
            case 1: {
                return '<label class="btn btn-success label">' . trans("appliances.on") . '</label>';
            }
            case 2: {
                return '<label class="btn btn-danger label">' . trans("appliances.off") . '</label>';
            }
            case 3: {
                return '<label class="btn btn-warning label">' . trans("appliances.standby") . '</label>';
            }
            case 4: {
                return '<label class="label label-default">' . trans("appliances.unplugged") . '</label>';
            }
        }
    }
}

if (!function_exists('fill_state')) {
    function fill_state($state)
    {
        switch ($state) {
            case 1: {
                return '<label class="btn btn-info label">' . trans("appliances.activated") . '</label>';
            }
            case 2: {
                return '<label class="btn btn-danger label">' . trans("appliances.deactivated") . '</label>';
            }
        }
    }
}
if (!function_exists('fill_todo')) {
    function fill_todo($todo)
    {
        switch ($todo) {
            case 1: {
                return '<label class="btn btn-success label">' . trans("appliances.turnon") . '</label>';
            }
            case 2: {
                return '<label class="btn btn-danger label">' . trans("appliances.turnoff") . '</label>';
            }
        }
    }
}
