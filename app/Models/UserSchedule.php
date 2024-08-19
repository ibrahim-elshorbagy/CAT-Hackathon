<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSchedule extends Model
{
    use HasFactory;

        protected $guarded=[];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function roadmap()
        {
            return $this->belongsTo(Roadmap::class);
        }

        public function content()
        {
            return $this->belongsTo(Content::class);
        }
}
