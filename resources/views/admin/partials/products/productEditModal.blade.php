<form id="editForm" action="{{route("editProduct")}}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="hidden" name="id" value="{{$product->id}}">

    <input name="name" class="form-control" placeholder="name" type="text" value="{{$product->name}}">

    <label>Price:</label>
    <div class="input-group">
        <span class="input-group-addon">$</span>
        <input name="price" class="form-control" type="number" value="{{$product->price}}">
    </div>

    <label>Description:</label>
    <textarea name="description" class="form-control" placeholder="textarea" rows="4" >{{$product->description}}</textarea>


    <label>Image: </label>
    <input type="hidden" name="image_id" value="{{$product->image->id}}">
    <div class="form-group">
        <input class="form-control" id="file" type="file" name="file">
        <span>(image will stay same if you leave this empty)</span>
    </div>


    <label>Category:</label>
    <select name="category" class="form-control">
        @foreach($categories as $cat)
            <option  @if($product->category_id==$cat->id)selected="selected" @endif value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
    <br>
    <button id="save" type="button" class="btn btn-success">Save</button> <button id="cancel" type="button" class="btn btn-danger">Cancel</button>
</form>
