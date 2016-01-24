<?php
/*
 * Class for processing all communication to the SQL database.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
   namespace Curator\Classes;

   use \Curator\Config\DB as DB;

   //Include database configuration information.
   require_once(\Curator\Config\PATH\CONFIG . 'database.php');

   class Database
   {
      //Class Variables
      private $Connection = NULL;

      //Create object connection to database. Singleton design.
      protected function __construct()
      {
         $pdoServerString = 'mysql:host=' . DB\HOST . ';dbname=' . DB\NAME;
         $pdoOptionString = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);

         try
         {
            $this->Connection = new \PDO($pdoServerString, DB\USER, DB\PASS, $pdoOptionString);
         }
         catch(PDOException $pdoError)
         {
            dump($pdoError);
         }
      }

      //Singleton design.
      private function __clone()
      {}

      //Singleton design.
      private function __wakeup()
      {}

      //Returns the singleton instance of the database connection. Singleton design.
      public static function getConnection()
      {
         static $pdoInstance = NULL;

         if($pdoInstance === NULL)
         {
            $pdoInstance = new static();
         }

         return $pdoInstance;
      }
   }
?>