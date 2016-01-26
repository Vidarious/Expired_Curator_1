<?php
/*
 * Class for handling log requests (errors and warnings).
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Application;

    use \Curator\Config\PATH as PATH;

class Log
{
    //Class Variables
    public $className   = NULL;
    public $methodName  = NULL;
    public $logPath     = NULL;
    public $logMessage     = NULL;

    //Object initialization. Sets the object variables for class and method.
    public function __construct($className = NULL, $methodName = NULL)
    {
        $this->className  = $className;
        $this->methodName = $methodName;
    }

    //Sets log message and error path then sends it to be written to log file.
    public function saveError($logMessage = 'N/A')
    {
           
        $this->logPath  = PATH\LOG\ERROR;
        $this->logMessage = $logMessage;
        self::writeLog();
    }

    //Sets log message and warning path then sends it to be written to log file.
    public function saveWarning($logMessage = 'N/A')
    {
        $this->logPath = PATH\LOG\WARNING;
        $this->logMessage = $logMessage;
        self::writeLog();
    }

    //Builds the log message and writes it to the correct log file.
    private function writeLog()
    {
        //Build log message
        $messageFinal[] = "\nDATE: " . date('F d, Y \a\t g:i A e',$_SERVER['REQUEST_TIME']);
        $messageFinal[] = "\nADDRESS: " . $_SERVER['REMOTE_ADDR'];
        $messageFinal[] = "\nURI: " . $_SERVER['REQUEST_URI'];
        $messageFinal[] = "\nCLASS: " . $this->className;
        $messageFinal[] = "\nMETHOD: " . $this->methodName;
        $messageFinal[] = "\nMESSAGE: " . $this->logMessage;

        //Write to log.
        error_log("\n**********", 3, $this->logPath);

        foreach($messageFinal as $error)
        {
            error_log($error, 3, $this->logPath);
        }

        error_log("\n**********", 3, $this->logPath);
    }
}
 ?>