@push('js')
    <script>
        var sl = 0;
        var app = angular.module('app', ['kendo.directives']);
        app.controller('defaultController', function ($scope) {
            $scope.user_id = "{{auth()->user()->id}}";
            $scope.status_list = [
                {name: 'Un-Ban/Active', id: 0},
                {name: 'Banned', id: 1}
            ];
            $scope.user_role_list = [
                {name: 'Librarian', id: 1},
                {name: 'User', id: 2},
            ];
            $scope.current_row = 0;

            $scope.record = 0;
            $scope.name = '';

            $scope.getData = function () {
                $scope.defaultGridOptions = {
                    dataSource: {
                        transport: {
                            read: {
                                url: "{{url('get-user')}}",
                                dataType: "json",
                                type: "GET"
                            }
                        },
                        serverPaging: false,
                        serverFiltering: false,
                        pageSize: 10,
                        schema: {
                            data: "users",
                            total: "total",
                            model: {
                                id: "id",
                                fields: {
                                    name: {type: 'string'},
                                    password: {type: 'string'},
                                    email: {type: 'string'},
                                    phone: {type: 'string'},
                                    is_banned: {type: 'string'},
                                    role: {type: 'string'},
                                    sl: {},
                                }
                            }
                        }
                    },
                    serverSorting: false,
                    serverFiltering: false,
                    sortable: true,
                    selectable: true,
                    pageable: {
                        refresh: true,
                        pageSizes: ["All", 10, 25, 50, 100],
                        buttonCount: 3,
                    },
                    filterable: {mode: "row"},
                    toolbar: [
                        {
                            name: "create",
                            text: "Add User"
                        }
                    ],
                    dataBound: function (e) {
                        e.sender.select("tr:eq(" + $scope.current_row + ")");
                        $("#lbl_toolbar_title").remove();
                        $(".k-grid-toolbar").prepend(
                            '<label class="pull-left" id="lbl_toolbar_title">Users Information</label>');

                    },
                    columns: [
                        {
                            title: "SL No.",
                            width: "5%",
                            field: "sl",
                            filterable: false
                        },
                        {
                            field: "name",
                            title: "Name",
                            width: "10%",
                            filterable: {
                                cell: {operator: "contains", showOperators: false}
                            }
                        },
                        {
                            field: "email",
                            title: "Email",
                            width: "20%",
                            filterable: {
                                cell: {operator: "contains", showOperators: false}
                            }
                        },
                        {
                            field: "phone",
                            title: "Phone",
                            width: "20%",
                            filterable: {
                                cell: {operator: "contains", showOperators: false}
                            }
                        },

                        {
                            field: "string_status",
                            title: "Ban/Un-ban",
                            width: "15%",
                            filterable: {
                                cell: {operator: "contains", showOperators: false}
                            }
                        }, {
                            field: "string_role",
                            title: "User Role",
                            width: "15%",
                            filterable: {
                                cell: {operator: "contains", showOperators: false}
                            }
                        },
                        {
                            command: [
                                {
                                    name: "edit",
                                    text: {
                                        edit: "",
                                        update: "Update",
                                        cancel: "Cancel"
                                    }
                                },
                                {
                                    name: "Delete",
                                    template:
                                        '<a role="button"  class="k-button k-button-icontext" ng-click="delete_item(dataItem)" ><span class="k-icon k-i-trash"></span></a>'
                                }
                            ],
                            title: "Action",
                            width: "10%",
                        }
                    ],
                    editable: {
                        mode: "popup",
                        update: true,
                        template: kendo.template($("#user_template").html()),
                        window: {title: "Update User Info", width: "40%", draggable: false, resizeable: false}
                    },
                    edit: function (e) {
                        $scope.is_new = (e.model.isNew()) ? 1 : 0;
                        if ($scope.is_new == 1) {
                            $(".k-grid-update").html('<span class="k-icon k-i-check"></span> Save');
                            $(".k-window-title").text('Add New User');

                        }
                        else {
                            $(".k-grid-update").html('<span class="k-icon k-i-check"></span> update');
                            $(".k-window-title").text('Update User');
                        }
                    },
                    save: function (e) {
                        e.preventDefault();
                        console.log(e.model.id);
                        $scope.save_url = "{{url('save-user')}}";
                        $scope.pass_data = {
                            id: e.model.id,
                            name: e.model.name,
                            email: e.model.email,
                            phone: e.model.phone,
                            password: e.model.password,
                            is_banned: e.model.is_banned,
                            role: e.model.role
                        };
                        $scope.saveCurrentData($scope.pass_data);
                        console.log($scope.pass_data);
                    },
                    change: function (e) {
                        $.map(this.select(), function (item) {
                            $scope.current_row = $(item).index();
                        });
                    }
                };
            };
            $scope.getData();

            /*grid data delete confrim */
            $scope.delete_item = function (dataItem) {
                $scope.delete_id = dataItem.id;
                swal({
                    title: "Are you sure?",
                    text: "Your data will be deleted from the database server!",
                    icon: "warning",
                    buttons: [
                        'No, cancel it!',
                        'Yes, I am sure!'
                    ],
                    dangerMode: true,
                }).then(function (isConfirm) {
                    if (isConfirm) {
                        $scope.confirmDelete();
                    }
                });
            }
            $scope.modalclose = function () {
                $scope.modal.close();
            }
            /* grid data delete conformation */
            $scope.confirmDelete = function () {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "delete-user/" + $scope.delete_id,
                    type: "delete",
                    success: function (response) {
                        console.log(response);
                        if (response.status) {
                            $('.k-pager-refresh').trigger('click');
                            // need toastr message
                            toastr.success(response.status);
                        }
                        else {
                            //error toastr message
                            toastr.error('Failed to perform delete operation');
                        }
                        $scope.modal.close();
                        $scope.delete_id = 0;
                    },
                    error: function (xhr, status) {
                        //erroor toastr message
                        toastr.error('problem with delete this item');
                    }
                });
            }
            /* save data into db save and update */
            $scope.saveCurrentData = function (data) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: $scope.save_url,
                    type: "post",
                    dataType: "json",

                    data: data,
                    success: function (response) {
                        $('.k-pager-refresh').trigger('click');
                        console.log(response);
                        if (response.errors) {
                            for (var error in response.errors) {
                                toastr.error(response.errors[error]);
                                $('.k-pager-refresh').trigger('click');
                            }
                        }
                        else {
                            $('.k-window-action').click();
                            if (response.status) {
                                $('.k-pager-refresh').trigger('click');
                                toastr.success(response.status);
                            }
                            else {
                                toastr.error('something wrong');
                            }
                        }
                    },
                    error: function (request, status, error) {
                        $('.k-pager-refresh').trigger('click');
                        console.log(request);
                        toastr.error(response.status);
                    }
                });
            }

            $scope.cancle_confirm = function () {
                $scope.confirmation_modal.close();
            }

        });

        function show_success_msg(msg) {
            toastr.options.positionClass = "toast-bottom-right";
            toastr.options.progressBar = true;
            toastr.options.timeOut = 3000;
            toastr.success(msg);
        }

        function show_err_msg(msg) {
            toastr.options.positionClass = "toast-bottom-right";
            toastr.options.timeOut = 3000;
            toastr.error(msg);
        }
    </script>
@endpush