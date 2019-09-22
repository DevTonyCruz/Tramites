<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Configurations extends Model
{    
    protected $table = 'configuration';
    protected $fillable = ["value"];
}
