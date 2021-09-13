<tr>
    <th class="pl-0 border-0" scope="row">
        <div class="media align-items-center"><a class="reset-anchor d-block animsition-link" href="{{route("details",$product->id)}}"><img src="{{asset($product->image->path)}}" alt="" width="70"/></a>
            <div class="media-body ml-3"><strong class="h6"><a class="reset-anchor animsition-link" href="{{route("details",$product->id)}}">{{$product->name}}</a></strong></div>
        </div>
    </th>
    <td class="align-middle border-0">
        <p class="mb-0 small">{{$product->price}}$</p>
    </td>
    <td class="align-middle border-0">
        <p class="mb-0 small">{{$product->quantity}}</p>
    </td>
    <td class="align-middle border-0">
        <p class="mb-0 small totalPrice">{{$product->price*$product->quantity}}$</p>
    </td>
    <td class="align-middle border-0 deleteFromCart" data-id="{{$product->id}}"><a class="reset-anchor" href="#"><i class="fas fa-trash-alt small text-muted"></i></a></td>
</tr>
