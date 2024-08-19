<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded=[];


        public function roadmaps()
    {
        return $this->belongsToMany(Roadmap::class, 'roadmap_contents', 'content_id', 'roadmap_id');
    }

}
