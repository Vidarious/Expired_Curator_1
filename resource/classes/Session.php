<?php
 /*
 * Class for session control. Singleton design. There can only be one instance of this class.
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
        header("Location: " . "http://" . $_SERVER['HTTP_HOST']);
    }

    use \Curator\Config\SESSION as SESSION;
    use \Curator\Traits\Security as SECURITY;
    use \Curator\Classes\Language\Session as LANG;

    require_once(\Curator\Config\PATH\ROOT . 'resource/language/' . \Curator\Config\LANG\CURATOR_APPLICATION . '/class/Session.php');

    class Session
    {
        //Class Variables
        private $userIP = NULL;
        private $Cookie = NULL;

        public $test = array();

        //Object initalization. Singleton design.
        protected function __construct($Cookie = NULL)
        {
            if(!isset($Cookie))
            {
                $logMessage = new \Curator\Application\Log(__CLASS__, __METHOD__);
                $logMessage->saveError(LANG\ERROR_COOKIE);
            }

            $this->Cookie = $Cookie;

            //Setup the session configuration details.
            self::setupSession();

            //Start the session.
            session_start();

            //Secure the session.
            self::secureSession();
        }

        //Singleton design.
        private function __clone()
        {}

        //Singleton design.
        private function __wakeup()
        {}

        //Returns the singleton instance of the session class. Singleton design.
        public static function getSession($Cookie = NULL)
        {
            static $sessionInstance = NULL;

            if($sessionInstance === NULL)
            {
                $sessionInstance = new static($Cookie);
            }

            return $sessionInstance;
        }

        //Set all session configuration settings.
        protected function setupSession()
        {
            //Set session settings.
            ini_set('session.use_cookies',             1);
            ini_set('session.use_only_cookies',        1);
            ini_set('session.cookie_lifetime',         0);
            ini_set('session.cookie_httponly',         1);
            ini_set('session.use_trans_sid',           0);
            ini_set('session.use_strict_mode',         1);
            ini_set('session.entropy_length',          32);
            ini_set('session.hash_bits_per_character', 5);
            ini_set('session.hash_function', SESSION\ENCRYPTION);

            session_name(SESSION\NAME);
        }

        //Secures the session from hijacking.
        protected function secureSession()
        {
            //Determines users IP.
            self::setIP();

            if(!isset($_SESSION['Curator_Status']) || !isset($_SESSION['Curator_Lang']) || !self::confirmTimeOut() || !self::confirmUser() || !self::confirmIP())
            {
                //Secure check(s) failed. Create new session.
                self::newSession();
            }
            else
            {
                //Session is secure. See if the Session ID needs to be regenerated.
                self::tryRegenerate();
            }
        }

        //Confirms if users IP is same as the sessions user.
        protected function confirmIP()
        {
            //Check if IP Enforcement is enabled.
            if(SESSION\SETTING\ENFORCE_IP === TRUE)
            {
                $userKey = SECURITY::encode($this->userIP);

                if(!isset($_SESSION['Curator_userKey']) || ($_SESSION['Curator_userKey'] != $userKey))
                {
                    $this->test[] = "User IP check failed ...";
                    return FALSE;
                }
            }

            return TRUE;
        }

        //Confirms if users agent is same as the sessions user.
        protected function confirmUser()
        {
            if(SESSION\SETTING\ENFORCE_USERAGENT === TRUE)
            {
                $userAgent = SECURITY::encode($_SERVER['HTTP_USER_AGENT']);

                if(!isset($_SESSION['Curator_userAgent']) || ($_SESSION['Curator_userAgent'] != $userAgent))
                {
                    $this->test[] = "User agent check failed ...";
                    return FALSE;
                }
            }

            return TRUE;
        }

        //Session timeout management.
        protected function confirmTimeOut()
        {
            if(isset($_SESSION['Curator_idleTime']))
            {
                $idleLength = time() - $_SESSION['Curator_idleTime'];

                if($idleLength < SESSION\TIMEOUT)
                {
                    //***
                    $_SESSION['Curator_idleTime2'] = $_SESSION['Curator_idleTime']; //TESTING ONLY. DELETE LATER.
                    //***
                    $_SESSION['Curator_idleTime'] = time();
                    return TRUE;
                }
            }
            $this->test[] = "Timeout failed .. Last idle time: " . date("i:s", time() - $_SESSION['Curator_idleTime']);

            return FALSE;
        }

        //Initialize new session data.
        protected function newSession()
        {
            //Destroy cookie, session and setup new cookie & session.
            $this->Cookie->destroyCookies();
            $this->Cookie->setupCookies();

            self::killSession();
            self::setupSession();

            session_start();

            if(SESSION\SETTING\ENFORCE_IP === TRUE)
            {
                $_SESSION['Curator_userKey'] = hash(SESSION\ENCRYPTION, $this->userIP . SESSION\IDENTIFIER);
            }

            if(SESSION\SETTING\ENFORCE_USERAGENT === TRUE)
            {
                $_SESSION['Curator_userAgent'] = SECURITY::encode($_SERVER['HTTP_USER_AGENT']);
            }

            $_SESSION['Curator_startTime'] = $_SESSION['Curator_idleTime'] = $_SESSION['Curator_regenTime'] = time();
            $_SESSION['Curator_Status']    = TRUE;
            $_SESSION['Curator_Lang']      = \Curator\Config\LANG\CURATOR_USER_DEFAULT;

            $this->test[] = "New session started ...";
            $_SESSION['MESSAGE'] = $this->test;
        }

        //Destroy old session.
        protected function killSession()
        {
            session_unset();
            session_destroy();
            session_write_close();

            $_SESSION = array();
        }

        //Two trys to regenerate Session ID for added security. Both configurable by admin
        protected function tryRegenerate()
        {
            if(!self::regenerateTime())
            {
                self::regeneratePercent();
            }
        }

        //Regenerate Session ID based on admin set time length. Regenerates every XXX seconds.
        protected function regenerateTime()
        {
            if(SESSION\ID\REGENERATE\TIME\ENFORCE === TRUE)
            {
                //Last time the session ID was regenerated.
                $regenLength = time() - $_SESSION['Curator_regenTime'];

                //Check if the last regenerated time has exceeded the admin setting.
                if($regenLength > SESSION\ID\REGENERATE\TIME)
                {
                    session_regenerate_id(TRUE);
                    $_SESSION['Curator_regenTime'] = time();
                    $_SESSION['MESSAGE'][0] = "\nSession time exceeded .. Generated new ID ...";
                    return TRUE;
                }
            }
        }

        //Regenerate Session ID every X% of the time which is admin set.
        protected function regeneratePercent()
        {
            if(SESSION\ID\REGENERATE\PERCENT\ENFORCE === TRUE)
            {
                //Generate the random chance <Admin Value 1 - 100) out of 100.
                if(($test = mt_rand(0,100)) <= SESSION\ID\REGENERATE\PERCENT)
                {
                    session_regenerate_id(TRUE);
                    $_SESSION['MESSAGE'][0] = "5% hit! Regenerated new ID ...";
                }
                //****
                $_SESSION['RandomTEST'] = $test; //TESTING ONLY
                //****
            }
        }

        //Determine and validate the users IP.
        protected function setIP()
        {
            if(!empty($_SERVER['HTTP_CLIENT_IP']))
            {
                $this->userIP = SECURITY::validateIP($_SERVER['HTTP_CLIENT_IP']);
            }
            else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ipString = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $ip       = trim($ipString[count($ipString) - 1]);

                $this->userIP = SECURITY::validateIP($ip);
            }
            else
            {
                $this->userIP = SECURITY::validateIP($_SERVER['REMOTE_ADDR']);
            }

            return($this->userIP);
        }

        //Return a Session class variable.
        public function __get($property)
        {
            if(property_exists($this, $property))
            {
                return $this->$property;
            }
        }

        //Returns the requested session value.
        public static function getValue($variable = NULL)
        {
            if(isset($_SESSION[$variable]))
            {
                return $_SESSION[$variable];
            }
        }

        //Sets the requested session value.
        public static function setValue($variable = NULL, $value = NULL)
        {
            if(isset($variable))
            {
                if(!isset($value))
                {
                    unset($_SESSION[$variable]);
                }
                else
                {
                    $_SESSION[$variable] = $value;
                }
            }
        }
    }
?>