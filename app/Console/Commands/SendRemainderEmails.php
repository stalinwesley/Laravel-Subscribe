<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Mail\RemainderPostmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\WebsiteSubscriptionUsers;
use App\Models\WebsiteSubscriptionUsersEmail;

class SendRemainderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remainder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::where('is_email_sent',0)->get(); 
        $subscriber_list_to_send = array();
        foreach ($posts as $post){
            $list_subscriber = WebsiteSubscriptionUsers::with(['users','website_list'])->where('website_list_id',$post->website_list_id)->get();
            $mail_sent_count = 0;
            foreach($list_subscriber as $subscriber){
                $email_content = ['title' => $post->title,'description'=>$post->description,'email'=>$subscriber->user,'post_id'=>$post->id,'website_title'=>$subscriber->website_list->website_title];
                $check_email_sent = WebsiteSubscriptionUsersEmail::where('website_list_id',$post->website_list_id)->where('user_id',$subscriber->user->id)->where('post_id',$post->id)->where('is_sent',1)->first();
                if(empty($check_email_sent)){
                    $this->SendRemainderEmail($email_content);
                    $website_subscription_users = new WebsiteSubscriptionUsersEmail;
                    $website_subscription_users->website_list_id = $post->website_list_id;
                    $website_subscription_users->user_id = $subscriber->user->id;
                    $website_subscription_users->post_id = $post->id;
                    $website_subscription_users->is_sent = 1;
                    $website_subscription_users->save();
                    $mail_sent_count ++;
                }

            }
            if($list_subscriber->count() == $mail_sent_count){
                $post = Post::find($post->id);
                $post->is_email_sent = 1;
                $post->save();
            }

        }
        // dd($subscriber_list_to_send);
        return 'Done....';
    }

    private function SendRemainderEmail($email_content = array())
    {
        // dd($email_content);

        $user = $email_content['email'];
        Mail::to($email_content['email'])->queue(new RemainderPostmail($email_content));
    }
}
