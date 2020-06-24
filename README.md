## Environment
This project is built using Laravel. Make sure you have proper enviroment for Laravel. Make sure `PHP` and `Composer` is installed.

`.env` file and database is not needed.

### Screen Recording

![ezgif-3-eb71ab6c77a8](https://user-images.githubusercontent.com/24792201/85596449-4fd85900-b67c-11ea-86c1-dc164c3834df.gif)

This is how it looks like when running the code.

### Running the code
Follow this steps after cloning and go into the cloned directory through CLI
1. `composer update`
1. `php artisan string:modifier "your own text here"`. Output will be shown in the console and a CSV is also generated in root directory
1. `php artisan test` to run the test



### Main Files
Main files that contain the solutions are in these files
1. `app/Services/ModifierService.php`
1. `app/Console/Commands/Modifier.php`
1. `tests/Unit/ModifierTest.php`