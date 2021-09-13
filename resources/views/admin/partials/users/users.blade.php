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

    @foreach($users as $user)
        <tr>
            @foreach($user->getAttributes() as $key => $value)
                <td >
                    @if($value==null)
                        empty
                    @else
                        @if($key=="password")
                            {{substr($value,0,10)."..."}}
                        @else
                            {{$value}}
                        @endif
                    @endif
                </td>
            @endforeach
            <td class="col-md-3">
                <button data-id="{{$user->id}}" type="button" class="btn btn-primary edit"><i class="fa fa-wrench"></i> Edit</button>
                <button data-id="{{$user->id}}" type="button" class="btn btn-danger delete"><i class="fa fa-trash-o"></i> Delete</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div>
    {{$users->links()}}
</div>





