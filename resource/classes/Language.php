<?php
/*
 * Class for language control.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */

    namespace Curator\Classes;

    use \Curator\Config\LANG as LANG;
    use \Curator\Config\PATH as PATH;

    class Language
    {
        public function __construct()
        {

        }

        public static function loadClassLanguage($className)
        {
            if($className != 'Language')
            {
                $classLanguagePath = PATH\LANG . '/' . LANG\CHOICE . '/class/' . $className . '.php';

                if(file_exists($classLanguagePath))
                {
                    require_once $classLanguagePath;
                }
            }
        }
    }
?>