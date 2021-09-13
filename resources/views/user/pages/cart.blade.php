@extends('user.layouts.layout')

@section('title') Cart @endsection
@section('description') The main page of the shop. @endsection
@section('keywords') shop, online, home, best, sellers @endsection

@section('content')
    <div class="page-holder">

        <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
            <div id="modalContainer" class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">

                </div>

            </div>
        </div>

        <div class="container">
            <!-- HERO SECTION-->
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                        <div class="col-lg-6">
                            <h1 class="h2 text-uppercase mb-0">Cart</h1>
                        </div>
                        <div class="col-lg-6 text-lg-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                                    <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-5">
                <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
                <div class="row">
                    <div class="col-lg-8 mb-4 mb-lg-0">
                        <!-- CART TABLE-->
                        <div class="table-responsive mb-4">
                            @if($products!=null)
                            <table class="table">
                                <thead class="bg-light">
                                <tr>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Product</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Price</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Quantity</strong></th>
                                    <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                                    <th class="border-0" scope="col"> </th>
                                </tr>
                                </thead>
                                <tbody>


                                    @foreach($products as $product)
                                        @include("user.partials.cartProduct",$product)
                                    @endforeach


                                </tbody>
                            </table>
                            @endif
                        </div>
                        @if($products==null)
                            <p>Your cart is empty!</p>
                            <h3>{{session("msg")}}</h3>
                        @endif
                        <!-- CART NAV-->
                        <div class="bg-light px-4 py-3">
                            <div class="row align-items-center text-center">
                                <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="{{route("products")}}"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
                                @if($products!=null)
                                <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="{{route("checkout")}}">Procceed to checkout<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- ORDER TOTAL-->
                    <div class="col-lg-4">
                        <div class="card border-0 rounded-0 p-lg-4 bg-light">
                            <div class="card-body">
                                <h5 class="text-uppercase mb-4">Cart total</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="border-bottom my-2"></li>
                                    <li class="d-flex align-items-center justify-content-between mb-4"><strong class="text-uppercase small font-weight-bold">Total</strong><span id="totalSum">{{$sum}}$</span></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
