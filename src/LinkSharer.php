<?php

/**
 * This file is a part of the link-sharer package.
 *
 * Read more at https://github.com/themichaelhall/link-sharer
 */

declare(strict_types=1);

namespace MichaelHall\LinkSharer;

use DataTypes\Interfaces\UrlInterface;
use MichaelHall\LinkSharer\Sharers\FacebookSharer;
use MichaelHall\LinkSharer\Sharers\GooglePlusSharer;
use MichaelHall\LinkSharer\Sharers\LinkedInSharer;
use MichaelHall\LinkSharer\Sharers\RedditSharer;
use MichaelHall\LinkSharer\Sharers\TumblrSharer;
use MichaelHall\LinkSharer\Sharers\TwitterSharer;

/**
 * Class LinkSharer.
 *
 * @since 1.0.0
 */
class LinkSharer
{
    /**
     * Constructs a LinkSharer.
     *
     * @since 1.0.0
     *
     * @param UrlInterface $url      The url.
     * @param string       $text     The text.
     * @param string[]     $hashtags The hashtags.
     */
    public function __construct(UrlInterface $url, string $text = '', array $hashtags = [])
    {
        $this->url = $url;
        $this->text = $text;
        $this->hashtags = $hashtags;
    }

    /**
     * Returns the Facebook sharer.
     *
     * @since 1.0.0
     *
     * @return FacebookSharer The Facebook sharer.
     */
    public function getFacebookSharer(): FacebookSharer
    {
        return new FacebookSharer($this->url, $this->hashtags);
    }

    /**
     * Returns the Google Plus sharer.
     *
     * @since 1.0.0
     *
     * @return GooglePlusSharer The Google Plus sharer.
     */
    public function getGooglePlusSharer(): GooglePlusSharer
    {
        return new GooglePlusSharer($this->url);
    }

    /**
     * Returns the LinkedIn sharer.
     *
     * @since 1.1.0
     *
     * @return LinkedInSharer The LinkedIn sharer.
     */
    public function getLinkedInSharer(): LinkedInSharer
    {
        return new LinkedInSharer($this->url, $this->text);
    }

    /**
     * Returns the Reddit sharer.
     *
     * @since 2.1.0
     *
     * @return RedditSharer The Reddit sharer.
     */
    public function getRedditSharer(): RedditSharer
    {
        return new RedditSharer($this->url, $this->text);
    }

    /**
     * Returns the Tumblr sharer.
     *
     * @since 2.2.0
     *
     * @return TumblrSharer The Tumblr sharer.
     */
    public function getTumblrSharer(): TumblrSharer
    {
        return new TumblrSharer($this->url, $this->text, $this->hashtags);
    }

    /**
     * Returns the Twitter sharer.
     *
     * @since 1.0.0
     *
     * @return TwitterSharer The Twitter sharer.
     */
    public function getTwitterSharer(): TwitterSharer
    {
        return new TwitterSharer($this->url, $this->text, $this->hashtags);
    }

    /**
     * @var UrlInterface My url.
     */
    private $url;

    /**
     * @var string My text.
     */
    private $text;

    /**
     * @var string[] My hashtags.
     */
    private $hashtags;
}
