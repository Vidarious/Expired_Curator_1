<?php
 /*
 * Class for page the Shield class for protecting forms.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Classes;

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL));
        die();
    }

    use \Curator\Traits as TRAITS;

    class Shield
    {
        //Class Objects
        private $Session   = NULL;
        public  $formToken = NULL;

        //Object initalization.
        public function __construct()
        {
            $this->Session = Session::getSession();
        }

        //Set secure form token.
        public function setFormToken()
        {
            self::generateToken();

            $this->Session->setValue('Curator_formToken', $this->formToken);
        }

        //Generate unique form token
        private function generateToken()
        {
            $this->formToken = md5(uniqid(microtime(), true));
        }

        //Check the validity of the posted form.
        public function verifyForm($invisibleCAPTCHA)
        {
            //Get the saved form session token.
            $sessionToken = $this->Session->getValue('Curator_formToken');

            //Check that the invisibleCAPTCHA is empty and tokens exist.
            if(empty($_POST[$invisibleCAPTCHA]) && isset($_POST['cToken']) && isset($sessionToken))
            {
                $postedToken  = filter_var($_POST['cToken'], FILTER_SANITIZE_ENCODED);

                //Confirm that the tokens match.
                if($this->Session->getValue('Curator_formToken') === $postedToken)
                {
                    return TRUE;
                }
            }

            //Form validation failed. Send use home.
            header("Location: " . "http://" . filter_var($_SERVER['HTTP_HOST'], FILTER_SANITIZE_URL));
            die();
        }
    }
?>