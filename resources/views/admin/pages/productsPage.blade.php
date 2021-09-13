@extends('admin.layouts.layout')

@section('title') Admin Panel - Home @endsection

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">Products</h3>
                <button data-toggle="modal" data-target="#insertModal" id="addNew" type="button" class="btn btn-success"><i class="fa fa-plus-square"></i>  Add new</button>
                <div class="panel">
                    <div class="panel-body" id="products">


                    </div>
                </div>

                <div id="modalEdit" style="display: none">

                </div>
                <br>
                <div style="display: none" class="alert-danger text-danger col-6" id="errors"></div>

                <div  class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="alert-danger text-danger" id="insertErrors"></div>
                    <div class="modal-dialog" role="document" id="insertFormDiv">

                    </div>

                </div>



            </div>



        </div>



    </div>







@endsection

@section("scripts")

    <script src="{{asset("assets/vendor/toastr/toastr.min.js")}}"></script>

@endsection
