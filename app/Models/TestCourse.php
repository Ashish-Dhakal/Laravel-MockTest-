<?php

namespace App\Models;

use App\Models\Question;
use App\Models\TestLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestCourse extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];



    public function testlevel()
    {
        return $this->belongsTo(TestLevel::class, 'test_levels_id');
    }

    

}
