<?php

declare(strict_types=1);

namespace LinkSharer;

use DataTypes\Interfaces\UrlInterface;
use LinkSharer\Sharers\FacebookSharer;
use LinkSharer\Sharers\TwitterSharer;

/**
 * Class LinkSharer.
 */
class LinkSharer
{
    /**
     * Constructs a LinkSharer.
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
     * @return FacebookSharer The Facebook sharer.
     */
    public function getFacebookSharer(): FacebookSharer
    {
        return new FacebookSharer($this->url);
    }

    /**
     * Returns the Twitter sharer.
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
