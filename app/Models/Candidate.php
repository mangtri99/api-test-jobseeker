<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory, SoftDeletes;

    // table t_candidate
    protected $table = 't_candidate';

    //candidate_id as primary key
    protected $primaryKey = 'candidate_id';

    // fillable
    protected $fillable = [
        'candidate_id',
        'email',
        'phone_number',
        'full_name',
        'dob',
        'pob',
        'gender',
        'year_exp',
        'last_salary',
    ];
}
