
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add new product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="insertFormData" action="{{route("adminInsertProduct")}}" method="POST">
                @csrf
                <br><br><br>
                <label>Name:</label>

                <input name="name" class="form-control" placeholder="name" type="text" value="">

                <label>Price:</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input name="price" class="form-control" type="number" value="">
                </div>

                <label>Description:</label>
                <textarea name="description" class="form-control" placeholder="textarea" rows="4" ></textarea>

                <label>Image:</label>
                <div class="form-group">
                    <input class="form-control" id="file" type="file" name="file">
                </div>

                <label>Category:</label>
                <select name="category" class="form-control">
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                <br>
                <button id="insertProductBtn" type="button" class="btn btn-success">Save</button> <button data-dismiss="modal" type="button" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>



