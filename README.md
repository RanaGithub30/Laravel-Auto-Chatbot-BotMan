## Step By Step Guidence for Implementation of BotMAn(Automatic Chat Bot) with Laravel 9 

 - Install Laravel 9 --> composer create-project laravel/laravel:^9.0 project-name
 - Install Botman and Botman Driver --> 
         a) composer require botman/botman
         b) composer require botman/driver-web
 -  Create Configuration File
           This step is not required to follow. But you can create configuration file for driver and cache.

           a) create config/botman/config.php & write down the following code
                    
                return [
                    'conversation_cache_time' => 40,
                    'user_cache_time' => 30,
                ];

           b) create config/botman/web.php & write down the code
            
                return [
                    'matchingData' => [
                        'driver' => 'web',
                    ],
                ];

 - After that, open “.env” file and update the database name, username and password in the env file
            
            DB_DATABASE=Enter_Your_Database_Name
            DB_USERNAME=Enter_Your_Database_Username
            DB_PASSWORD=Enter_Your_Database_Password

 - Now run the following command 
       
            php artisan migrate

 - Next, create a controller --> php artisan make:controller BotmanManageController
 - Next, open your “routes/web.php” file and add the following lines
            
            a) at the top --> use App\Http\Controllers\BotmanManageController;
            b) and also declare the route as follow
                      Route::match(['get', 'post'], '/botman', [BotmanManageController::class, 'handle']);

 - Next, go to app/http/controller/BotmanManageController.php. and update the methods as per done in this project.
 - In this step, Visit resources/views directory and open file that named welcom.blade.php. & update the HTML & Javascript as per this project.

 - In this step, Execute the php artisan serve command on terminal to start server locally.
             
             php artisan serve

## create DB table & store chats in db

 - create Model & Migration using following command
            
                php artisan make:model BotManChat -m

- open App\Models\BotManChat & update the code as per this project
- Run the migration command to migrate the table using following command
             php artisan migrate