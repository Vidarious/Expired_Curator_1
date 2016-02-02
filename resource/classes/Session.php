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

    use \Curator\Config\SESSION as SESSION;
    use \Curator\Traits\Security as SECURITY;

    //Load traits.
    require_once('../resource/helper/Security.php');

    class Session
    {
        //use \Curator\Traits\Security;

        //Object initalization. Singleton design.
        protected function __construct()
        {
            self::sessionSetup();

            session_start();

            self::secureSession();
        }

        //Singleton design.
        private function __clone()
        {}

        //Singleton design.
        private function __wakeup()
        {}

        //Returns the singleton instance of the session class. Singleton design.
        public static function getSession()
        {
            static $sessionInstance = NULL;

            if($sessionInstance === NULL)
            {
                $sessionInstance = new static();
            }

            return $sessionInstance;
        }

        //Set all session configuration settings.
        protected function sessionSetup()
        {
            //Set session settings.
            ini_set('session.cookie_lifetime',         0);
            ini_set('session.use_trans_sid',           0);
            ini_set('session.use_cookies',             1);
            ini_set('session.use_only_cookies',        1);
            ini_set('session.use_strict_mode',         1);
            ini_set('session.cookie_httponly',         1);
            ini_set('session.entropy_length',          32);
            ini_set('session.hash_bits_per_character', 5);
            ini_set('session.hash_function', SESSION\ENCRYPTION);

            session_name('Curator_Session');

            //Determine if server is running HTTPS.
            $secureServer = NULL;
            $secureServer = isset($_SERVER['HTTPS']);

            //Configure session cookie.
            session_set_cookie_params(0, '/', $_SERVER['SERVER_NAME'], $secureServer, TRUE);
        }

        //Secures the session from hijacking.
        protected function secureSession()
        {
            if(!isset($_SESSION['Curator_Status']) || !self::confirmTimeOut() || !self::confirmUser() || !self::confirmIP())
            {
                self::newSession();
                echo "test";
            }
            else
            {
                self::tryRegenerate();
            }
        }

        //Confirms if users IP is same as the sessions user.
        protected function confirmIP()
        {
            //Check if IP Enforcement is enabled.
            if(SESSION\SETTING\ENFORCEIP)
            {
                $userIP = SECURITY::Encode(self::obtainIP());

                if(!isset($_SESSION['Curator_userIP']) || ($_SESSION['Curator_userIP'] != $userIP))
                {
                    return FALSE;
                }
            }

            return TRUE;
        }

        //Confirms if users agent is same as the sessions user.
        protected function confirmUser()
        {
            $userAgent = SECURITY::Encode($_SERVER['HTTP_USER_AGENT']);

            if(isset($_SESSION['Curator_userAgent']) && ($_SESSION['Curator_userAgent'] === $userAgent))
            {
                return TRUE;
            }

            return FALSE;
        }

        //Session timeout management.
        protected function confirmTimeOut()
        {
            if(isset($_SESSION['Curator_startTime']) && isset($_SESSION['Curator_idleTime']))
            {
                $idleLength = $_SESSION['Curator_idleTime'] - $_SESSION['Curator_startTime'];

                if($idleLength < SESSION\TIMEOUT)
                {
                    $_SESSION['Curator_idleTime'] = time();
                    return TRUE;
                }
            }

            return FALSE;
        }

        //Initialize new session data.
        protected function newSession()
        {
            //Destroy cookie.
            $cookieParameters = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $cookieParameters['path'], $cookieParameters['domain'], $cookieParameters['secure'], $cookieParameters['httponly']);

            //Destroy old session.
            session_unset();
            session_destroy();
            $_SESSION = array();

            //Create new session.
            session_start();

            if(SESSION\SETTING\ENFORCEIP)
            {
                $_SESSION['Curator_userIP'] = hash(SESSION\ENCRYPTION, self::obtainIP() . SESSION\IDENTIFIER);
            }

            $_SESSION['Curator_userAgent'] = SECURITY::Encode($_SERVER['HTTP_USER_AGENT']);
            $_SESSION['Curator_startTime'] = $_SESSION['Curator_idleTime'] = $_SESSION['Curator_regenTime'] = time();
  
            $_SESSION['Curator_Status']    = TRUE;
            echo "New session started ... \n";
        }

        protected function tryRegenerate()
        {
            $sessionLength = time() - $_SESSION['Curator_regenTime'];

            if($sessionLength > SESSION\ID\REGENERATE\TIME)
            {
                session_regenerate_id(TRUE);
                $_SESSION['Curator_regenTime'] = time();
                echo "\nSession time exceeded .. Generated new ID ... \n";
            }
            else
            {
                if(($test = mt_rand(0,100)) <= SESSION\ID\REGENERATE\PERCENT)
                {
                    session_regenerate_id(TRUE);
                    echo "5% hit! Regenerated new ID ... \n";
                }
                echo 'Random Regen: ' . $test;
                
            }
        }

        protected function obtainIP()
        {
            if(!empty($_SERVER['HTTP_CLIENT_IP']))
            {
                return $_SERVER['HTTP_CLIENT_IP'];
            }
            else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            {
                $ipString = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                return trim($ipString[count($ipString) - 1]);
            }
            else
            {
                return $_SERVER['REMOTE_ADDR'];
            }
        }
    }
?>