<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','body'];

    public $timestamps = true;

    public function insertArticle($title,$body,$author)
    {
        $article = new Article;

        $article->title = $title;
        $article->body = $body;

        $article->save();

        $insertedId = $article->id;

        $article->authors()->attach($author); //relation
        //Article::find($article->id)->authors()->save($author);

        return $insertedId;

    }

    public static function updateArticle($title,$body,$id)
    {
        $affectedRows = Article::where('id', '=', $id)
            ->update(array('title' => $title,'body'=>$body));

        if($affectedRows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function deleteArticle($id)
    {
        $deletedRows = Article::where('id',$id)->delete();

        if($deletedRows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }
}
