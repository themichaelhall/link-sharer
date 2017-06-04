<?php

declare(strict_types=1);

namespace LinkSharer\Tests;

use DataTypes\Url;
use LinkSharer\LinkSharer;
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

        self::assertSame('https://twitter.com/home?status=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getTwitterSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getFacebookSharer()->getShareUrl()->__toString());
        self::assertSame('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getGooglePlusSharer()->getShareUrl()->__toString());
    }

    /**
     * Test LinkSharer with url and text.
     */
    public function testLinkSharerWithUrlAndText()
    {
        $linkSharer = new LinkSharer(Url::parse('https://example.com/path/file'), 'I am sharing this.');

        self::assertSame('https://twitter.com/home?status=I%20am%20sharing%20this.%20https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getTwitterSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getFacebookSharer()->getShareUrl()->__toString());
        self::assertSame('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getGooglePlusSharer()->getShareUrl()->__toString());
    }

    /**
     * Test LinkSharer with url and text and hashtags.
     */
    public function testLinkSharerWithUrlAndTextAndHashTags()
    {
        $linkSharer = new LinkSharer(Url::parse('https://example.com/path/file'), 'I am sharing this.', ['sharing', 'this']);

        self::assertSame('https://twitter.com/home?status=I%20am%20sharing%20this.%20https%3A%2F%2Fexample.com%2Fpath%2Ffile%20%23sharing%20%23this', $linkSharer->getTwitterSharer()->getShareUrl()->__toString());
        self::assertSame('https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getFacebookSharer()->getShareUrl()->__toString());
        self::assertSame('https://plus.google.com/share?url=https%3A%2F%2Fexample.com%2Fpath%2Ffile', $linkSharer->getGooglePlusSharer()->getShareUrl()->__toString());
    }
}
