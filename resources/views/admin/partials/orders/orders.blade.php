
@if($orders->isEmpty())
    <h3>There are no new orders!</h3>
@else
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
    @foreach($orders as $order)
        <tr>
            @foreach($order->getAttributes() as $key => $value)
                <td >
                    @if($value==null)
                        empty
                    @else
                        {{$value}}
                    @endif
                </td>
            @endforeach
            <td class="col-md-3">
                <button data-id="{{$order->id}}" type="button" class="btn btn-primary edit"><i class="fa fa-wrench"></i> Edit</button>
                <button data-id="{{$order->id}}" type="button" class="btn btn-danger delete"><i class="fa fa-trash-o"></i> Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div>
    {{$orders->links()}}
</div>
@endisset




