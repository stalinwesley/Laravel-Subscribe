<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSubscriptionUsers extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','website_list_id'];
    
    public function website_list()
    {
        return $this->hasOne(WebsiteList::class,'id','website_list_id');
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function users()
    {
        return $this->hasMany(User::class,'id','user_id');
    }
}
