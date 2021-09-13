@extends('admin.layouts.layout')

@section('title') Admin Panel - Users @endsection

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Users</h3>
                <div class="panel">

                    <div class="panel-body" id="users">


                    </div>
                </div>

                <div id="modalEdit" style="display: none">

                </div>

                <div class="alert-danger text-danger col-6" id="errors"></div>
            </div>
        </div>
    </div>


@endsection

@section("scripts")

    <script src="{{asset("assets/vendor/toastr/toastr.min.js")}}"></script>

@endsection
