<?php

namespace LinkSharer\Sharers;

use DataTypes\Interfaces\UrlInterface;
use DataTypes\Url;

/**
 * Twitter sharer.
 */
class TwitterSharer
{
    /**
     * Constructs a TwitterSharer.
     *
     * @param UrlInterface $url      The url.
     * @param string       $text     The text.
     * @param string[]     $hashtags The hashtags.
     */
    public function __construct(UrlInterface $url, string $text, array $hashtags = [])
    {
        $this->url = $url;
        $this->text = $text;
        $this->hashTags = $hashtags;
    }

    /**
     * Returns the share url.
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface
    {
        $hashTagsString = implode(' ', array_map(function (string $hashTag) {
            return '#' . $hashTag;
        }, $this->hashTags));

        return Url::parse(
            'https://twitter.com/home?status=' . rawurlencode($this->text . ' ' . $this->url->__toString() . ($hashTagsString !== '' ? ' ' . $hashTagsString : ''))
        );
    }

    /**
     * Returns the share url as a string.
     *
     * @return string The share url as a string.
     */
    public function __toString(): string
    {
        return $this->getShareUrl()->__toString();
    }

    /**
     * @var Url My url.
     */
    private $url;

    /**
     * @var string My text.
     */
    private $text;

    /**
     * @var string[] My hashtags.
     */
    private $hashTags;
}
