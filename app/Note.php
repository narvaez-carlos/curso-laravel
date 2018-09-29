<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

	protected $fillable = ['title','body','important', 'group_id','user_id'];

    public function isImportant()
    {

    	return $this->important == 1;
    }
}
