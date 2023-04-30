<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use App\Models\BotManChat;

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
                $botman->reply("How can I help you ?");
                // $question = $answer->getText();
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

            $this->say('Nice to meet you '.$name);
            $this->say('please Enter Your Email');
        });
    }

    // public function askEmail($botman)
    // {

    //     $botman->ask('please Enter Your Email', function(Answer $answer) {
    //         $email = $answer->getText();
    //         $this->say('Grate, Now you can ask any question. Our Expert will back to you shortly');
    //     });
    // }

    // /**
    //  * store name in db 
    // */

    // public function storeName($name)
    // {
    //        /**
    //         * check the name is already present in db or not
    //         * If, not present it will create one 
    //        */

    //        $check = BotManChat::whereName($name)->first();
    //        if($check == null){
    //             BotManChat::create([
    //                    'Name' => $name,
    //             ]);
    //        }
    // }

    /**
     * Update in db 
    */

    // public function storeEmail($email, $name)
    // {
    //     /**
    //         * check the name is already present in db or not
    //         * If, not present it will create one 
    //        */

    //        $check = BotManChat::whereName($name)->first();
    //        if($check != null){
    //             $check->update([
    //                    'email' => $email,
    //             ]);
    //        }
    // }

    // /**
    //  * store question 
    // */
    // public function storeQuestion($question, $name)
    // {
    //     /**
    //         * check the name is already present in db or not
    //         * If, not present it will create one 
    //        */

    //        $check = BotManChat::whereName($name)->first();
    //        if($check != null){
    //             $check->update([
    //                    'question' => $question,
    //             ]);
    //        }
    // }
}