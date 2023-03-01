<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
  protected $table = 'schedules';

  protected $primaryKey = 'id';

  protected $fillable = [
    'user_id',
    'group_id',
    'note',
    'start_at',
    'end_at'
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
  public function group()
  {
    return $this->belongsTo('App\Models\Group');
  }
  public function presences()
  {
    return $this->hasMany('App\Models\Presence');
  }
}
