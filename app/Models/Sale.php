<?php

namespace App\Models;

use Facades\App\Helpers\AutoHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    
    protected $appends = [
        'month_indo',
        'date_string',
        'date_in_string',
        'date_out_string',
    ];

    protected $dates = ['date', 'date_in', 'date_out'];

    public function getMonthIndoAttribute()
    {
        return AutoHelper::getMonthIndo($this->month);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateStringAttribute()
    {
        return AutoHelper::formatDateIndo($this->date);
    }

    public function getDateInStringAttribute()
    {
        return AutoHelper::formatDateIndo($this->date_in);
    }

    public function getDateOutStringAttribute()
    {
        return AutoHelper::formatDateIndo($this->date_out);
    }
}
