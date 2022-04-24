<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteList extends Model
{
    use HasFactory;
    protected $table = 'website_list';
    protected $fillable = ['website_title','website_descrition'];

    
}
