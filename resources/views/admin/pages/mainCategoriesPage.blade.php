@extends('admin.layouts.layout')

@section('title') Admin Panel - MainCategories @endsection

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">MainCategories</h3>
                <button data-toggle="modal" data-target="#insertModal" id="addNew" type="button" class="btn btn-success"><i class="fa fa-plus-square"></i>  Add new</button>
                <div class="panel">

                    <div class="panel-body" id="categories">


                    </div>
                </div>

                <div id="modalEdit" style="display: none">

                </div>
                <div class="alert-danger text-danger col-6" id="errors"></div>

                <div  class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" id="insertFormDiv">
                        <div class="alert-danger text-danger" id="insertErrors"></div>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="insertForm" action="{{route("adminInsertMainCategory")}}" method="POST">
                                    @csrf
                                    <br><br><br>
                                    <label>Name:</label>
                                    <input name="name" class="form-control" placeholder="name" type="text">
                                    <br>
                                    <button id="insertProductBtn" type="button" class="btn btn-success">Save</button> <button data-dismiss="modal" type="button" class="btn btn-danger">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section("scripts")

    <script src="{{asset("assets/vendor/toastr/toastr.min.js")}}"></script>

@endsection
