<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Net\Url;
use DataTypes\Net\UrlInterface;
use MichaelHall\LinkSharer\Sharers\TumblrSharer;
use PHPUnit\Framework\TestCase;

/**
 * Test TumblrSharer class.
 */
class TumblrSharerTest extends TestCase
{
    /**
     * Test getShareUrl method.
     *
     * @dataProvider getShareUrlDataProvider
     *
     * @param UrlInterface $url              The url.
     * @param string       $text             The text.
     * @param string[]     $hashtags         The hashtags.
     * @param UrlInterface $expectedShareUrl The expected share url.
     */
    public function testGetShareUrl(UrlInterface $url, string $text, array $hashtags, UrlInterface $expectedShareUrl)
    {
        $tumblrSharer = new TumblrSharer($url, $text, $hashtags);

        self::assertTrue($expectedShareUrl->equals($tumblrSharer->getShareUrl()));
        self::assertSame($expectedShareUrl->__toString(), $tumblrSharer->__toString());
    }

    /**
     * Data provider for testGetShareUrl.
     *
     * @return array
     */
    public function getShareUrlDataProvider(): array
    {
        return [
            [Url::parse('https://example.com/path/file'), '', [], Url::parse('https://www.tumblr.com/widgets/share/tool?canonicalUrl=https%3A%2F%2Fexample.com%2Fpath%2Ffile')],
            [Url::parse('https://example.com/path/file'), 'Sharing on Tumblr', [], Url::parse('https://www.tumblr.com/widgets/share/tool?canonicalUrl=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=Sharing%20on%20Tumblr')],
            [Url::parse('https://example.com/path/file'), '', ['foo'], Url::parse('https://www.tumblr.com/widgets/share/tool?canonicalUrl=https%3A%2F%2Fexample.com%2Fpath%2Ffile&tags=foo')],
            [Url::parse('https://example.com/path/file'), '', ['foo', 'bar'], Url::parse('https://www.tumblr.com/widgets/share/tool?canonicalUrl=https%3A%2F%2Fexample.com%2Fpath%2Ffile&tags=foo%2Cbar')],
            [Url::parse('https://example.com/path/file'), 'Sharing on Tumblr', ['foo'], Url::parse('https://www.tumblr.com/widgets/share/tool?canonicalUrl=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=Sharing%20on%20Tumblr&tags=foo')],
            [Url::parse('https://example.com/path/file'), 'Sharing on Tumblr', ['foo', 'bar'], Url::parse('https://www.tumblr.com/widgets/share/tool?canonicalUrl=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=Sharing%20on%20Tumblr&tags=foo%2Cbar')],
        ];
    }
}
