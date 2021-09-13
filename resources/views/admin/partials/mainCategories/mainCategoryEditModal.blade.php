<form id="editForm" action="{{route("editMainCategory")}}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="hidden" name="id" value="{{$mainCategory->id}}">

    <input name="name" class="form-control" placeholder="name" type="text" value="{{$mainCategory->name}}">


    <br>
    <button id="save" type="button" class="btn btn-success">Save</button> <button id="cancel" type="button" class="btn btn-danger">Cancel</button>
</form>
