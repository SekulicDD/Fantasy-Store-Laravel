@extends('admin.layouts.layout')

@section('title') Admin Panel - Home @endsection

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- OVERVIEW -->
                <div class="panel panel-headline">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-comment"></i></span>
                                    <p>
                                        <span class="number">{{$commentCount}}</span>
                                        <span class="title">Comments</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                    <p>
                                        <span class="number">{{$orderCount}}</span>
                                        <span class="title">Orders</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="metric">
                                    <span class="icon"><i class="fa fa-user"></i></span>
                                    <p>
                                        <span class="number">{{$userCount}}</span>
                                        <span class="title">Registred users</span>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- END OVERVIEW -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- RECENT PURCHASES -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Recent Purchases</h3>
                                <div class="right">
                                    <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                    <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                </div>
                            </div>
                            <div class="panel-body no-padding">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Order No.</th>
                                        <th>Address</th>
                                        <th>Amount</th>
                                        <th>Date &amp; Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td><a href="#">{{$order->id}}</a></td>
                                            <td>{{$order->address}}</td>
                                            <td>${{$order->total}}</td>
                                            <td>{{$order->created_at}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-md-6 text-left"><a href="{{route("home")}}" class="btn btn-primary">View All Purchases</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- END RECENT PURCHASES -->
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
