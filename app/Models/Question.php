<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'options' => 'array',
    ];
    
    public function testCourse()
    {
        return $this->belongsTo(TestCourse::class, 'test_courses_id');
    }
    
    public function testLevel()
    {
        return $this->belongsTo(TestLevel::class, 'test_levels_id'); 
    }
}
