<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
  protected $table = 'members';

  protected $primaryKey = 'id';

  protected $fillable = ['group_id', 'student_id'];

  public function group()
  {
    return $this->belongsTo('App\Models\Group');
  }

  public function student()
  {
    return $this->belongsTo('App\Models\Student');
  }
}
