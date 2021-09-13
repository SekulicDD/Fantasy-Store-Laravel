<form id="editForm" action="{{route("editOrder")}}" method="POST">
    @csrf
    <label>Phone:</label>
    <input type="hidden" name="id" value="{{$order->id}}">

    <input name="phone" class="form-control" placeholder="Phone" type="text" value="{{$order->phone}}">
    <label>Address:</label>
    <input name="address" class="form-control" placeholder="Adress" type="text" value="{{$order->address}}">
    <label>Total:</label>
    <input name="total" class="form-control" placeholder="Total" type="number" value="{{$order->total}}">

    <br>
    <button id="save" type="button" class="btn btn-success">Save</button> <button id="cancel" type="button" class="btn btn-danger">Cancel</button>
</form>
