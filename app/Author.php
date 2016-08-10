<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Author extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;


    public function insertAuthor($username,$firstName,$lastName,$email)
    {
        $author = new Author;

        $author->username = $username;
        $author->first_name = $firstName;
        $author->last_name = $lastName;
        $author->email = $email;

        $author->save();

        $insertedId = $author->id;

        return $insertedId;

    }

    public function updateAuthor($username,$firstName,$lastName,$email,$id)
    {
        $affectedRows = Author::where('id', '=', $id)
            ->update(array('username' => $username,'first_name'=>$firstName,'last_name'=>$lastName,'email'=>$email));

        if($affectedRows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }


    }

    /**
     *
     *
     * @param $id
     * @return bool
     */
    public function deleteAuthor($id)
    {
        $deletedRows = Author::where('id',$id)->delete();

        if($deletedRows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }
}
