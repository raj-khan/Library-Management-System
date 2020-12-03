@extends('layouts.master')

@section('content')


    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>


        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
                <ul class="list-group">
                    <li class="list-group-item bg-info text-center text-white">
                        <span>Welcome</span>
                    </li>


                </ul>
            </div>

        </div>
    </div>

@endsection

@push('js')


@endpush