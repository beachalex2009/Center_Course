<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function classroom()
    {
        return $this->belongsTo(classroom::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function studentregister()
    {
        return $this->belongsTo(studentregister::class);
    }
}
