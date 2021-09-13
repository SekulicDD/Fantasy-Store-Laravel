@extends('user.layouts.layout')

@section('title') Cart @endsection
@section('description') The main page of the shop. @endsection
@section('keywords') shop, online, home, best, sellers @endsection

@section('content')
    <div class="page-holder">
        <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Checkout</h1>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                                <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route("cart")}}">Cart</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-5">
            <!-- BILLING ADDRESS-->
            <h2 class="h5 text-uppercase mb-4">Billing details</h2>
            <div class="row">
                <div class="col-lg-8">
                    <form action="{{route("order")}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Name:</label>
                                <p>{{$user->name}}</p>
                            </div>
                            <div class="col-lg-6">
                                <label>Email:</label>
                                <p>{{$user->email}}</p>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="phone">Phone number</label>
                                <input class="form-control form-control-lg" name="phone" id="phone" type="tel" placeholder="e.g. +02 245354745">
                            </div>

                            <div class="col-lg-12 form-group">
                                <label class="text-small text-uppercase" for="address">Address</label>
                                <input class="form-control form-control-lg" name="address" id="address" type="text" placeholder="House number and street name">
                            </div>
                            <div class="col-lg-12 form-group">
                                <button class="btn btn-dark" type="submit">Place order</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ORDER SUMMARY-->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-0 p-lg-4 bg-light">
                        <div class="card-body">
                            <h5 class="text-uppercase mb-4">Your order</h5>
                            <ul class="list-unstyled mb-0">
                                @foreach($products as $product)
                                    <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">{{$product->name}}</strong><span class="text-muted small">${{$product->price}} * {{$product->quantity}}</span></li>
                                    <li class="border-bottom my-2"></li>
                                @endforeach

                                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Total</strong><span>${{$sum}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
@endsection
