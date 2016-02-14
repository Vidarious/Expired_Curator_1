<?php
/*
 * Class for account creation.
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

    class Create extends \Curator\Classes\Account
    {
        //Class Variables
        public $URI = NULL;

        //Class Objects
        public $Shield = NULL;

        //Object initalization. Singleton design.
        public function __construct()
        {
            $this->Shield = new \Curator\Classes\Shield();

            //Check if data was posted. If so, process it.
            if(isset($_POST) && isset($_POST['Create_Form']))
            {
                self::processForm();
            }

            //Generate URI for the form action.
            self::generateURI();

            //Generate and set secure form token.
            $this->Shield->setFormToken();

            dump($_POST);
        }

        //Process account create form.
        private function processForm()
        {
            //Check the validity of form.
            if($this->Shield->verifyForm("username"))
            {
                //Check form field requirements.
                //Check the validity of the data submitted.
                //Verify account does not already exist.
            }

            //Create account.
        }

        //Generates the POST URI for the account creation form.
        private function generateURI()
        {
            $requestScheme = 'http://';

            if(isset($_SERVER['HTTPS']))
            {
                $requestScheme = 'https://';
            }

            $this->URI = $requestScheme . filter_var($_SERVER['SERVER_NAME'], FILTER_SANITIZE_URL) . filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        }
    }
?>