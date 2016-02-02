<?php
 /*
 * Curator trait file for Encyption related traits.
 *
 * PHP Version 7.0.2
 *
 * @package    Curator
 * @author     James Druhan <jdruhan.home@gmail.com>
 * @copyright  2016 James Druhan
 * @version    1.0
 */
    namespace Curator\Traits;

    use \Curator\Config\SESSION as SESSION;

    trait Security
    {
        public function Encode($value)
        {
            return(hash(SESSION\ENCRYPTION, $value . SESSION\IDENTIFIER));
        }
    }
 ?>