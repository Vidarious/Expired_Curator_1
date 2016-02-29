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
    namespace Curator\Classes\Language\Policy;

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL));
        die();
    }

    use Curator\Config\ACCOUNT\FIELD\SETTING\PASSWORD AS PASSWORD;

    define('Curator\Classes\Language\Policy\EMAIL\MISSING', 'E-mail is required.');
    define('Curator\Classes\Language\Policy\EMAIL\INVALID', 'Invalid e-mail address.');

    define('Curator\Classes\Language\Policy\EMAIL_CONFIRM\MISMATCH', 'E-mail addresses do not match.');

    define('Curator\Classes\Language\Policy\PASSWORD\MISSING', 'Password is required.');
    define('Curator\Classes\Language\Policy\PASSWORD\POLICY', 'Password does not meet requirements.');

    define('Curator\Classes\Language\Policy\PASSWORD_CONFIRM\MISMATCH', 'Passwords do not match.');

    define('Curator\Classes\Language\Policy\PASSWORD\POLICY\SHOW\GENERAL', 'Password Policy:');
    define('Curator\Classes\Language\Policy\PASSWORD\POLICY\SHOW\LENGTH', 'Must contain between ' . PASSWORD\MIN_LENGTH . ' and ' . PASSWORD\MAX_LENGTH . ' characters in length');
    define('Curator\Classes\Language\Policy\PASSWORD\POLICY\SHOW\UPPER_CHAR', 'Must contain at least ' . PASSWORD\UPPER_CHAR . ' upper-case character(s)');
    define('Curator\Classes\Language\Policy\PASSWORD\POLICY\SHOW\LOWER_CHAR', 'Must contain at least ' . PASSWORD\LOWER_CHAR . ' lower-case character(s)');
    define('Curator\Classes\Language\Policy\PASSWORD\POLICY\SHOW\SPECIAL_CHAR', 'Must contain at least ' . PASSWORD\SPECIAL_CHAR . ' special character(s)');
    define('Curator\Classes\Language\Policy\PASSWORD\POLICY\SHOW\NUMBER_CHAR', 'Must contain at least ' . PASSWORD\NUMBER . ' number(s)');

?>