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

    use \Curator\Config\PATH            as PATH;
    use \Curator\Classes\Language\Field as LANG;

    //Include the Field language error messaging file.
    require_once(PATH\ROOT . 'resource/locale/' . \Curator\Config\LANG\CURATOR_APPLICATION . '/class/Field.php');

    class Field extends \Curator\Classes\Account\Form
    {
        //Class Variables
        public $error            = FALSE;
        public $Email            = array();
        public $Email_Confirm    = array();
        public $Password         = array();
        public $Password_Confirm = array();
        public $Username         = array();
        public $Given_Name       = array();
        public $Family_Name      = array();
        public $Preferred_Name   = array();
        public $Title            = array();
        public $Gender           = array();
        public $Date_Of_Birth    = array();
        public $Phone            = array();
        public $Address_Label    = array();
        public $Address_Line_1   = array();
        public $Address_Line_2   = array();
        public $Address_Line_3   = array();
        public $Address_City     = array();
        public $Address_Province = array();
        public $Address_Postal   = array();
        public $Address_Country  = array();

        //Object initalization. Call parent constructor to gain access to class methods and variables/objects
        public function __construct($Form)
        {
            parent::__construct();

            //Assign the current Form object to the Curator classes $Form varabie
            $this->Form = $Form;
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

            //Confirm e-mail and e-mail confirm fields match.
            if($this->Email['Value'] !== $_POST['Email_Confirm'])
            {
                $this->Email_Confirm['Message'] = LANG\EMAIL_CONFIRM\MISMATCH;
                $this->error                    = TRUE;

                return FALSE;
            }

            $this->Email_Confirm['Value'] = filter_var($_POST['Email_Confirm'], FILTER_SANITIZE_EMAIL);

            return TRUE;
        }

        //Check password field against Curator fields.
        public function checkPassword()
        {
            
        }

        //Check password confirm field against Curator fields.
        public function checkPasswordConfirm()
        {
            
        }

        //Check username field against Curator fields.
        public function checkUsername()
        {
            
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