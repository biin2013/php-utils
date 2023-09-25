<?php

namespace Unit;

use Biin2013\PhpUtils\Str\StrFormat;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    /**
     * @test
     */
    public function studly()
    {
        self::assertEquals('AsdAaSdAF', StrFormat::studly('asd aa-sd-aF'));
    }

    /**
     * @test
     */
    public function camel()
    {
        self::assertEquals('asdAaSdAF', StrFormat::camel('asd aa-sd-aF'));
    }
}