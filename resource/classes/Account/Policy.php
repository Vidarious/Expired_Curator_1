<?php
/*
 * Class for account rule enforcement.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Classes\Account;

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL));
        die();
    }

    use \Curator\Config\PATH                                  as PATH;
    use \Curator\Classes\Language\Policy                      as LANG;
    use \Curator\Classes\Language\Policy\PASSWORD\POLICY\SHOW as SHOW;
    use \Curator\Config\ACCOUNT\FIELD\SETTING                 as RULE;
    use \Curator\Traits                                       as TRAITS;

    //Include the Field language error messaging file.
    require_once(PATH\ROOT . 'resource/locale/' . \Curator\Config\LANG\CURATOR_APPLICATION . '/class/Policy.php');

    //Include password trait file.
    require_once(PATH\ROOT . 'resource/traits/Password.php');

    class Policy
    {
        //Class Variables
        private $SQL              = NULL;
        private $Form             = NULL;
        public  $error            = FALSE;
        public  $Email            = array();
        public  $Email_Confirm    = array();
        public  $Password         = array();
        public  $Password_Confirm = array();
        public  $Username         = array();
        public  $Given_Name       = array();
        public  $Family_Name      = array();
        public  $Preferred_Name   = array();
        public  $Title            = array();
        public  $Gender           = array();
        public  $Date_Of_Birth    = array();
        public  $Phone            = array();
        public  $Address_Label    = array();
        public  $Address_Line_1   = array();
        public  $Address_Line_2   = array();
        public  $Address_Line_3   = array();
        public  $Address_City     = array();
        public  $Address_Province = array();
        public  $Address_Postal   = array();
        public  $Address_Country  = array();

        //Object initalization. Call parent constructor to gain access to class methods and variables/objects
        public function __construct($Form)
        {
            //TEST VARIABLES
            $_POST['Email'] = 'jdruhan.home@gmail.com';
            $_POST['Email_Confirm'] = 'jdruhan.home@gmail.com';
            $_POST['Password'] = 'aA1!tes3pass3wordt';
            $_POST['Password_Confirm'] = 'aA1!tes3pass3wordt';

            $this->Form = $Form;
            $this->SQL  = new \Curator\Classes\Database\SQL();
        }

        //Check all form fields to ensure the user data falls within the rules.
        //REQUIRES: $Form->whitelist.
        public function checkRules()
        {
            if(in_array('Email', $this->Form->whitelist))
            {
                self::checkEmail();
            }

            if(in_array('Email_Confirm', $this->Form->whitelist))
            {
                self::checkEmailConfirm();
            }

            if(in_array('Password', $this->Form->whitelist))
            {
                self::checkPassword();
            }

            if(in_array('Password_Confirm', $this->Form->whitelist))
            {
                self::checkPasswordConfirm();
            }

            if(in_array('Username', $this->Form->whitelist))
            {
                self::checkUsername();
            }

            if(in_array('Given_Name', $this->Form->whitelist))
            {
                self::checkGivenName();
            }

            if(in_array('Family_Name', $this->Form->whitelist))
            {
                self::checkFamilyName();
            }

            if(in_array('Preferred_Name', $this->Form->whitelist))
            {
                self::checkPreferredName();
            }

            if(in_array('Title', $this->Form->whitelist))
            {
                self::checkTitle();
            }

            if(in_array('Gender', $this->Form->whitelist))
            {
                self::checkGender();
            }

            if(in_array('Date_Of_Birth', $this->Form->whitelist))
            {
                self::checkDateOfBirth();
            }

            if(in_array('Phone', $this->Form->whitelist))
            {
                self::checkPhone();
            }

            if(in_array('Address_Label', $this->Form->whitelist))
            {
                self::checkAddressLabel();
            }

            if(in_array('Address_Line_1', $this->Form->whitelist))
            {
                self::checkAddressLine1();
            }

            if(in_array('Address_Line_2', $this->Form->whitelist))
            {
                self::checkAddressLine2();
            }

            if(in_array('Address_Line_3', $this->Form->whitelist))
            {
                self::checkAddressLine3();
            }

            if(in_array('Address_City', $this->Form->whitelist))
            {
                self::checkAddressCity();
            }

            if(in_array('Address_Province', $this->Form->whitelist))
            {
                self::checkAddressProvince();
            }

            if(in_array('Address_Postal', $this->Form->whitelist))
            {
                self::checkAddressPostal();
            }

            if(in_array('Address_Country', $this->Form->whitelist))
            {
                self::checkAddressCountry();
            }

            return $this->error;
        }

        //Check email field against Curator fields.
        public function checkEmail()
        {
            $this->Email['Value']   = NULL;
            $this->Email['Message'] = NULL;

            //Confirm value exists.
            if(empty($_POST['Email']))
            {
                $this->Email['Message'] = LANG\EMAIL\MISSING;
                $this->error            = TRUE;

                return FALSE;
            }

            //Confirm e-mail is a valid format.
            if(filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL) === FALSE)
            {
                $this->Email['Message'] = LANG\EMAIL\INVALID;
                $this->error            = TRUE;

                return FALSE;
            }

            $this->Email['Value'] = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);

            return TRUE;
        }

        //Check email confirm field against Curator fields.
        public function checkEmailConfirm()
        {
            $this->Email_Confirm['Value']   = NULL;
            $this->Email_Confirm['Message'] = NULL;

            if($this->Email['Value'] !== NULL)
            {
                //Confirm e-mail and e-mail confirm fields match.
                if($this->Email['Value'] !== filter_var($_POST['Email_Confirm'], FILTER_SANITIZE_EMAIL))
                {
                    $this->Email_Confirm['Message'] = LANG\EMAIL_CONFIRM\MISMATCH;
                    $this->error                    = TRUE;
    
                    return FALSE;
                }
    
                $this->Email_Confirm['Value'] = filter_var($_POST['Email_Confirm'], FILTER_SANITIZE_EMAIL);
    
            }

            return TRUE;
        }

        //Check password field against Curator fields.
        public function checkPassword()
        {
            $this->Password['Value']   = NULL;
            $this->Password['Message'] = NULL;

            //Confirm value exists.
            if(empty($_POST['Password']))
            {
                $this->Password['Message']       = LANG\PASSWORD\MISSING;
                $this->error                     = TRUE;
                $this->Password_Confirm['Value'] = NULL;

                return FALSE;
            }

            //Set min and max password length rule.
            if(!self::passwordExpression('/^(?=.{' . RULE\PASSWORD\MIN_LENGTH . ',' . RULE\PASSWORD\MAX_LENGTH . '}$).+$/', SHOW\LENGTH))
            {
                return FALSE;
            }


            //Set lower character requirement rule.
            if(RULE\PASSWORD\LOWER_CHAR)
            {
                if(!self::passwordExpression('/^(.*?[a-z]){' . RULE\PASSWORD\LOWER_CHAR . ',}.*$/', SHOW\LOWER_CHAR))
                {
                    return FALSE;
                }
            }

            //Set upper character requirement rule.
            if(RULE\PASSWORD\UPPER_CHAR)
            {
                if(!self::passwordExpression('/^(.*?[A-Z]){' . RULE\PASSWORD\UPPER_CHAR . ',}.*$/', SHOW\UPPER_CHAR))
                {
                    return FALSE;
                }
            }

            //Set number character requirement rule.
            if(RULE\PASSWORD\NUMBER)
            {
                if(!self::passwordExpression('/^(.*?\d){' . RULE\PASSWORD\NUMBER . ',}.*$/', SHOW\NUMBER_CHAR))
                {
                    return FALSE;
                }
            }

            //Set special character requirement rule.
            if(RULE\PASSWORD\SPECIAL_CHAR)
            {
                if(!self::passwordExpression('/^(.*?[^\w]|.*?[_]){' . RULE\PASSWORD\SPECIAL_CHAR . ',}.*$/', SHOW\SPECIAL_CHAR))
                {
                    return FALSE;
                }
            }

            //If word restriction is enabled, validate password against words.
            if(RULE\PASSWORD\WORD)
            {
                if($restricted = $this->SQL->checkRestrictedWord($_POST['Password']))
                {
                    $this->Password['Message']       = LANG\PASSWORD\POLICY;
                    $this->error                     = TRUE;
                    $this->Password_Confirm['Value'] = NULL;

                    if(RULE\PASSWORD\DISPLAY)
                    {
                        array_push($this->Form->formMessagesError, SHOW\GENERAL . '<li>' . SHOW\RESTRICTED_WORD . '<b>' . $restricted['word'] . '</b></li>');
                    }

                    return FALSE;
                }
            }

            $this->Password['Value'] = TRAITS\Password::encrypt($_POST['Password_Confirm']);

            return TRUE;
        }

        //Validate the password expression.
        public function passwordExpression($policy, $error)
        {
            if(filter_var($_POST['Password'], FILTER_VALIDATE_REGEXP, array( "options"=> array( "regexp" => $policy))) === FALSE)
            {
                $this->Password['Message']       = LANG\PASSWORD\POLICY;
                $this->error                     = TRUE;
                $this->Password_Confirm['Value'] = NULL;
            
                if(RULE\PASSWORD\DISPLAY)
                {
                    array_push($this->Form->formMessagesError, SHOW\GENERAL . '<li>' . $error . '</li>');
                }

                return FALSE;
            }

            return TRUE;
        }

        //Check password confirm field against Curator fields.
        public function checkPasswordConfirm()
        {
            $this->Password_Confirm['Value']   = NULL;
            $this->Password_Confirm['Message'] = NULL;

            if($this->Password['Message'] === NULL)
            {
                //Confirm password and password confirm fields match.
                if($_POST['Password_Confirm'] === $_POST['Password'])
                {
                    //Secure the password
                    $this->Password['Value'] = $this->Password_Confirm['Value'] = TRAITS\Password::encrypt($_POST['Password_Confirm']);

                    return TRUE;
                }

                $this->Password_Confirm['Message'] = $this->Password['Message'] = LANG\PASSWORD_CONFIRM\MISMATCH;
                $this->error                       = TRUE;
                $this->Password['Value']           = NULL;
            }

            return FALSE;
        }

        //Check username field against Curator fields.
        public function checkUsername()
        {
            $this->Username['Value']   = NULL;
            $this->Username['Message'] = NULL;

            //Confirm value exists.
            if(empty($_POST['Username']))
            {
                $this->Username['Message'] = LANG\USERNAME\MISSING;
                $this->error               = TRUE;

                return FALSE;
            }

            $policy = '/^[a-zA-Z0-9]*$/';

            //Confirm username matches policy (letters and numbers only).
            if(filter_var($_POST['Username'], FILTER_VALIDATE_REGEXP, array( "options"=> array( "regexp" => $policy))) === FALSE)
            {
                $this->Username['Message']       = LANG\USERNAME\INVALID;
                $this->error                     = TRUE;

                return FALSE;
            }

            return TRUE;
        }

        //Check given name field against Curator fields.
        public function checkGivenName()
        {
            
        }

        //Check family name field against Curator fields.
        public function checkFamilyName()
        {
            
        }

        //Check preferred name field against Curator fields.
        public function checkPreferredName()
        {
            
        }

        //Check title field against Curator fields.
        public function checkTitle()
        {
            
        }

        //Check gender field against Curator fields.
        public function checkGender()
        {
            
        }

        //Check date of birth field against Curator fields.
        public function checkDateOfBirth()
        {
            
        }

        //Check phone field against Curator fields.
        public function checkPhone()
        {
            
        }

        //Check address label field against Curator fields.
        public function checkAddressLabel()
        {
            
        }

        //Check address line 1 field against Curator fields.
        public function checkAddressLine1()
        {
            
        }

        //Check address line 2 field against Curator fields.
        public function checkAddressLine2()
        {
            
        }

        //Check address line 3 field against Curator fields.
        public function checkAddressLine3()
        {
            
        }

        //Check address city field against Curator fields.
        public function checkAddressCity()
        {
            
        }

        //Check address province field against Curator fields.
        public function checkAddressProvince()
        {
            
        }

        //Check address postal field against Curator fields.
        public function checkAddressPostal()
        {
            
        }

        //Check address country field against Curator fields.
        public function checkAddressCountry()
        {
            
        }
    }
?>