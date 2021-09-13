<table class="table table-striped" >
    <thead>
    <tr>
        @foreach($columns as $column)
            <th>{{$column}}</th>
        @endforeach
        <th>operations</th>
    </tr>

    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            @foreach($product->getAttributes() as $key => $value)
                <td >
                    @if($value==null)
                        empty
                    @else
                        @if($key=="description")
                            {{substr($value,0,30)."..."}}
                        @elseif($key=="image")
                            <img src="{{asset("assets")."/".$value}}" alt="{{$value}}" width="50"/>
                        @else
                            {{$value}}
                        @endif
                    @endif
                </td>
            @endforeach
            <td class="col-md-3">
                <button data-id="{{$product->id}}" type="button" class="btn btn-primary edit"><i class="fa fa-wrench"></i> Edit</button>
                <button data-id="{{$product->id}}" type="button" class="btn btn-danger delete"><i class="fa fa-trash-o"></i> Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div>
    {{$products->links()}}
</div>





