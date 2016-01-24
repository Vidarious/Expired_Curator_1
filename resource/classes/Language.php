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
            $langDomain = 'messages';
            $langPath = PATH\LANG . '/' . LANG\CHOICE . '/LC_MESSAGES/' . $langDomain . '.mo';

            if(file_exists($langPath))
            {
                $test2 = putenv("LC_ALL=" . LANG\CHOICE);
                echo "\r\nputenv = " . $test2;
                $test = setlocale(LC_ALL, LANG\CHOICE);
                echo "\r\nsetlocale = " . $test;
    
                $test3 = bindtextdomain($langDomain, PATH\LANG);
                echo "\r\nbindtextdomain = " . $test2;
                $test4 = textdomain($langDomain);
                echo "\r\ntextdomain = " . $test2;
            }
            else
            {
                echo "Language file does not exist.";
            }
        }
    }
?>