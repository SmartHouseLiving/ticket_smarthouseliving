<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $fillable = [
        'company_name',
        'header_badge',
        'header_title',
        'logo',
        'account_button_label',
        'logout_button_label',
        'is_active',
    ];
}
