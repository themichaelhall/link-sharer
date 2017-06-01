<?php
declare(strict_types=1);

namespace LinkSharer\Tests\Sharers;

use DataTypes\Url;
use LinkSharer\Sharers\TwitterSharer;
use PHPUnit\Framework\TestCase;

/**
 * Test TwitterSharer class.
 */
class TwitterSharerTest extends TestCase
{
    /**
     * Test getShareUrl method.
     */
    public function testGetShareUrl()
    {
        $twitterSharer = new TwitterSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://twitter.com/home?status=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $twitterSharer->getShareUrl()->__toString());
    }

    /**
     * Test getShareUrl with text method.
     */
    public function testGetShareUrlWithText()
    {
        $twitterSharer = new TwitterSharer(Url::parse('https://example.com/path/file'), 'Sharing on Twitter');

        self::assertSame('https://twitter.com/home?status=Sharing%20on%20Twitter%20https%3A%2F%2Fexample.com%2Fpath%2Ffile', $twitterSharer->getShareUrl()->__toString());
    }

    /**
     * Test getShareUrl method with hash tags.
     */
    public function testGetShareUrlWithHashTags()
    {
        $twitterSharer = new TwitterSharer(Url::parse('https://example.com/path/file'), 'Sharing on Twitter', ['share', 'twitter']);

        self::assertSame('https://twitter.com/home?status=Sharing%20on%20Twitter%20https%3A%2F%2Fexample.com%2Fpath%2Ffile%20%23share%20%23twitter', $twitterSharer->getShareUrl()->__toString());
    }

    /**
     * Test __toString method.
     */
    public function testToString()
    {
        $twitterSharer = new TwitterSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://twitter.com/home?status=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $twitterSharer->__toString());
    }

    /**
     * Test __toString method.
     */
    public function testToStringWithText()
    {
        $twitterSharer = new TwitterSharer(Url::parse('https://example.com/path/file'), 'Sharing on Twitter');

        self::assertSame('https://twitter.com/home?status=Sharing%20on%20Twitter%20https%3A%2F%2Fexample.com%2Fpath%2Ffile', $twitterSharer->__toString());
    }

    /**
     * Test __toString method with hash tags.
     */
    public function testToStringWithHashTags()
    {
        $twitterSharer = new TwitterSharer(Url::parse('https://example.com/path/file'), 'Sharing on Twitter', ['share', 'twitter']);

        self::assertSame('https://twitter.com/home?status=Sharing%20on%20Twitter%20https%3A%2F%2Fexample.com%2Fpath%2Ffile%20%23share%20%23twitter', $twitterSharer->__toString());
    }
}
