<form id="userEditForm" action="{{route("editUser")}}" method="POST">
    @csrf
    <label>Password:</label>
    <input type="hidden" name="id" value="{{$user->id}}">

    <input name="password" class="form-control"  type="text">

    <label>Role:</label>
    <select name="role" class="form-control">
        @foreach($roles as $role)
            <option  @if($user->role_id==$role->id)selected="selected" @endif value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
    </select>
    <br>
    <button id="save" type="button" class="btn btn-success">Save</button> <button id="cancel" type="button" class="btn btn-danger">Cancel</button>
</form>
