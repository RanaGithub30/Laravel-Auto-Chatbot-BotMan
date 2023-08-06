<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BotmanManageController extends Controller
{
    
    /**
     * Place your BotMan logic here.
     */

    public function handle()
    {
        $botman = app('botman');
   
        $botman->hears('{message}', function($botman, $message) {
   
            if ($message == 'hi' || $message == 'Hi' || $message == 'Hello' || $message == 'hello') {
                $this->askName($botman);
            }else{
                $this->askName($botman);
            }
   
        });
   
        $botman->listen();
    }

     /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
            $name = $answer->getText();

            $user_id = Str::random(15);
               
           if($name != ""){
                   // enter name in db

                    DB::table('bot_man_chats')->insert([
                        'user_id' => $user_id,
                        'name' => $name,
                    ]);

                    $this->say('Nice to meet you '.$name);

                    // ask email

                    $this->ask('please Enter Your Email', function(Answer $answer) use($user_id) {
                        $email = $answer->getText();

                        if($email != ""){
                            // enter email in db

                            DB::table('bot_man_chats')->where('user_id', $user_id)->update([
                                'email' => $email,
                            ]);

                            // ask question 

                            $this->ask('How can I help you ?', function(Answer $answer) use($user_id){
                                   $question = $answer->getText();

                                   // enter question in db

                                    DB::table('bot_man_chats')->where('user_id', $user_id)->update([
                                        'question' => $question,
                                    ]);

                                    $this->say('Thank you, Our experts will contact with you shortly');
                            });
                        }

                    });

                }
        });
    }
}