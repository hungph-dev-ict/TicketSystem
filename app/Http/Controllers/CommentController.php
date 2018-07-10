<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->modelComment = $comment;
    }

    public function store(CommentFormRequest $request)
    {
        $data = $request->all();
        $this->modelComment->create($data);

        return redirect()->back()->with('status', 'Your comment has been created!');
    }
}
