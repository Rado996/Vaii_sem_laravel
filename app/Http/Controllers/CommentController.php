<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentAddRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $comments = Comment::all();

        return view('Comments.index', compact('comments'));     //compact vklada do contentu
    }

 /*   public function add()
    {
        return view('Comments.add');
    }

    public function edit(Comment $comment)
    {
        return view('Comments.edit', compact('comment'));
    }*/

    public function create(CommentAddRequest $request)
    {
        Comment::create($request->all());
        return redirect()->back()->with('message' , 'Položka pridaná');

    }

    public function update( CommentAddRequest $request, $id)
    {

        $comment = Comment::find($id);

        $comment->commentBody = $request->get('commentBody');
        //$comment->createdBy = $request->get('createdBy');
//        $id->update(['commentBody' => $request->commentBody,
//            'createdBy' => $request->createdBy,
//            ]);
        $comment->save();
        return json_encode(array('statusCode' => 200, 'data' => request('commentBody')));

    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return json_encode(array('statusCode' => 200));
    }
}
