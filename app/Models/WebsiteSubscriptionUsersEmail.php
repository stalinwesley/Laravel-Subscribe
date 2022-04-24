<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSubscriptionUsersEmail extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','website_list_id','post_id','is_sent'];
    protected $table = 'website_subscription_users_email';


}
