<?php

namespace App\Models;

use App\Models\Question;
use App\Models\TestCourse;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestLevel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description'];

    public function testcourses()
    {
        return $this->hasMany(TestCourse::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'test_levels_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($testlevel) {
            $testlevel->slug = Str::slug($testlevel->name);
        });

        static::updating(function ($testlevel) {
            $testlevel->slug = Str::slug($testlevel->name);
        });
    }
}
