<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Interfaces\UrlInterface;
use DataTypes\Url;
use MichaelHall\LinkSharer\Sharers\TwitterSharer;
use PHPUnit\Framework\TestCase;

/**
 * Test TwitterSharer class.
 */
class TwitterSharerTest extends TestCase
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
        $twitterSharer = new TwitterSharer($url, $text, $hashtags);

        self::assertTrue($expectedShareUrl->equals($twitterSharer->getShareUrl()));
        self::assertSame($expectedShareUrl->__toString(), $twitterSharer->__toString());
    }

    /**
     * Data provider for testGetShareUrl.
     *
     * @return array
     */
    public function getShareUrlDataProvider()
    {
        return [
            [Url::parse('https://example.com/path/file'), '', [], Url::parse('https://twitter.com/home?status=https%3A%2F%2Fexample.com%2Fpath%2Ffile')],
            [Url::parse('https://example.com/path/file'), 'Sharing on Twitter', [], Url::parse('https://twitter.com/home?status=Sharing%20on%20Twitter%20https%3A%2F%2Fexample.com%2Fpath%2Ffile')],
            [Url::parse('https://example.com/path/file'), '', ['foo'], Url::parse('https://twitter.com/home?status=https%3A%2F%2Fexample.com%2Fpath%2Ffile%20%23foo')],
            [Url::parse('https://example.com/path/file'), '', ['foo', 'bar'], Url::parse('https://twitter.com/home?status=https%3A%2F%2Fexample.com%2Fpath%2Ffile%20%23foo%20%23bar')],
            [Url::parse('https://example.com/path/file'), 'Sharing on Twitter', ['foo'], Url::parse('https://twitter.com/home?status=Sharing%20on%20Twitter%20https%3A%2F%2Fexample.com%2Fpath%2Ffile%20%23foo')],
            [Url::parse('https://example.com/path/file'), 'Sharing on Twitter', ['foo', 'bar'], Url::parse('https://twitter.com/home?status=Sharing%20on%20Twitter%20https%3A%2F%2Fexample.com%2Fpath%2Ffile%20%23foo%20%23bar')],
        ];
    }
}
