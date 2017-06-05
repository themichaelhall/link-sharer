<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Url;
use MichaelHall\LinkSharer\Sharers\FacebookSharer;
use PHPUnit\Framework\TestCase;

/**
 * Test FacebookSharer class.
 */
class FacebookSharerTest extends TestCase
{
    /**
     * Test getShareUrl method.
     */
    public function testGetShareUrl()
    {
        $facebookSharer = new FacebookSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $facebookSharer->getShareUrl()->__toString());
    }

    /**
     * Test __toString method.
     */
    public function testToString()
    {
        $facebookSharer = new FacebookSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $facebookSharer->__toString());
    }
}
