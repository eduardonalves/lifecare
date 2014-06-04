<?php
App::uses('ExceptionRenderer', 'Error');
class AppExceptionHandler {
    public static function handle($error) {
        echo 'Oh noes! ' . $error->getMessage();
        // ...
    }
    // ...
}