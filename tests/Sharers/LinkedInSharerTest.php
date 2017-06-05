<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests\Sharers;

use DataTypes\Url;
use MichaelHall\LinkSharer\Sharers\LinkedInSharer;
use PHPUnit\Framework\TestCase;

/**
 * Test LinkedInSharer class.
 */
class LinkedInSharerTest extends TestCase
{
    /**
     * Test getShareUrl method.
     */
    public function testGetShareUrl()
    {
        $twitterSharer = new LinkedInSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $twitterSharer->getShareUrl()->__toString());
    }

    /**
     * Test getShareUrl with text method.
     */
    public function testGetShareUrlWithText()
    {
        $twitterSharer = new LinkedInSharer(Url::parse('https://example.com/path/file'), 'Sharing on LinkedIn');

        self::assertSame('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=Sharing%20on%20LinkedIn', $twitterSharer->getShareUrl()->__toString());
    }

    /**
     * Test __toString method.
     */
    public function testToString()
    {
        $twitterSharer = new LinkedInSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $twitterSharer->__toString());
    }

    /**
     * Test __toString method with text.
     */
    public function testToStringWithText()
    {
        $twitterSharer = new LinkedInSharer(Url::parse('https://example.com/path/file'), 'Sharing on LinkedIn');

        self::assertSame('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=Sharing%20on%20LinkedIn', $twitterSharer->__toString());
    }
}
