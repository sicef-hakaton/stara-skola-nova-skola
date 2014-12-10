<div class="row">
    <div class="panel panel-default widget">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-comment"></span>
            <h3 class="panel-title">
                Komentari</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                @foreach ($comments as $comment)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-2 col-md-1">
                            <img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle img-responsive" alt="" /></div>
                        <div class="col-xs-10 col-md-11">
                            <div>
                                <div class="mic-info">
                                    Korisnik: {{ $comment->user->username }}, vreme: 
                                    {{ date('d. m. Y. H:i', strtotime($comment->created_at)) }}
                                </div>
                            </div>
                            <div class="comment-text">
                                {{ $comment->body }}
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
