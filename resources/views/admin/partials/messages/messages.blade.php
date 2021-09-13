
<div class="row">

    @if($messages->isEmpty())
        {{dd($messages)}}
        <h3>There are no new messages!</h3>
    @endisset

    @foreach($messages as $message)
        <div class="col-md-8">
            <!-- PANEL HEADLINE -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Message</h3>
                    <p class="panel-subtitle">Date & Time: {{$message->created_at}}</p>
                </div>
                <div class="panel-body">
                    <h4>From: {{$message->email}} </h4>
                    <p>{{$message->message}}</p>
                </div>
            </div>
            <button data-id="{{$message->id}}" type="button" class="btn btn-danger delete"><i class="fa fa-trash-o"></i> Delete</button>
            <!-- END PANEL HEADLINE -->
        </div>
    @endforeach
</div>

<div>
    {{$messages->links()}}
</div>





