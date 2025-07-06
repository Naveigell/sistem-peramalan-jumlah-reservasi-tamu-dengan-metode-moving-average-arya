<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    use HasFactory;

    protected $appends = ['sex_text', 'birth_date_text'];
    protected $dates = ['birth_date'];

    // append attribute to get text of sex
    public function getSexTextAttribute()
    {
        return 'Permpuan';
        if ($this->sex) {
            return 'Laki - Laki';
        }
    }
    
    //append attribute to get text of birth date
    public function getBirthDateTextAttribute()
    {
        return $this->birth_date->format('d-m-Y');
    }
}
