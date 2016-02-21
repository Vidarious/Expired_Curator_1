<?php
/*
 * en_CA language file for Curator Field class. Contains all user visable messaging.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Classes\Language\Field;

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL));
        die();
    }
    define('Curator\Classes\Language\Field\EMAIL\MISSING', 'Missing e-mail address.');
    define('Curator\Classes\Language\Field\EMAIL\INVALID', 'Invalid e-mail address.');

    define('Curator\Classes\Language\Field\EMAIL_CONFIRM\MISMATCH', 'E-mail addresses do not match.');
?>