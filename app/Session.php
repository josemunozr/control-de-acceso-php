<?php
/**
 * Created by PhpStorm.
 * User: jarmuñoz
 * Date: 02-07-14
 * Time: 12:04 PM
 */

class Session {

   public static function  start()
   {
       session_start();
   }

   public static function destroy()
   {
       session_destroy();
   }


}