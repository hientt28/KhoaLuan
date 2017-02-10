 
var roomBuilder = (function () {
    var room = new appBuilder();

    return {
        tooltip: function () {
            var configs = [
                {
                    element: $('.add-course'),
                    position: 'top center',
                    content: 'Add New Room'
                },
                {
                    element: $('.del-course-multi'),
                    position: 'top center',
                    content: 'Delete Room Selected'
                },
                {
                    element: $('.btn-excel'),
                    position: 'top center',
                    content: 'Export Excel'
                },
                {
                    element: $('.btn-csv'),
                    position: 'top center',
                    content: 'Export CSV'
                },
            ];
            room.tooltip(configs);
        },
        animate: function () {
            room.animate([{
                animate: $('.body-content'),
                animateName: 'shake'
            }]);
        },
        bindEvent: function () {
            $('form[id="delRoute"]').submit(function (e) {
                e.preventDefault();
            });
            var input_all = $('input[name="select-all"]');
            input_all.change(function () {
                var check = input_all.prop('checked');
                var all_input = $('input[type="checkbox"]');
                if (check) {
                    all_input.prop('checked', true);
                } else {
                    all_input.prop('checked', false);
                }
            });

            $('.btn-confirm').click(function () {
                var selected = localStorage.getItem('selected');
                var courses = localStorage.getItem('courseList');
                courses = JSON.parse(courses);
                var input = $('input[name="select-all"]');
                var checkboxs = $('input[type="checkbox"]');
                if (input.prop('checked') && checkboxs.length > 1) {
                    var courses = [];
                    for (var i = 0; i < checkboxs.length; i++) {
                        var element = $(checkboxs[i]);
                        if (element.attr('name') !== 'select-all') {
                            courses.push(element.val());
                        }
                    }
                }
                if (!room.utils.isset(selected) && courses !== undefined) {
                    $.ajax({
                        url: 'destroySelected',
                        data: {
                            ids: courses
                        },
                        type: 'POST',
                        beforeSend: function () {
                            $('#confirmModal').modal('hide');
                            room.utils.loading('show');
                        }
                    }).done(function (res) {
                        setTimeout(function () {
                            for (var c in courses) {
                                $('tr.row-' + parseInt(courses[c])).addClass('hide');
                            }
                            localStorage.clear();
                            room.utils.loading('hide');
                            $('.result-msg').show(1000);
                            $('.result-msg-content').text('Delete Courses Success!');
                            setTimeout(function () {
                                $('.result-msg').hide(1000);
                            }, 2000);
                        }, 400)
                    });
                } else {
                    var formName = 'delRoute' + selected;
                    var _form = $('form[name="' + formName + '"]');
                    _form.unbind('submit');
                    _form.submit();
                }
            });

            $('.del-course').click(function () {
                $('#confirmModal').modal('show');
            });

            $('.prompt').change(function () {
                room.utils.loading('show');
                $('input[name="term"]').val($('.prompt').val());
                setTimeout(function () {
                    $('form[name="search"]').submit();
                }, 500);
            });

            $('#confirmModal').on('hidden.bs.modal', function () {
                $('.modal-body').text('Are you sure?');
                localStorage.removeItem('selected');
                $('.btn-confirm').prop('disabled', false);
            });

            $('.del-course-multi').click(function () {
                var courses = localStorage.getItem('courseList');
                var checkall = $('input[name="select-all"]').prop('checked');
                if ((_.isUndefined(courses) || _.isNull(courses)) && !checkall) {
                    $('.modal-body').text('Please select room before delete!');
                    $('.btn-confirm').prop('disabled', true);
                    $('#confirmModal').modal('show');
                    return;
                } else {
                    $('#confirmModal').modal('show');
                }
            });

            $('.dropdown-entry').change(function () {
                room.utils.loading('show');
                $('input[name="entry"]').val($('.dropdown-entry').val());
                $('form[name="show-entry"]').submit();
            });

            $('input[name="elementAll"]').click(function () {
                var check = $('input[name="elementAll"]').prop('checked');
                var input = $('input[type="checkbox"]');
                var data = [];
                for (var i = 0; i < input.length; i++) {
                    if (input[i].hasAttribute('element')) {
                        data.push($(input[i]).val());
                    }
                }
                if (check) {
                    $(input).prop('checked', true);
                    $('input[name="subjectData"]').val(data);
                } else {
                    $(input).prop('checked', false);
                    $('input[name="subjectData"]').val('');
                }
            })

            $('form[name="CI"]').submit(function (e) {
                e.preventDefault();
            })

            $('.btn-ci').click(function () {
                $('form[name="CI"]').unbind('submit');
                room.utils.validate({
                    form: $('form[name="CI"]'), rules: [
                        {
                            id: 'name',
                            text: 'Please enter course name'
                        },
                        {
                            id: 'description',
                            text: 'Please enter course description'
                        }
                    ]
                });
                var input = $('input[type="checkbox"]');
                var data = [];
                for (var i = 0; i < input.length; i++) {
                    var isCheck = $(input[i]).prop('checked');
                    if (isCheck && input[i].hasAttribute('element')) {
                        data.push($(input[i]).val());
                    }
                }
                $('input[name="subjectData"]').val(data);
                $('form[name="CI"]').submit();
            });

            (function () {
                var input = $('input[type="checkbox"]');
                for (var i = 0; i < input.length; i++) {
                    if (input[i].hasAttribute('element')) {
                        var _input = $(input[i]);
                        if (_input.attr('belongCourse') == "true") {
                            _input.prop('checked', true);
                        } else continue;
                    }
                }
            }());
        },
        saveSelect: function (id) {
            localStorage.setItem('selected', id);
        },
        saveStorage: function (id) {
            var checked = $('input[name="radio-' + id + '"]').prop('checked');
            var list = localStorage.getItem('courseList');
            list = _.isUndefined(list) || _.isNull(list) ? null : JSON.parse(list);
            if (_.isArray(list) && !_.isEmpty(list)) {
                var find = _.find(list, function (element) {
                    return id === element;
                });
                if (find === undefined) {
                    if (checked) {
                        list.push(id);
                    }
                    localStorage.setItem('courseList', JSON.stringify(list));
                } else {
                    if (!checked) {
                        var index = _.indexOf(list, "" + id);
                        list.splice(index, 1);
                        localStorage.setItem('courseList', JSON.stringify(list));
                    }
                }
            } else {
                if (checked) {
                    localStorage.setItem('courseList', JSON.stringify([id]));
                }
            }
        },
        utils: function () {
            return room.utils;
        },
        build: function () {
            localStorage.clear();
            this.tooltip();
            this.animate();
            this.bindEvent();
        }
    }

}(appBuilder))
 
 $(document).ready(function () {
    $('.filterable .btn-filter').click(function() {

        var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');

        if ($filters.prop('disabled')) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e) {

        var code = e.keyCode || e.which;
        if (code == '9') return;

        var $input = $(this),
            inputContent = $input.val().toLowerCase(),
            $panel = $input.parents('.filterable'),
            column = $panel.find('.filters th').index($input.parents('th')),
            $table = $panel.find('.table'),
            $rows = $table.find('tbody tr');

        var $filteredRows = $rows.filter(function() {
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });

        $table.find('tbody .no-result').remove();

        $rows.show();
        $filteredRows.hide();

        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' +  $table.find('.filters th').length + '">No result found</td></tr>'));
        }
    });

    $("#myTable #checkall").click(function () {
        if ($("#myTable #checkall").is(':checked')) {
            $("#myTable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
        } else {
            $("#myTable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });

    $("[data-toggle=tooltip]").tooltip();
    roomBuilder.build();
});


//# sourceMappingURL=all.js.map
