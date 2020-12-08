@extends('layouts.master')
@section('title','User | LMS')
@section('mainContent')
    @extends('pages.user.userCss')

    <div ng-app='app' ng-controller='defaultController' ng-cloak>

        <div kendo-grid k-options='defaultGridOptions' k-rebind='defaultGridOptions'></div>

        <script type="text/x-kendo-template" id="user_template">
            <form name="editForm" style="padding: 0px 1em 0px 1em;" id="edit_form">
                @method('POST')
                @csrf
                <div kendo-tab-strip k-content-urls="[null, null]">
                    <ul>
                        <li class="k-state-active">Users information's</li>
                    </ul>
                    <div style="padding: 1em; padding-bottom: 12px!important;max-height: calc(100vh - 293px);overflow: auto;"
                         id="first_tab">
                        <div class="row" style="width: 100%!important; margin: 0px !important;">
                            <div class="col-sm-11">
                                <div class="form-group">
                                    <label class="control-label">Name </label>
                                    <input type="text" class="k-textbox" ng-model="dataItem.name" name="name"
                                           style="width: 100%!important;" required
                                           validationMessage="Name is required"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"> Email</label>
                                    <input type="text" class="k-textbox" ng-model="dataItem.email" name="email"
                                           style="width: 100%!important;" required
                                           validationMessage="User Mail is required"/>
                                </div>

                                <div class="form-group">
                                    <label class="control-label"> Phone</label>
                                    <input type="text" class="k-textbox" ng-model="dataItem.phone" name="phone"
                                           style="width: 100%!important;" required
                                           validationMessage="User Phone is required"/>
                                </div>

                                <div class="form-group" ng-if="(is_new == 1)">
                                    <label class="control-label">Password </label>
                                    <input type="password" class="k-textbox" ng-model="dataItem.password"
                                           name="password" style="width: 100%!important;" required
                                           validationMessage="Password is required"/>
                                </div>

                                <div class="form-group" style="width:100%!important;">
                                    <label class="control-label">Ban/Un-ban</label> <br>
                                    <select kendo-drop-down-list
                                            k-ng-model="dataItem.is_banned"
                                            k-data-text-field="'name'"
                                            k-data-value-field="'id'"
                                            k-data-source="status_list"
                                            k-value-primitive="true"
                                            k-option-label="'Select one'"
                                            k-auto-bind="false"
                                            k-filter="'contains'"
                                            style="width: 100%" required validationMessage="Status is required">
                                    </select>
                                </div>

                                <div class="form-group" style="width:100%!important;">
                                    <label class="control-label">User Role</label>
                                    <select kendo-drop-down-list
                                            k-ng-model="dataItem.role"
                                            k-data-text-field="'name'"
                                            k-data-value-field="'id'"
                                            k-data-source="user_role_list"
                                            k-value-primitive="true"
                                            k-option-label="'Select one user role'"
                                            k-auto-bind="false"
                                            k-filter="'contains'"
                                            style="width: 100%" required validationMessage="Role is required">
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </script>
    </div>

    @extends('pages.user.userJs')
@endsection

