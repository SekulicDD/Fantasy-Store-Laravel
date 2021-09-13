<form id="editForm" action="{{route("editCategory")}}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="hidden" name="id" value="{{$category->id}}">

    <input name="name" class="form-control" placeholder="name" type="text" value="{{$category->name}}">

    <label>MainCategory:</label>
    <select name="category" class="form-control">
        @foreach($mainCategories as $cat)
            <option @if($category->main_category_id==$cat->id)selected="selected" @endif value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
    </select>
    <br>
    <button id="save" type="button" class="btn btn-success">Save</button> <button id="cancel" type="button" class="btn btn-danger">Cancel</button>
</form>
