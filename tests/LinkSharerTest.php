<?php

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Tests;

use DataTypes\Url;
use MichaelHall\LinkSharer\LinkSharer;
use PHPUnit\Framework\TestCase;

/**
 * Class SharerTest.
 */
class LinkSharerTest extends TestCase
{
    /**
     * Test LinkSharer with url only.
     */
    public function testLinkSharerWithUrlOnly()
    {
        $linkSharer = new LinkSharer(Url::parse('https://example.com/path/file'));

        self::assertSame('https://twitter.com/intent/tweet?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getTwitterSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getFacebookSharer()->getShareUrl()->__toString());
        self::assertSame('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getGooglePlusSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getLinkedInSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.reddit.com/submit?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getRedditSharer()->getShareUrl()->__toString());
    }

    /**
     * Test LinkSharer with url and text.
     */
    public function testLinkSharerWithUrlAndText()
    {
        $linkSharer = new LinkSharer(Url::parse('https://example.com/path/file'), 'I am sharing this.');

        self::assertSame('https://twitter.com/intent/tweet?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&text=I%20am%20sharing%20this.', $linkSharer->getTwitterSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getFacebookSharer()->getShareUrl()->__toString());
        self::assertSame('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getGooglePlusSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=I%20am%20sharing%20this.', $linkSharer->getLinkedInSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.reddit.com/submit?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=I%20am%20sharing%20this.', $linkSharer->getRedditSharer()->getShareUrl()->__toString());
    }

    /**
     * Test LinkSharer with url and text and hashtags.
     */
    public function testLinkSharerWithUrlAndTextAndHashTags()
    {
        $linkSharer = new LinkSharer(Url::parse('https://example.com/path/file'), 'I am sharing this.', ['sharing', 'this']);

        self::assertSame('https://twitter.com/intent/tweet?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&text=I%20am%20sharing%20this.&hashtags=sharing%2Cthis', $linkSharer->getTwitterSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile&hashtag=%23sharing', $linkSharer->getFacebookSharer()->getShareUrl()->__toString());
        self::assertSame('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getGooglePlusSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=I%20am%20sharing%20this.', $linkSharer->getLinkedInSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.reddit.com/submit?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile&title=I%20am%20sharing%20this.', $linkSharer->getRedditSharer()->getShareUrl()->__toString());
    }
}
