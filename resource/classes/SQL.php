<?php
 /*
 * Class for SQL statements.
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

    class SQL
    {
        //Class Objects.
        public $Database = NULL;

        public function __construct()
        {
            $this->Database = \Curator\Classes\Database::getConnection();
        }
    }
?>