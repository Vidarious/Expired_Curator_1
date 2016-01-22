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

   //Load Curator configuartion data.
   require_once('../resource/config/system.php');

   //Automatically include classes which are called.
   function autoLoad($className)
   {
      $classLocation = \Curator\Config\ROOT . 'resource/class/' . $className . '.php';

      if(file_exists($classLocation))
      {
         echo $classLocation;
         require_once $classLocation;
      }
   }

   //Register auto-load function.
   spl_autoload_register('\Curator\Application\autoLoad');

   $DB = new \Database;
?>
