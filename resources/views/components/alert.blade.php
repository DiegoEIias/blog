<div class="alert alert-{{$type}} alert-dismissible" role="alert">
    <h4 class="alert-heading">Blog</h4>
    <p>
        @if(is_object($message))
            <ul>
                @foreach ($message->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @else
            {{$message}}
        @endif
    </p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
