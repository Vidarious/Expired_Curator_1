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

    //Directory path to where Curator error log file is located.
    define('Curator\Config\PATH\LOG\ERROR', PATH\ROOT . 'application/logs/errors.log');

    //Directory path to where Curator warning log file is located.
    define('Curator\Config\PATH\LOG\WARNING', PATH\ROOT . 'application/logs/warnings.log');

    //Curator language.
    define('Curator\Config\LANG\CURATOR_DEFAULT', 'en_CA');

    //Host address for SQL database.
    define('Curator\Config\DB\HOST', 'sql5.freemysqlhosting.net'); //Cloud9

    //Database name for SQL database.
    define('Curator\Config\DB\NAME', 'sql5103939');

    //Username for SQL database.
    define('Curator\Config\DB\USER', 'sql5103939');

    //Password for SQL database.
    define('Curator\Config\DB\PASS', 'zaiR6VzmI5');

    //Site unique identifier.
    define('Curator\Config\SESSION\IDENTIFIER', '!)1@(4#*$&5%^AoB3br3kZ1');

    //Session timeout period (seconds).
    define('Curator\Config\SESSION\TIMEOUT', '600');

    //Setting for enforcing consistant IP for sessions. May cause issue with TOR users. 1: Enforce 0: Disable.
    define('Curator\Config\SESSION\SETTING\ENFORCEIP', '1');

    //Session encryption algorithm.
    define('Curator\Config\SESSION\ENCRYPTION', 'sha512');

    //Session regenerate time.
    define('Curator\Config\SESSION\ID\REGENERATE\TIME', '300');

    //Session regenerate %. Value should be 1-100.
    define('Curator\Config\SESSION\ID\REGENERATE\PERCENT', '5');
?>