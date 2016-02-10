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

    use \Curator\Config as CONFIG;

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . htmlspecialchars($_SERVER['HTTP_HOST']));
    }

    class Tracker
    {
        //Class Objects
        private $Session     = NULL;

        //Class Variables
        public $pageCurrent  = NULL;
        public $pagePrevious = CONFIG\HOMEPAGE;

        //Object initalization. Singleton design.
        protected function __construct()
        {
            $Session = Session::getSession();

            $pastCurrentPage = $Session->getValue('Curator_PageCurrent');

            if($pastCurrentPage !== NULL)
            {
                $this->pagePrevious = $pastCurrentPage;
            }

            $this->pageCurrent = htmlspecialchars($_SERVER['REQUEST_URI']);

            self::updateSessionPages();
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

        //Get current and past data
        //
        //
        
        //Update the Current and Past page session values.
        private function updateSessionPages()
        {
            $Session->setValue('Curator_PageCurrent', $this->pageCurrent);
            $Session->setValue('Curator_PagePrevious', $this->pagePrevious);
        }
    }
?>