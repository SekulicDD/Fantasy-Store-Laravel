@extends('user.layouts.layout')

@section('title') Shop @endsection
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
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="h2 text-uppercase mb-0">Shop</h1>
                    </div>
                    <div class="col-lg-6 text-lg-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                                @foreach($menu as $link)
                                    <li class="breadcrumb-item @if(request()->routeIs($link->route)) active @endif">
                                        <a href="{{ route($link->route) }}">{{ $link->name }}</a>
                                    </li>
                                @endforeach

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5">
            <div class="container p-0">
                <div class="row">
                    <!-- SHOP SIDEBAR-->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <h5 class="text-uppercase mb-4">Categories</h5>
                        @foreach($mainCategories as $mainCategory)
                            <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">{{$mainCategory->name}}</strong></div>
                            <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                            @foreach($categories as $category)
                                @if($category->main_category_id==$mainCategory->id)
                                    <li class="mb-2">
                                        <a class="reset-anchor catLink" data-id="{{$category->id}}" href="#">{{$category->name}}</a>
                                    </li>
                                @endif
                            @endforeach
                            </ul>
                        @endforeach


                        <h6 class="text-uppercase mb-4">Price range</h6>
                        <div class="price-range pt-4 mb-5">
                            <div id="range"></div>
                            <div class="row pt-2">
                                <div class="col-6"><strong class="small font-weight-bold text-uppercase">From</strong></div>
                                <div class="col-6 text-right"><strong class="small font-weight-bold text-uppercase">To</strong></div>
                            </div>
                        </div>

                    </div>
                    <!-- SHOP LISTING-->
                    <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
                        <div class="row mb-3 align-items-center">
                            <div class="col-lg-6 mb-2 mb-lg-0">
                              Search: <input type="text" name="search" id="search">
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                                    <li class="list-inline-item">
                                        <form action="{{route("products")}}" method="GET">
                                            <select id="sortSelect" class="selectpicker ml-auto" name="order" data-width="200" data-style="bs-select-form-control" data-title="Name: A to Z">
                                                <option value="1">Name: A to Z</option>
                                                <option value="2">Name: Z to A</option>
                                                <option value="3">Price: Low to High</option>
                                                <option value="4">Price: High to Low</option>
                                            </select>

                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row" id="products">


                        </div>
                        <!-- PAGINATION-->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center justify-content-lg-end">

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

    </div>


@endsection

