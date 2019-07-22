<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    protected $guarded = [];
    
    public function path()
    {
        return "/facts/{$this->id}";
    }
}
