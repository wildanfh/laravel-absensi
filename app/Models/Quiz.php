<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
  protected $table = 'quizzes';

  protected $primaryKey = 'id';

  protected $fillable = ['group_id', 'subject', 'start_at', 'end_at'];

  protected function group()
  {
    return $this->belongsTo('App\Models\Group');
  }
}
