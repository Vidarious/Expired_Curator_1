<?php
 /*
 * Class for session control. Singleton design. There can only be one instance of this class.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Classes;

    class Session
    {
        //Object initalization. Singleton design.
        protected function __construct()
        {
            ini_set('session.cookie_lifetime', 0);
            ini_set('session.use_cookies', 1);
            ini_set('session.use_only_cookies', 1);
            ini_set('session.use_strict_mode', 1);
            ini_set('session.cookie_httponly', 1);
            ini_set('session.entropy_length', 32);
            ini_set('session.hash_function', 'sha256');
            ini_set('session.hash_bits_per_character', 5);
        }

        //Singleton design.
        private function __clone()
        {}

        //Singleton design.
        private function __wakeup()
        {}

        //Returns the singleton instance of the session class. Singleton design.
        public static function getSession()
        {
            static $sessionInstance = NULL;

            if($sessionInstance === NULL)
            {
                $sessionInstance = new static();
            }

            return $sessionInstance;
        }
    }
?>