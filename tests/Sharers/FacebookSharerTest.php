<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Interfaces\UrlInterface;
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
     *
     * @dataProvider getShareUrlDataProvider
     *
     * @param UrlInterface $url              The url.
     * @param UrlInterface $expectedShareUrl The expected share url.
     */
    public function testGetShareUrl(UrlInterface $url, UrlInterface $expectedShareUrl)
    {
        $facebookSharer = new FacebookSharer($url);

        self::assertTrue($expectedShareUrl->equals($facebookSharer->getShareUrl()));
        self::assertSame($expectedShareUrl->__toString(), $facebookSharer->__toString());
    }

    /**
     * Data provider for testGetShareUrl.
     *
     * @return array
     */
    public function getShareUrlDataProvider()
    {
        return [
            [Url::parse('https://example.com/path/file'), Url::parse('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile')],
        ];
    }
}
