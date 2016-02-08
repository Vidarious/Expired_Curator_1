<?php
 /*
 * Curator trait file for Encyption related traits.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Traits;

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
    }

    use \Curator\Config\SESSION as SESSION;

    trait Security
    {
        public function encode($value)
        {
            return(hash(SESSION\ENCRYPTION, $value . SESSION\IDENTIFIER));
        }

        public function validateIP($ip)
        {
            if((!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === FALSE) || (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === FALSE))
            {
                return $ip;
            }

            return 'N/A';
        }
    }
 ?>