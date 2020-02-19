<?php

class FileHelper{

    private static $_PATH_TO_FILE = _ROOT_DIR_.'/files/';

    public static function getContentFile(string $fileName):string {
        if (!file_exists(self::$_PATH_TO_FILE.$fileName)){
            return '';
        }

        return file_get_contents(self::$_PATH_TO_FILE.$fileName);
    }

    public static function saveContentToFile(string $file, $content = ''): bool {
        $fp = fopen(self::$_PATH_TO_FILE.$file, 'w');
        $return = fwrite($fp, $content);
        fclose($fp);
        return (bool)$return;
    }
}