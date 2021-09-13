@extends('user.layouts.layout')

@section('title') Details @endsection
@section('description') The main page of the shop. @endsection
@section('keywords') shop, online, home, best, sellers @endsection

@section('content')
<div class="page-holder bg-light">

    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
        <div id="modalContainer" class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

            </div>

        </div>
    </div>

    <section class="py-5">
        <div class="container">

            @if($product !=null)
            <div class="row mb-5">
                <div class="col-lg-6">
                    <!-- PRODUCT SLIDER-->
                    <div class="row m-sm-0">
                        <div class="col-sm-10 order-1 order-sm-2">
                            <img class="img-fluid" src="{{asset($product->image->path)}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <!-- PRODUCT DETAILS-->
                <div class="col-lg-6">

                    <h1>{{$product->name}}</h1>
                    <p class="text-muted lead">{{$product->price}}$</p>
                    <p class="text-small mb-4">{{$product->description}}</p>
                    <div class="row align-items-stretch mb-4">
                        <div class="col-sm-5 pr-sm-0">
                            <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                                <div class="quantity">
                                    <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                    <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                    <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div data-id="{{$product->id}}" class="addToCart col-sm-3 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="">Add to cart</a></div>
                    </div>
                    <ul class="list-unstyled small d-inline-block">
                        <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category:</strong><a class="reset-anchor ml-2" href="#">{{$category->name}}</a></li>
                    </ul>
                </div>
            </div>
            <!-- DETAILS TABS-->
            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="true">Comments</a></li>
                <li class="nav-item"><a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a></li>
            </ul>
            <div class="tab-content mb-5" id="myTabContent">
                <div class="tab-pane fade show active" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="p-4 p-lg-5 bg-white">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="media mb-3">
                                    <div class="media-body ml-3">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                        <h6 class="mb-0 text-uppercase">Comment:</h6>
                                        <form action="" method="POST">
                                            @csrf
                                            <textarea id="comment" name="comment" class="form-control" placeholder="Enter your comment here" rows="4" ></textarea>

                                            <br><button id="commentButton" class="btn btn-outline-dark btn-sm" type="submit">Submit comment</button>
                                        </form>
                                            <div class="text-danger" id="errors" style="display: none"></div>
                                        @else
                                            <h5><a style="color: #0b5b97" href="{{route("loginPage")}}">Log in now to post comments!</a></h5>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8" id="allComments">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="p-4 p-lg-5 bg-white">
                        <h6 class="text-uppercase">Product description </h6>
                        <p class="text-muted text-small mb-0">{{$product->description}}</p>
                    </div>
                </div>

            </div>

                @else
                    <h3>PRODUCT NOT FOUND</h3>
            @endif
        </div>
    </section>
</div>
@endsection
