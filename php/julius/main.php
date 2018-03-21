<?php
    $host = 'localhost';
    $port = 10500;
    $ip = gethostbyname($host);
    
    try {
        // juliusサーバーに接続
        if (($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
            throw new Exception('socket_create error!');
        }
        if (socket_connect($socket, $ip, $port) === false) {
            throw new Exception('socket_connect error!');
        }
        
        $result = '';
        while (true) {
            if (strpos($result, '</RECOGOUT>') !== false) {
                $analysis = '';
                foreach (explode(PHP_EOL, $result) as $line) {
                    $pattern = '/WORD="(.*)" CLASSID=/';
                    if (preg_match($pattern, $line, $lineWord)) {
                        $analysis .= $lineWord[1];
                    }
                }

                echo $analysis . PHP_EOL;
                $result = '';
            } else {
                if (($result .= socket_read($socket, 1024)) === false) {
                    throw new Exception('socket_read error!');
                }
            }
        }

        echo 'success!' . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
?>
