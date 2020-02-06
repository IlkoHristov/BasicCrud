<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $post = Article::all();
        return view('articles.index',compact('article'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     * @throws ValidationException
     *
     */
    public function createArticle(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'title'=>'required|string|max:255',
            'content'=>'required',
        ]);

        Article::create($request->all());
        return redirect()->route('articles.index')->with('success','Article created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     * @return Builder
     */
    public function getArticle($id)
    {
        $post = Article::find($id);
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function editArticle($id)
    {
        $post = Article::find($id);
        return view('articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function updateArticle(Request $request, $id)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'title' => 'required',
            'content' => 'required',
        ]);
        Article::find($id)->update($request->all());
        return redirect()->route('articles.index')->with('success','Article update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function deleteArticle($id)
    {
        Article::find($id)->delete();
        return redirect()->route('articles.index')->with('success','Article deleted successfully');
    }
}
