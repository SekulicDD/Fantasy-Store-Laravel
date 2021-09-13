<!--  Modal -->


<div class="modal-body p-0">
    <div class="row align-items-stretch">
        <div class="col-lg-6 p-lg-0">
            <a class="product-view d-block h-100 bg-cover bg-center" style="background: url({{asset($modal->image->path)}})" href="{{route("details",$modal->id)}}"></a>
        </div>
        <div class="col-lg-6">
            <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="p-5 my-md-4">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                </ul>
                <h2 class="h4">{{$modal->name}}</h2>
                <p class="text-muted">{{$modal->price}}</p>
                <p class="text-small mb-4">{{$modal->description}}</p>
                <div class="row align-items-stretch mb-4">
                    <div class="col-sm-7 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                            <div class="quantity">
                                <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                                <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                                <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0 addToCart" data-id="{{$modal->id}}" href="#">Add to cart</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


