<div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="product text-center">
        <div class="position-relative mb-3">
            <div class="badge text-white badge-"></div><a class="d-block" href="{{route("details",$product->id)}}"><img class="img-fluid w-100" src="{{asset($product->image->path)}}" alt="..."></a>
            <div class="product-overlay">
                <ul class="mb-0 list-inline">
                    <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark addToCart" data-id="{{$product->id}}" href="{{route("cart")}}">Add to cart</a></li>
                    <li class="list-inline-item mr-0"><a data-id="{{$product->id}}" class="btn btn-sm btn-outline-dark modalClick" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                </ul>
            </div>
        </div>
        <h6> <a class="reset-anchor" href="{{route("details",$product->id)}}">{{ $product->name }}</a></h6>
        <p class="small text-muted">${{ $product->price }}</p>
    </div>
</div>

