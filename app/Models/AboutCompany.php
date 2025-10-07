<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutCompany extends Model
{
    protected $table = 'about_companies';

    protected $fillable = [
        'company_name',
        'description',
        'address',
        'phone',
        'email',
        'instagram',
        'youtube',
        'twitter',
        'facebook',
        'privacy_policy',
        'terms_and_conditions',
        'sales_and_refund',
    ];
}
