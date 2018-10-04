<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Interfaces\UrlInterface;
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
     *
     * @dataProvider getShareUrlDataProvider
     *
     * @param UrlInterface $url              The url.
     * @param UrlInterface $expectedShareUrl The expected share url.
     */
    public function testGetShareUrl(UrlInterface $url, UrlInterface $expectedShareUrl)
    {
        $googlePlusSharer = new GooglePlusSharer($url);

        self::assertTrue($expectedShareUrl->equals($googlePlusSharer->getShareUrl()));
        self::assertSame($expectedShareUrl->__toString(), $googlePlusSharer->__toString());
    }

    /**
     * Data provider for testGetShareUrl.
     *
     * @return array
     */
    public function getShareUrlDataProvider()
    {
        return [
            [Url::parse('https://example.com/path/file'), Url::parse('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile')],
        ];
    }
}
