<?php
/*
 * Class for processing all communication to the SQL database. Singleton design. There can only be one instance of this class.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Classes;

    use \Curator\Config\DB                 as DB;
    use \Curator\Classes\Language\Database as LANG;

    //Include database configuration & language data.
    require_once(\Curator\Config\PATH\CONFIG . 'database.php');

    class Database
    {
        //Class Objects
        private $Connection = NULL;
        public $Language    = NULL;

        //Class Variables
        private $preparedStatement = NULL;

        //Object initalization. Singleton design.
        protected function __construct()
        {
            //Obtain the language object and load the database language file for messages.
            $this->Language = \Curator\Classes\Language::getLanguage();
            $this->Language->loadClassLanguage(__CLASS__);

            $pdoServerString = 'mysql:host=' . DB\HOST . ';dbname=' . DB\NAME;
            $pdoOptionString = array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);

            try
            {
                $this->Connection = new \PDO($pdoServerString, DB\USER, DB\PASS, $pdoOptionString);
            }
            catch(PDOException $pdoError)
            {
                $logMessage = new \Curator\Application\Log(__CLASS__, __METHOD__);
                $logMessage->saveError(LANG\ERROR_CONNECT . $pdoError);
            }
        }

        //Singleton design.
        private function __clone()
        {}

        //Singleton design.
        private function __wakeup()
        {}

        //Returns the singleton instance of the database connection. Singleton design.
        public static function getConnection()
        {
            static $pdoInstance = NULL;
            
            if($pdoInstance === NULL)
            {
                $pdoInstance = new static();
            }

            return $pdoInstance;
        }

        //Prepares SQL query using PDO.
        public function prepareStatement($statement = NULL)
        {
            if(!empty($statement))
            {
                $this->preparedStatement = $this->Connection->prepare($statement);
                
                if($this->preparedStatement == FALSE)
                {
                    $logMessage = new \Curator\Application\Log(__CLASS__, __METHOD__);
                    $logMessage->saveError(LANG\ERROR_PREPARE . $statment);
                }
            }
        }

        //Binds value to parameter with the passed type.
        public function bindValue($parameter = NULL, $value = NULL, $type = NULL)
        {
            if(!empty($parameter) && !empty($value))
            {
                if(empty($type))
                {
                    $type = self::getType($value);
                }
                
                if(!$this->preparedStatement->bindValue($parameter, $value, $type))
                {
                    $logMessage = new \Curator\Application\Log(__CLASS__, __METHOD__);
                    $logMessage->saveError(LANG\ERROR_BIND . 'Parameter: ' . $parameter . ', Value: ' . $value . ', Type: ' . $type);
                }
            }
        }

        //Determine the type of the value (INT/BOOL/STR) and return.
        private function getType($value = NULL)
        {
            switch(TRUE)
            {
                case is_int($value) :
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }

            return $type;
        }

        //Execute the PDO prepared statement.
        public function executeQuery()
        {
            if(empty($this->preparedStatement) || empty($this->preparedStatement->execute()))
            {
                $logMessage = new \Curator\Application\Log(__CLASS__, __METHOD__);
                $logMessage->saveError(LANG\ERROR_EXECUTE);
            }
        }

        //Executes a SQL query (SELECT) and returns a single row.
        public function getResultSingle()
        {
            return($this->preparedStatement->fetch(\PDO::FETCH_ASSOC));
        }

        //Executes a SQL query (SELECT) and returns many rows.
        public function getResultMany()
        {
            return($this->preparedStatement->fetchAll(\PDO::FETCH_ASSOC));
        }

        //Executes a SQL query (SELECT) and returns a single column item with $row representing which result row.
        public function getResultColumn($row = NULL)
        {
            return($this->preparedStatement->fetchColumn($row));
        }

        //Returns the row count for the executed query result.
        public function getRowCount()
        {
            return($this->preparedStatement->rowCount());
        }

        //Returns the row ID of the previously inserted record.
        public function getInsertedID()
        {
            return($this->Connection->lastInsertId());
        }
    }
?>