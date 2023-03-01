<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  protected $table = 'groups';

  protected $primarykey = 'id';

  protected $fillable = [
    'user_id',
    'name'
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

  public function members()
  {
    return $this->hasMany('App\Models\Member');
  }
}
