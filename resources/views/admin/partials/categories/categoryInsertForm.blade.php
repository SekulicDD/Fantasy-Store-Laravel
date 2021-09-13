
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="insertForm" action="{{route("adminInsertCategory")}}" method="POST">
            @csrf
            <br><br><br>
            <label>Name:</label>

            <input name="name" class="form-control" placeholder="name" type="text" value="">

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



