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
        header("Location: " . "http://" . filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL));
        die();
    }

    use \Curator\Config\LANG as LANG;
    use \Curator\Config\PATH as PATH;

    class Language
    {
        //Class Variables
        private $language = NULL;

        //Object initalization.
        public function __construct($language = NULL)
        {
            //Check if the user has a selected language. If not, load Curator default.
            if($language != NULL)
            {
                $this->language = $language;
            }
            else
            {
                $this->language = LANG\CURATOR_USER_DEFAULT;
            }
        }

        public function __get($property)
        {
            if(property_exists($this, $property))
            {
                return $this->$property;
            }
        }

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