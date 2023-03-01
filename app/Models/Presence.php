<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
  protected $table = 'presences';

  protected $primaryKey = 'id';

  protected $fillable = ['schedule_id', 'student_id','status', 'note', 'start_at', 'end_at'];

  protected function schedule()
  {
    return $this->belongsTo('App\Models\Schedule');
  }
  protected function student()
  {
    return $this->belongsTo('App\Models\Student');
  }
}
