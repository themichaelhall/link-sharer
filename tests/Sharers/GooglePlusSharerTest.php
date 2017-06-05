<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Url;
use MichaelHall\LinkSharer\Sharers\GooglePlusSharer;
use PHPUnit\Framework\TestCase;

/**
 * Test GooglePlusSharerTest class.
 */
class GooglePlusSharerTest extends TestCase
{
    /**
     * Test getShareUrl method.
     */
    public function testGetShareUrl()
    {
        $googlePlusSharer = new GooglePlusSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $googlePlusSharer->getShareUrl()->__toString());
    }

    /**
     * Test __toString method.
     */
    public function testToString()
    {
        $googlePlusSharer = new GooglePlusSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $googlePlusSharer->__toString());
    }
}
