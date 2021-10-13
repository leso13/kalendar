<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'event_id', 'date', 'repeatable', 'category_id'];

    // protected $appends = ['event_month', 'event_day'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getEventYearAttribute()
    {
        return substr($this->date, 0, 4);
    }

    public function getEventMonthAttribute()
    {
        return substr($this->date, 5, 2);
    }

    public function getEventDayAttribute()
    {
        return substr($this->date, 8, 2);
    }
}
