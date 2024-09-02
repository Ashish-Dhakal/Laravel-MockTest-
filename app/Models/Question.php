<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_levels_id',
        'test_courses_id',
        'question',
        'options',
        'answer',
        'reason',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    // Define relationships if necessary
    public function testLevel()
    {
        return $this->belongsTo(TestLevel::class, 'test_levels_id');
    }

    public function testCourse()
    {
        return $this->belongsTo(TestCourse::class, 'test_courses_id');
    }
}
