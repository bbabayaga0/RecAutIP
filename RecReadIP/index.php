<?php

$ipv4 = '/^(\s*|.*\s+)(25[0-5]\.|2[0-4]\d\.|1\d\d\.|[1-9]\d\.|\d\.){3}(25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(\s*|\s+.*)$/';
$ipv6 = '/^(\s*|.*\s+)([0-9a-f]{4}:){7}[0-9a-f]{4}(\s*|\s +.*)$/i';
// 
function RecAutIP($ipv4, $ipv6){
    $filename = 'ip_here.txt';
$handle = fopen($filename, "r");
    if ($handle !== false) {
        while (!feof($handle)) {
            $content = fgets($handle);
            if (preg_match($ipv4, $content)) {
                $writi = fopen("ip_write.txt", "a");
                fwrite($writi, $content . "  " . "Корректный" . "\n");
                }

    if (preg_match($ipv6, $content)) {
        $writi = fopen("ip_write.txt", "a");
            fwrite($writi, $content ."  " . "Корректный" . "\n");
    } else {
        echo ' некорректный IP (' . $content . ') ';
    }
}
        fclose($handle); // закрываем файл после использования
    } else {
        echo 'Ошибка при открытии файла';
    }
}
RecAutIP($ipv4, $ipv6);
?>