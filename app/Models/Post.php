<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','website_list_id','is_email_sent'];

    public function website()
    {
        return $this->hasOne(WebsiteList::class,'id','website_list_id');
    }


}
