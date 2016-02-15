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
        //Object initalization. Call parent constructor to gain access to class methods and variables/objects
        public function __construct($Form)
        {
            //Assign the $Form object passed to the \Curator\Account\ object (inherited).
            $this->Form = $Form;

            var_dump($_POST);

            self::processForm();
        }

        //Process account creation form.
        private function processForm()
        {
            //Check if a form was posted and validate it.
            if(!empty($_POST) && $this->Form->validate('Create_Account', 'username'))
            {
                //Validate POST fields.

                //Validate each field one at a time.
                    //If its a required field it must have data
                    //Ensure the data in the field matches the field.
                    //Ensure the rules for each field are met.

                //Verify if account already exists.

                //Create account

                //Start authorization process
            }
            else
            {
                //Generate page error indicating form submission failed (form wasn't validated).
                echo "Form type passed was not the same as the form processed";
            }
        }
    }
?>