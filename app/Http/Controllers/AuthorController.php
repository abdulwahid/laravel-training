<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use DB;

class AuthorController extends Controller
{
    /**
     * @return string
     */
    public function getAllAuthors()
    {
       // $authors = DB::table('authors')->get();
        $authors = Author::all();
        return view('author.all-authors', ['authors' => $authors]);

    }

    public function validateAuthorInput(Request $request)
    {
        //print_r($request->all());
        $messages = [

            'username.required'    => trans('validation.required'),
            'username.min'         => trans('validation.min.numeric'),
            'email.required'       => trans('validation.required'),
            'firstName.required'   => trans('validation.required'),
            'lastName.required'    => trans('validation.required'),


        ];

        $validator = Validator::make($request->all(), [

            'username'         => 'required|min:5',
            'firstName'        => 'required',
            'lastName'         => 'required',
            'email'            => 'required|email',

        ],$messages);


        if ($validator->fails()) {
            return redirect()->route('admin:createAuthor')
                ->withErrors($validator);
        }


        $username   = $request->input('username');
        $firstName  = $request->input('firstName');
        $lastName   = $request->input('lastName');
        $email      = $request->input('email');

        $author = new Author();
        $id =  $author->insertAuthor($username,$firstName,$lastName,$email);

        if (!empty($id))
        {
            $request->session()->flash('status', 'Author was successfully inserted!');
            //\Session::flash('status','Task successful');
            return redirect()->route('admin:createAuthor');
        }
        else
        {
            $request->session()->flash('status', 'Unsuccessfull');
            return redirect()->route('admin:createAuthor');

        }



    }

    public function editAuthor($id)
    {
        //$author = DB::table('authors')->where('id', $id)->first();
        $author = Author::findOrFail($id);
        return view('author.edit-author', ['author' => $author]);
    }

    public function saveEditAuthor(Request $request,$id)
    {
        $messages = [

            'username.required'    => trans('validation.required'),
            'username.min'         => trans('validation.min'),
            'email.required'       => trans('validation.required'),
            'firstName.required'   => trans('validation.required'),
            'lastName.required'    => trans('validation.required'),


        ];

        $validator = Validator::make($request->all(), [

            'username'         => 'required|min:5',
            'firstName'        => 'required',
            'lastName'         => 'required',
            'email'            => 'required|email',

        ],$messages);


        if ($validator->fails()) {
            return redirect()->route('admin:editAuthor', ['id' => $id])
                ->withErrors($validator);
        }


        $username   = $request->input('username');
        $firstName  = $request->input('firstName');
        $lastName   = $request->input('lastName');
        $email      = $request->input('email');

        $author = new Author();


        if($author->updateAuthor($username,$firstName,$lastName,$email,$id))
        {
            $request->session()->flash('status', 'successfull edit');
            return redirect()->route('admin:editAuthor', ['id' => $id]);

        }
        else
        {
            $request->session()->flash('status', 'Unsuccessfull');
            return redirect()->route('admin:editAuthor', ['id' => $id]);
        }


    }

    public function deleteAuthor(Request $request,$id)
    {
        if (!empty($id))
        {
            $author = new Author();
            if($author->deleteAuthor($id))
            {
                $request->session()->flash('status', 'Delete was successful!');
                return redirect()->route('admin:listAuthor');

            }
            else
            {
                $request->session()->flash('status', 'Unsuccessfull');
                return redirect()->route('admin:listAuthor');

            }
        }

    }

    public function getArticlesForAuthor()
    {
       $allArticles = Author::with('articles')->get();
//        $allArticles = Author::with(['articles' => function ($query) {
//            $query->where('author_id', '=',3);
//        }])->get();

         return view('author.author-detail', ['allArticles' => $allArticles]);

    }

    public function getArticlesForOneAuthor($id)
    {

        $author = Author::findOrFail($id);
        $author2 = Author::where('id',$id)->with('articles')->first();
        return view('author.single-author-detail', ['authors' => $author2]);

    }


}
