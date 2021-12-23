<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Net\Url;
use DataTypes\Net\UrlInterface;
use MichaelHall\LinkSharer\Sharers\RedditSharer;
use PHPUnit\Framework\TestCase;

/**
 * Test RedditSharer class.
 */
class RedditSharerTest extends TestCase
{
    /**
     * Test getShareUrl method.
     *
     * @dataProvider getShareUrlDataProvider
     *
     * @param UrlInterface $url              The url.
     * @param string       $text             The text.
     * @param UrlInterface $expectedShareUrl The expected share url.
     */
    public function testGetShareUrl(UrlInterface $url, string $text, UrlInterface $expectedShareUrl)
    {
        $redditSharer = new RedditSharer($url, $text);

        self::assertTrue($expectedShareUrl->equals($redditSharer->getShareUrl()));
        self::assertSame($expectedShareUrl->__toString(), $redditSharer->__toString());
    }

    /**
     * Data provider for testGetShareUrl.
     *
     * @return array
     */
    public function getShareUrlDataProvider(): array
    {
        return [
            [Url::parse('https://example.com/path/file'), '', Url::parse('https://www.reddit.com/submit?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile')],
            [Url::parse('https://example.com/path/file'), 'Sharing on Reddit', Url::parse('https://www.reddit.com/submit?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=Sharing%20on%20Reddit')],
        ];
    }
}
