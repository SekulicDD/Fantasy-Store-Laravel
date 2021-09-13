@extends('admin.layouts.layout')

@section('title') Admin Panel - Messages @endsection

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Messages</h3>

                <div class="panel">
                    <div class="panel-body" id="products">


                    </div>
                </div>


                <br>

            </div>

        </div>

    </div>


@endsection

@section("scripts")
    <script src="{{asset("assets/vendor/toastr/toastr.min.js")}}"></script>
@endsection
