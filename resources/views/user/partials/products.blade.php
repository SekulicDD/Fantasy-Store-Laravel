
@foreach($products as $product)
    @include('user.partials.product')
@endforeach
<div class="col-xl-12">
    {{$products->links()}}
</div>

