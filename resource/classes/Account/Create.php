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

    use \Curator\Config\PATH as PATH;
    use \Curator\Classes     as CLASSES;

    class Create
    {
        private $Form   = NULL;
        private $Policy = NULL;

        //Object initalization.
        public function __construct()
        {
            //Create form object for form functionality.
            $this->Form = new CLASSES\Form('Create_Account');

            //Check if a form was posted and validate it.
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                var_dump($_POST);

                self::processForm();
            }
        }

        //Process account creation form.
        private function processForm()
        {
            //Validate the form passed The Curator's safety procedures.
            if(!$this->Form->validate())
            {
                array_push($this->Form->formMessagesError, CLASSES\Language\Form\MESSAGE\ERROR_GENERAL);

                return FALSE;
            }

            //Verify the form is not being flooded
            if($this->Form->checkFormFlood(\Curator\Config\ACCOUNT\FLOOD_DELAY))
            {
                array_push($this->Form->formMessagesError, CLASSES\Language\Form\MESSAGE\FLOOD);

                return FALSE;
            }

            //Initialize the Rules class for field validation.
            $this->Policy = new Policy();

            //Check the user field data against Curator rules.
            if($this->Policy->checkRules($this->Form->whitelist))
            {
                array_push($this->Form->formMessagesError, CLASSES\Language\Form\MESSAGE\ERROR_FIELD);

                return FALSE;
            }

            array_push($this->Form->formMessagesSuccess, 'Account Created.');

            //Since the account was created set up the form flood protection.
            $this->Form->setFormFlood();

            return TRUE;
                
                //Validate each field one at a time.
                    //If its a required field it must have data
                    //Ensure the data in the field matches the field.
                    //Ensure the rules for each field are met.

                //Verify if account already exists.

                //Create account

                //Start authorization process
        }

        //Inject account creation form.
        public function Form()
        {
            include(PATH\FORMS . 'Account_Create.php');
        }
    }
?>