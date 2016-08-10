<?php

namespace App\Http\Controllers;

use App\Article;

use App\Author;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use DB;

class ArticleController extends Controller
{
    public function getAllArticles()
    {
        $articles = Article::all();
        return view('articles.all-articles', ['articles' => $articles]);

    }

    public function createArticle()
    {
        $authors = Author::all();
        return view('articles.create-article', ['authors' => $authors]);
    }

    public function validateArticleInput(Request $request)
    {
        $messages = [

            'title.required'    => 'Title is required',
            'body.required'     => 'Body text is required',


        ];

        $validator = Validator::make($request->all(), [

            'title'         => 'required',
            'body'          => 'required',
            'author'        => 'required',

        ],$messages);


        if ($validator->fails()) {
            return redirect()->route('admin:createArticle')
                ->withErrors($validator);
        }


        $title   = $request->input('title');
        $body    = $request->input('body');
        $author  = $request->input('author');

        $article = new Article();
       // $id =  Article::insertArticle($title,$body);
        $id = $article->insertArticle($title,$body,$author);

        if (!empty($id))
        {
            $request->session()->flash('status', 'Article was successfully added!');
            //\Session::flash('status','Task successful');
            return redirect()->route('admin:createArticle');
        }
        else
        {
            $request->session()->flash('status', 'Unsuccessfull');
            return redirect()->route('admin:createArticle');

        }



    }

    public function editArticle($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit-article', ['article' => $article]);
    }

    public function saveEditArticle(Request $request,$id)
    {
        $messages = [

            'title.required'    => 'Title is required',
            'body.required'     => 'Body text is required',


        ];

        $validator = Validator::make($request->all(), [

            'title'         => 'required',
            'body'          => 'required',

        ],$messages);


        if ($validator->fails()) {
            return redirect()->route('admin:editArticle', ['id' => $id])
                ->withErrors($validator);
        }


        $title   = $request->input('title');
        $body    = $request->input('body');

        $article = new Article();
        if($article->updateArticle($title,$body,$id))
        {
            $request->session()->flash('status', 'successfull');
            return redirect()->route('admin:editArticle', ['id' => $id]);

        }
        else
        {
            $request->session()->flash('status', 'Unsuccessfull');
            return redirect()->route('admin:editArticle', ['id' => $id]);
        }


    }

    public function deleteArticle(Request $request,$id)
    {
        if ($id)
        {
            $article = new Article();
            if($article->deleteArticle($id))
            {
                $request->session()->flash('status', 'Artcile was Deleted!');
                return redirect()->route('admin:listArticle');

            }
            else
            {
                $request->session()->flash('status', 'Unsuccessfull');
                return redirect()->route('admin:listArticle');

            }
        }


    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        //dd($article);
        /*if (is_null($article))
        {
            abort(404);
        }*/
        return view('articles.show')->with('articles',$article);
    }


}
