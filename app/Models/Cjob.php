<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cjob extends Model
{
    use HasFactory;

    protected $table = 'cjobs';
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
