<?php
 /*
 * Class for page tracking. Singleton design. There can only be one instance of this class.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Classes;

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
    }

    class Tracker
    {
        //Class Objects
        private $Session     = NULL;

        //Class Variables
        public $pageCurrent  = NULL;
        public $pagePrevious = NULL;

        protected function __construct()
        {
            $this->pagePrevious = $Session->getValue('Curator_PageCurrent');

            if(isset($this->pagePrevious))
            {
                //Set Home
            }

            $this->pageCurrent = htmlspecialchars($_SERVER['REQUEST_URI']);
        }

        //Returns the singleton instance of the tracker class. Singleton design.
        public static function getTracker()
        {
            static $trackerInstance = NULL;

            if($trackerInstance === NULL)
            {
                $trackerInstance = new static();
            }

            return $trackerInstance;
        }

        //Singleton design.
        private function __clone() {}

        //Singleton design.
        private function __wakeup() {}
    }
?>