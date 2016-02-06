<?php
/*
 * Class for language control. Singleton design. There can only be one instance of this class.
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

    use \Curator\Config\LANG as LANG;
    use \Curator\Config\PATH as PATH;

    class Language
    {
        //Class Variables
        private $language = NULL;

        //Object initalization. Singleton design.
        protected function __construct($userLanguage = NULL)
        {
            //Check if the user has a selected language. If not, load Curator default.
            if($userLanguage != NULL)
            {
                $this->language = $userLanguage;
            }
            else
            {
                $this->language = LANG\CURATOR_DEFAULT;
            }
        }

        public function __get($property)
        {
            if(property_exists($this, $property))
            {
                return $this->$property;
            }
        }

        //Singleton design.
        private function __clone()
        {}

        //Singleton design.
        private function __wakeup()
        {}

        //Returns the singleton instance of the language class. Singleton design.
        public static function getLanguage($userLanguage = NULL)
        {
            static $languageInstance = NULL;

            if($languageInstance === NULL)
            {
                $languageInstance = new static($userLanguage);
            }

            return $languageInstance;
        }

        //Load the language file for the passed class. These are special language files, primarily for try exceptions from class actions.
        public function loadClassLanguage($className = NULL)
        {
            if($className !== NULL)
            {
                //Capture the class name without namespace.
                $className = explode('\\', $className);
                $className = end($className);

                $classLanguagePath = PATH\LANG . '/' . $this->language . '/class/' . $className . '.php';

                if(file_exists($classLanguagePath))
                {
                    require_once $classLanguagePath;
                }
            }
        }
    }
?>