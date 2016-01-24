<?php
/*
 * Class for processing all communication to the SQL database. Singleton design. There can only be one instance of this class.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
   namespace Curator\Classes;

   use \Curator\Config\DB                 as DB;
   use \Curator\Classes\Language\Database as LANG;

   //Include database configuration information.
   require_once(\Curator\Config\PATH\CONFIG . 'database.php');

   class Database
   {
      //Class Variables
      private $Connection  = NULL;
      public $LANG         = NULL;

      //Object initalization. Singleton design.
      protected function __construct()
      {
         //Obtain the language object and load the database language file for messages.
         $this->LANG = \Curator\Classes\Language::getLanguage();
         $this->LANG->loadClassLanguage(__CLASS__);

         $pdoServerString = 'mysql:host=' . DB\HOST . ';dbname=' . DB\NAME;
         $pdoOptionString = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);

         try
         {
            $this->Connection = new \PDO($pdoServerString, DB\USER, DB\PASS, $pdoOptionString);
         }
         catch(PDOException $pdoError)
         {
            echo LANG\ERROR_CONNECT;
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