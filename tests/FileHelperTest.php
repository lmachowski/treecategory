<?php
declare(strict_types=1);
require_once('./configuration/config.php');

use PHPUnit\Framework\TestCase;

final class FileHelperTest extends TestCase
{
    public function testSaveContentToFile(): void {

        $fileName = time().'.txt';
        $contentFile = 'test123';
        FileHelper::saveContentToFile($fileName, $contentFile);
        $content = file_get_contents(_ROOT_DIR_.'/files/'.$fileName);
        unlink(_ROOT_DIR_.'/files/'.$fileName);
        $this->assertEquals(
            $contentFile,
            $contentFile,
            $content
        );
    }

    public function testGetContentToFile(): void {

        $fileName = time().'.txt';
        $contentFile = 'test123';

        $fp = fopen(_ROOT_DIR_.'/files/'.$fileName, 'w');
        fwrite($fp, $contentFile);
        fclose($fp);

        $content = FileHelper::getContentFile($fileName);
        unlink(_ROOT_DIR_.'/files/'.$fileName);

        $this->assertEquals(
            $contentFile,
            $content
        );
    }
}