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
    require_once(dirname(__FILE__) . '/../resource/config/curator.php');

    //Load Curator traits.
    require_once(\Curator\Config\PATH\ROOT . 'resource/helper/Security.php');

    //Load debug utilities. Development only.
    require_once(\Curator\Config\PATH\ROOT . 'resource/debug/vendor/debug.php');

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

    //Initialize session object to handle messaging.
    $CURATOR_SESSION = CLASSES\Session::getSession();

    //Initialize language object to handle messaging.
    $CURATOR_LANG = CLASSES\Language::getLanguage();

    //Create a database object to handle all database communication.
    $CURATOR_DB = CLASSES\Database::getConnection();
?>