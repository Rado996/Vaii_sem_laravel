@extends('layouts.app')

@section('content')

    <div class="container-lg">
    <x-alert/>
    @auth
        <form class="clearfix" id="comment_form" method="post" action="http://localhost/Vaii_sem_laravel/public/Comments/create">
            @csrf
            <input type="hidden" name="createdBy" value="{{Auth::user()->id}}">
            <textarea name="commentBody" id="comment_text" class="form-control" cols="30" rows="3"> </textarea>
            <button class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitCommentID">Pridať recenziu</button>
        </form>
    @elseauth()
        <form class="clearfix" id="comment_form">
            <p id="not_logged_in" cols="30" rows="10"> Pred pridaním recenzie sa musíte prihlásiť </p>
        </form>
    @endauth


    @foreach($comments as $comment)
        <div class="comment clearfix" id="comment{{$comment->id}}">
            <div class="comment-details">
                <p class="author" data-author="{{$comment->createdBy}}" > {{$comment->createdBy}}  </p>
                <span class="comment-date">{{$comment->created_at}}</span>
                <p>{{$comment->commentBody}}</p>

                <a  data-cmid="{{$comment->id}}" class="btn btn-warning commentDeleteBtn" onclick="deleteComment({{$comment->id}})" >Vymazať</a>
                <a  data-cmid="{{$comment->id}}" class="btn btn-warning commentEditBtn"  >Upraviť</a>

            </div>
        </div>

    @endforeach
    </div>

    <script>
        function deleteComment(id) {
            // var id = $(this).data("cmid");
            console.log(id)
            let commentDisplay = document.getElementById("comment" + id);
            $.ajax({
                url: "http://localhost/Vaii_sem_laravel/public/Comments/delete/" + id,
                type: "GET", //cakam odpoved 200
                cache: false,
                data: {

                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {//Caka kym dostane 200 od controllera
                        commentDisplay.style.display = "none";
                    }
                }
            });

        };
    </script>


@endsection
