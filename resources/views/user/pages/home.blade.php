@extends('user.layouts.layout')

@section('title') Home @endsection
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

        <!-- HERO SECTION-->
        <div class="container">
            <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url(assets/img/hero-banner-alt.jpg)">
                <div class="container py-5">
                    <div class="row px-4 px-lg-5">
                        <div class="col-lg-6">
                            <p class="text-muted small text-uppercase mb-2">New Inspiration 2020</p>
                            <h1 class="h2 text-uppercase mb-3">20% off on new season</h1><a class="btn btn-dark" href="{{route("products")}}">Browse collections</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- CATEGORIES SECTION-->
            <section class="pt-5">
                <header class="text-center">
                    <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
                    <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
                </header>
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href="{{route("products")}}">
                            <img class="img-fluid" src="{{asset("assets/img/cat-img-1.jpg")}}" alt=""><strong class="category-item-title">Clothes</strong></a>
                    </div>
                    <div class="col-md-4 mb-4 mb-md-0"><a class="category-item mb-4" href="{{route("products")}}">
                            <img class="img-fluid" src="{{asset("assets/img/cat-img-2.jpg")}}" alt=""><strong class="category-item-title">Shoes</strong></a><a class="category-item" href="{{route("products")}}">
                            <img class="img-fluid" src="{{asset("assets/img/cat-img-3.jpg")}}" alt=""><strong class="category-item-title">Watches</strong></a>
                    </div>
                    <div class="col-md-4"><a class="category-item" href="{{route("products")}}">
                            <img class="img-fluid" src="{{asset("assets/img/cat-img-4.jpg")}}" alt=""><strong class="category-item-title">Electronics</strong></a>
                    </div>
                </div>
            </section>
            <!-- TRENDING PRODUCTS-->
            <section class="py-5">
                <header>
                    <p class="small text-muted small text-uppercase mb-1">Made the hard way</p>
                    <h2 class="h5 text-uppercase mb-4">Top trending products</h2>
                </header>
                <div class="row">
                    <!-- PRODUCT-->
                @foreach($products as $product)
                    @include('user.partials.product')
                @endforeach

                </div>
            </section>
            <!-- SERVICES-->
            <section class="py-5 bg-light">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <div class="d-inline-block">
                                <div class="media align-items-end">
                                    <svg class="svg-icon svg-icon-big svg-icon-light">
                                        <use xlink:href="#delivery-time-1"> </use>
                                    </svg>
                                    <div class="media-body text-left ml-3">
                                        <h6 class="text-uppercase mb-1">Free shipping</h6>
                                        <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3 mb-lg-0">
                            <div class="d-inline-block">
                                <div class="media align-items-end">
                                    <svg class="svg-icon svg-icon-big svg-icon-light">
                                        <use xlink:href="#helpline-24h-1"> </use>
                                    </svg>
                                    <div class="media-body text-left ml-3">
                                        <h6 class="text-uppercase mb-1">24 x 7 service</h6>
                                        <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-inline-block">
                                <div class="media align-items-end">
                                    <svg class="svg-icon svg-icon-big svg-icon-light">
                                        <use xlink:href="#label-tag-1"> </use>
                                    </svg>
                                    <div class="media-body text-left ml-3">
                                        <h6 class="text-uppercase mb-1">Festival offer</h6>
                                        <p class="text-small mb-0 text-muted">Free shipping worlwide</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>


    </div>
@endsection
