<?php
/*
 * fr_CA language file for Curator Session class. Contains all user visable messaging.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Classes\Language\Session;

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
    }

    define('Curator\Classes\Language\Session\ERROR_COOKIE', 'Erreur: Il n\'y avait pas objet cookie passé . S\'il vous plaît passer l\'objet conservateur de classe COOKIE.');
?>