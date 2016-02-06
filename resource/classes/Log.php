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

    //Deny direct access to file.
    if(!defined('Curator\Config\APPLICATION'))
    {
        header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
    }

    use \Curator\Config\PATH as PATH;
    use \Curator\Classes\Language\Log as LANG;

class Log
{
    //Class Variables
    public $className   = NULL;
    public $methodName  = NULL;
    public $logPath     = NULL;
    public $logMessage  = NULL;
    public $Language    = NULL;

    //Object initialization. Sets the object variables for class and method.
    public function __construct($className = NULL, $methodName = NULL)
    {
        //Obtain the language object and load the log language file for messages.
        $this->Language   = \Curator\Classes\Language::getLanguage();
        $this->Language->loadClassLanguage(__CLASS__);
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
        $messageFinal[] = PHP_EOL . LANG\HEAD_DATE    . ": " . date('F d, Y \a\t g:i A e',$_SERVER['REQUEST_TIME']);
        $messageFinal[] = PHP_EOL . LANG\HEAD_ADDRESS . ": " . $_SERVER['REMOTE_ADDR'];
        $messageFinal[] = PHP_EOL . LANG\HEAD_URI     . ": " . $_SERVER['REQUEST_URI'];
        $messageFinal[] = PHP_EOL . LANG\HEAD_CLASS   . ": " . $this->className;
        $messageFinal[] = PHP_EOL . LANG\HEAD_METHOD  . ": " . $this->methodName;
        $messageFinal[] = PHP_EOL . LANG\HEAD_MESSAGE . ": " . $this->logMessage;

        //Write to log.
        error_log(PHP_EOL . "**********", 3, $this->logPath);

        foreach($messageFinal as $error)
        {
            error_log($error, 3, $this->logPath);
        }

        error_log(PHP_EOL . "**********", 3, $this->logPath);

        die('<H3>' . LANG\ERROR_HEADER . '</H3> <P>' . LANG\ERROR_BODY . '</P><P>' . LANG\ERROR_FOOTER);
    }
}
 ?>