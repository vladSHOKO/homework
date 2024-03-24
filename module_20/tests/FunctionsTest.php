<?php

use PHPUnit\Framework\TestCase;

class  FunctionsTest extends TestCase
{
    public array $params = [
        'count' => 5,
        'size' => 2000000,
        'type' => ['image/jpeg', 'image/jpg', 'image/png']
    ];

    public function testCorrectName(): void
    {
        self::assertSame("image_", (correctName([1 => ['name' => "image;"]], '/[^ \w\-\.]/'))[1]['name']);
    }

    public function testCorrectNameFuncWillNotCorrectNormalNames(): void
    {
        self::assertSame("image", (correctName([1 => ['name' => "image"]], '/[^ \w\-\.]/'))[1]['name']);
    }

    public function testCheckType(): void
    {
        checkType(['name' => "image", "type" => "image/jpg"], $this->params);
    }

    public function testCheckTypeWithError(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Загрузите другой формат файла');

        checkType(['name' => "image", "type" => "image/jpgdddd"], $this->params);
    }

    public function testCheckSize(): void
    {
        checkSize(['size' => 2000], $this->params);
    }

    public function testCheckSizeWithError(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Слишком большой размер файла');

        checkSize(['size' => 9999999], $this->params);
    }

    public function testCheckEmptyWithError(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Загрузите хоть что-то');

        checkEmpty([['error' => 4]]);
    }

    public function testCheckMaxCount(): void
    {
        checkMaxCount([['name' => 'picture1'], ['name' => 'picture2'], ['name' => 'picture3']], $this->params);
    }

    public function testCheckMaxCountWithError(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Можно загрузить не более 5 файлов');

        checkMaxCount([['name' => 'picture1'], ['name' => 'picture2'], ['name' => 'picture3'], ['name' => 'picture4'], ['name' => 'picture5'], ['name' => 'picture6']], $this->params);
    }

    public function testPrepareImages(): void
    {
        $_FILES = ['myImage' => ['name' => ['picture1', 'picture2'], 'type' => ['type1', 'type2']]];
        self::assertSame([0 => ['name' => 'picture1', 'type' => 'type1'], 1 => ['name' => 'picture2', 'type' => 'type2']], prepareImages());
    }

    public function testArraySort(): void
    {
        self::assertSame([['title' => 'Название1', 'sort' => 1], ['title' => 'Название2', 'sort' => 2], ['title' => 'Название3', 'sort' => 3]], arraySort([['title' => 'Название2', 'sort' => 2], ['title' => 'Название3', 'sort' => 3], ['title' => 'Название1', 'sort' => 1]]));
    }

    public function testCutString(): void
    {
        self::assertSame('Hello...', cutString('HelloWorld', 5, '...'));
    }

    public function testPageTitle(): void
    {
        self::expectOutputString('<h1 class="title"> title</h1> ');
        $_GET['page'] = 'about';
        pageTitle([['path' => '/?page=about', 'title' => 'title']]);
    }

    public function testShowMenu()
    {
        self::expectOutputString('<li><a href="/?page=about"><span class="underline">title</span></a></li>');
        $_GET['page'] = 'about';
        showMenu([['path' => '/?page=about', 'title' => 'title']]);
    }
}
