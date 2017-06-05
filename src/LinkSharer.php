<?php
/**
 * This file is a part of the link-sharer package.
 *
 * Read more at https://github.com/themichaelhall/link-sharer
 */
declare(strict_types=1);

namespace LinkSharer;

use DataTypes\Interfaces\UrlInterface;
use LinkSharer\Sharers\FacebookSharer;
use LinkSharer\Sharers\GooglePlusSharer;
use LinkSharer\Sharers\TwitterSharer;

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
        return new FacebookSharer($this->url);
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
