<?php

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function testCorrectName()
    {
        self::assertSame("image_", (correctName([1 => ['name' => "image;"]], '/[^ \w\-\.]/'))[1]['name'] );
    }
    public function testCorrectNameFuncWillNotCorrectNormalNames()
    {
        self::assertSame("image", (correctName([1 => ['name' => "image"]], '/[^ \w\-\.]/'))[1]['name'] );
    }

    public function testCheckType()
    {
        $params =             [
            'count' => 5,
            'size' => 2000000,
            'type' => ['image/jpeg', 'image/jpg', 'image/png']
        ];

        checkType(['name' => "image", "type" => "image/jpg"], $params);
    }

    public function testCheckTypeWithError()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Загрузите другой формат файла');

        $params =             [
            'count' => 5,
            'size' => 2000000,
            'type' => ['image/jpeg', 'image/jpg', 'image/png']
        ];

        checkType(['name' => "image", "type" => "image/jpgdddd"], $params);
    }
}
