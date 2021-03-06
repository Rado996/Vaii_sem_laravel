@extends('layouts.app')

@section('content')

    <div class="container-lg">
    <x-alert/>
    @auth
        <form class="clearfix pb-5  " id="comment_form" method="post" action="http://localhost/Vaii_sem_laravel/public/Comments/create">
            @csrf
            <input type="hidden" name="createdBy" value="{{Auth::user()->name}}">
            <textarea name="commentBody" id="comment_text" class="form-control" cols="30" rows="3" required > </textarea>
            <button class="btn btn-primary btn-sm pull-right" name="submitComment" id="submitCommentID">Pridať recenziu</button>
        </form>
    @endauth
    @guest()
        <form class="clearfix" id="comment_form" >
            <p id="not_logged_in" cols="30" rows="10" class="text-danger pb-5" > Pred pridaním recenzie sa musíte prihlásiť </p>
        </form>
    @endguest


    @foreach($comments as $comment)
        <div class="comment clearfix border-dark table-active rounded p-3 " data-author="{{$comment->createdBy}}" id="comment{{$comment->id}}">
            <div class="comment-details">
                <p class="author  " > {{$comment->createdBy}}  </p>
                <p class="comment-date float-right  ">{{$comment->created_at}}</p>
                <p id="commentBodyID{{$comment->id}}" class="py-2 text-body "> <b> {{$comment->commentBody}} </b> </p>
                @auth
                    @if((Auth::user()->name == 'Admin')||Auth::user()->name == $comment->createdBy)
                        <a  class="btn btn-warning commentDeleteBtn" onclick="deleteComment({{$comment->id}})" >Vymazať</a>
                        <a  class="btn btn-warning commentEditBtn"  onclick="editComment({{$comment->id}})" >Upraviť</a>
                    @endif
                @endauth
            </div>
        </div>

        <div class="comment clearfix edit_comment_form" id="editComment{{$comment->id}}">
            <div class="comment-details">
                <textarea class="form-control" cols="10" rows="1" id="editCommentArea{{$comment->id}}">{{$comment->commentBody}}</textarea>
                @auth
                    @if((Auth::user()->name == 'Admin')||Auth::user()->name == $comment->createdBy)
                        <a   class="btn btn-warning commentSendEditBtn" onclick="updateComment({{$comment->id}})" >Odoslať</a>
                        <a   class="btn btn-warning commentCancelEditBtn" onclick="cancelEdit({{$comment->id}})" >Zrusit</a>
                    @endif
                @endauth
            </div>
        </div>






    @endforeach
    </div>

    <script>


        function deleteComment(id) {
            console.log(id)
            let commentDisplay = document.getElementById("comment" + id);
            $.ajax({
                url: "http://localhost/Vaii_sem_laravel/public/Comments/delete/" + id,
                type: "GET", //cakam odpoved 200
                cache: false,
                data: {

                },
                success: function (response) {
                    var dataResult = JSON.parse(response);
                    if (dataResult.statusCode == 200) {//Caka kym dostane 200 od controllera
                        commentDisplay.style.display = "none";
                    }
                }
            });

        }

        function editComment(id) {
            let editCommentForm = document.getElementById("editComment" + id);
            editCommentForm.style.display = "block";
            let commentDisplay = document.getElementById("comment" + id);
            commentDisplay.style.display = "none";
        }

        function updateComment(id) {
            let editCommentBody = document.getElementById("editCommentArea"+id);
            let commentBody = $(editCommentBody).val();
            let editCommentForm = document.getElementById("editComment" + id);
            editCommentForm.style.display = "none";
            let commentDisplay = document.getElementById("comment" + id);
            commentDisplay.style.display = "block";
            let createdBy = $(commentDisplay).data("author");
            let newCommentBody = document.getElementById("commentBodyID" + id);
            console.log(commentBody);
            console.log(createdBy);


            $.ajax({
                url: "http://localhost/Vaii_sem_laravel/public/Comments/update/" + id,
                type: "PATCH",
                cache: false,
                data: {
                    _token:'{{ csrf_token() }}',
                    commentBody: commentBody,
                    createdBy: createdBy
                },
                success: function (response) {
                    var dataResult = JSON.parse(response);
                    if (dataResult.statusCode == 200) {//Caka kym dostane 200 od controllera
                        newCommentBody.innerText=dataResult.data;
                    }
                }
            });
        }

        function cancelEdit(id) {
            let editCommentForm = document.getElementById("editComment" + id);
            editCommentForm.style.display = "none";
            let commentDisplay = document.getElementById("comment" + id);
            commentDisplay.style.display = "block";
        }


    </script>


@endsection
