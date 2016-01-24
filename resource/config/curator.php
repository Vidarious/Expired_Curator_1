<?php
/*
 * Variable file for Curator configuation data.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */

   namespace Curator\Config;

   //Server path to where Curator is installed / extracted.
   define('Curator\Config\PATH\ROOT', $_SERVER["DOCUMENT_ROOT"] . '/Curator/'); //Cloud9

   //Directory path to where Curator classes are located.
   define('Curator\Config\PATH\CLASSES', PATH\ROOT . 'resource/classes/');

   //Directory path to where Curator configuration files are located.
   define('Curator\Config\PATH\CONFIG', PATH\ROOT . 'resource/config/');

   //Directory path to where Curator language tables are located.
   define('Curator\Config\PATH\LANG', PATH\ROOT . 'resource/language');

   //Curator language.
   define('Curator\Config\LANG\CHOICE', 'en_CA');
?>