<?php
 /*
 * Class for page account form processing.
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

    use \Curator\Config\PATH           as PATH;
    use \Curator\Classes\Language\Form as LANG;

    //Include the Form language error messaging file.
    require_once(PATH\ROOT . 'resource/locale/' . \Curator\Config\LANG\CURATOR_APPLICATION . '/class/Form.php');

    class Form extends \Curator\Classes\Account
    {
        //Object initalization. Call parent constructor to gain access to class methods and variables/objects.
        protected function __construct()
        {
            parent::__construct();
        }

        //Generates the POST URI for the account creation form.
        public function getActionURI()
        {
            $requestScheme = 'http://';

            if(isset($_SERVER['HTTPS']))
            {
                $requestScheme = 'https://';
            }

            return($requestScheme . filter_var($_SERVER['SERVER_NAME'], FILTER_SANITIZE_URL) . filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL));
        }

        //Set secure form token.
        public function assignToken()
        {
            return($this->Session->setValue('Curator_formToken', self::generateToken()));
        }

        //Generate unique form token
        private function generateToken()
        {
            return(md5(uniqid(microtime(), true)));
        }

        //Check the validity of the posted form. Accepts two variables.
        //$formName is the name or purpoase of the form. $invisibleCAPTCHA is the name of the fake field used to trick bots.
        public function validate($formType, $invisibleCAPTCHA)
        {
            //Verify the form type submitted matches the passed $formType..
            if(!empty($_POST['Form_Type']) && (filter_var($_POST['Form_Type'], FILTER_SANITIZE_ENCODED) == $formType))
            {
                //Verify if form type is valid
                //Verify Token
                //Verify Whitelist
                //Verify Invisible CAPTCHA

                //Get the saved form session token.
                $sessionToken = $this->Session->getValue('Curator_formToken');

                //Kill the session form token.
                $this->Session->setValue('Curator_formToken');

                //Validate the form token.
                if(empty($_POST[$invisibleCAPTCHA]) && isset($sessionToken))
                {
                    if($sessionToken == filter_var($_POST['cToken'], FILTER_SANITIZE_ENCODED))
                    {
                        echo "The form has been successfully validated.";
                        return TRUE;
                    }
                }

                self::throwHazard(__CLASS__, __METHOD__, $invisibleCAPTCHA, $sessionToken);
            }

            return FALSE;
        }

        //Validate the form invisible CAPTCHA
        private function verifyInvisibleCAPTCHA($invisibleCAPTCHA)
        {
            
        }

        //Validate the form token.
        private function verifyToken()
        {
            
        }

        //Validate the form whitelist.
        private function verifyWhitelist($formType)
        {
            
        }

        //Inject account creation form.
        public function Create()
        {
            include(PATH\FORMS . 'Account_Create.php');
        }

        //Throw hazard log
        private function throwHazard($class, $method, $invisibleCAPTCHA, $sessionToken)
        {
            //Form validation failed. Log and send user to root.
            $userIP = $CAPTCHA = $formToken = 'N/A';

            if(isset($_SERVER['REMOTE_ADDR']))
            {
                $userIP = filter_var($_SERVER['REMOTE_ADDR'], FILTER_SANITIZE_ENCODED);
            }
            if(isset($_POST[$invisibleCAPTCHA]))
            {
                $CAPTCHA = filter_var($_POST[$invisibleCAPTCHA], FILTER_SANITIZE_ENCODED);
            }
            if(isset($_POST['cToken']))
            {
                $formToken = filter_var($_POST['cToken'], FILTER_SANITIZE_ENCODED);
            }

            $logMessage = new \Curator\Application\Log(__CLASS__, __METHOD__);
            $logMessage ->saveHazard(LANG\HAZARD_VALIDATE .
                ' IP - '                  . $userIP .
                ' Invisible CAPTCHA - "'  . $CAPTCHA .
                '" Session Token - "'     . $sessionToken .
                '" Form Token - "'        . $formToken . '"');

            header("Location: " . "http://" . filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL));
            die();
        }
    }
?>