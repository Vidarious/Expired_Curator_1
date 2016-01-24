<?php
/*
 * Primary application file for Curator. Include this file to initialize Curator.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */

   namespace Curator\Application;
   
   use \Curator\Config\PATH   as PATH;
   use \Curator\Config\LANG   as LANG;
   use \Curator\Classes       as CLASSES;
   
   //Load Curator configuartion data.
   require_once('../resource/config/curator.php');
   
   //Load debug utilities. Development only.
   require_once('../resource/debug/vendor/debug.php');
   
   //Automatically include classes for created objects.
   function autoLoad($className)
   {
      //Extract class file name from namespace path.
      $fileName = explode('\\', $className);
      $fileName = end($fileName);

      //Create path to class.
      $classLocation = PATH\CLASSES . $fileName . '.php';
   
      //Verify class file exists and load.
      if(file_exists($classLocation))
      {
         require_once $classLocation;
      }
   }
   
   //Register auto-load function.
   spl_autoload_register('\Curator\Application\autoLoad');
   
   //Initialize language object to handle messaging.
   $LANG = CLASSES\Language::getLanguage('en_CA');
   
   //Create a database object to handle all database communication.
   $DB = CLASSES\Database::getConnection();
   
   //TODO: Create page URL handler (specifically ?lang=)
   //TODO: Create helper static class to tools
?>