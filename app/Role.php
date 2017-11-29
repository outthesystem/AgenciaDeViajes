<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends \Spatie\Permission\Models\Role
{
  protected $fillable = [
      'name',
      'permissions'
  ];
}
