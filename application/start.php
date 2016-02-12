<?php
 /*
 * Primary application file for Curator. Include this file to initialize The Curator.
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
    use \Curator\Classes       as CLASSES;

    //Load Curator configuartion data.
    require_once(dirname(__FILE__) . '/../resource/config/curator.php');

    //Load Curator traits.
    require_once(PATH\ROOT . 'resource/traits/Security.php');

    //Load debug utilities. Development only.
    require_once(PATH\ROOT . 'resource/debug/vendor/debug.php');

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

    //Initialize session object.
    $_CURATOR['SESSION'] = CLASSES\Session::getSession();

    //Start page tracking utility.
    $_CURATOR['TRACKER'] = CLASSES\Tracker::getTracker();

    //Create a database object to handle all SQL communication.
    $_CURATOR['DATABASE'] = CLASSES\Database::getConnection();
?>