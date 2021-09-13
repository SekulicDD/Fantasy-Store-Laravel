
@if($comments==null)
    <div class="media mb-3">
        <p>There are no comments yet</p>
    </div>
@else
    @foreach($comments as $comment)
        <div class="media mb-3">
            <div class="media-body ml-3">
                <h6 class="mb-0 text-uppercase">{{$comment->user->name}}</h6><p class="small text-muted">-{{$comment->user->role->name}}</p>
                <p class="small text-muted mb-0 text-uppercase">{{$comment->created_at}}</p>
                <p class="text-small mb-0 text-muted">{{$comment->content}}</p>
            </div>
        </div>
    @endforeach
@endif
