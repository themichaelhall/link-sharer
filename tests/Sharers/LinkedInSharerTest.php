<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Net\Url;
use DataTypes\Net\UrlInterface;
use MichaelHall\LinkSharer\Sharers\LinkedInSharer;
use PHPUnit\Framework\TestCase;

/**
 * Test LinkedInSharer class.
 */
class LinkedInSharerTest extends TestCase
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
        $linkedInSharer = new LinkedInSharer($url, $text);

        self::assertTrue($expectedShareUrl->equals($linkedInSharer->getShareUrl()));
        self::assertSame($expectedShareUrl->__toString(), $linkedInSharer->__toString());
    }

    /**
     * Data provider for testGetShareUrl.
     *
     * @return array
     */
    public function getShareUrlDataProvider(): array
    {
        return [
            [Url::parse('https://example.com/path/file'), '', Url::parse('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile')],
            [Url::parse('https://example.com/path/file'), 'Sharing on LinkedIn', Url::parse('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=Sharing%20on%20LinkedIn')],
        ];
    }
}
