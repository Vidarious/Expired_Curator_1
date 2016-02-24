<?php
 /*
 * Curator trait file for Curator Policy related traits.
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
        header("Location: " . "http://" . filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL));
        die();
    }

    use \Curator\Config\ACCOUNT\FIELD\SETTING as RULE;

    trait Policy
    {
        //Generate the password rule policy.
        public function getPolicy_Password()
        {
            //Set min and max password length rule.
            $policy = '/^(?=.{' . RULE\PASSWORD\MIN_LENGTH . ',' . RULE\PASSWORD\MAX_LENGTH . '}$)';

            //Set lower character requirement rule.
            if(RULE\PASSWORD\LOWER_CHAR)
            {
                $policy .= '(?=.*[a-z])';
            }

            //Set upper character requirement rule.
            if(RULE\PASSWORD\UPPER_CHAR)
            {
                $policy .= '(?=.*[A-Z])';
            }

            //Set number character requirement rule.
            if(RULE\PASSWORD\NUMBER)
            {
                $policy .= '(?=.*\d)';
            }

            //Set special character requirement rule.
            if(RULE\PASSWORD\SPECIAL_CHAR)
            {
                $policy .= '(?=.*(_|[^\w]))';
            }

            $policy .= '.+$/';

            return $policy;
        }
    }
 ?>