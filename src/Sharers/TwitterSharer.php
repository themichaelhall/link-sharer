<?php

declare(strict_types=1);

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
    public function __construct(UrlInterface $url, string $text = '', array $hashtags = [])
    {
        $this->url = $url;
        $this->text = $text;
        $this->hashtags = $hashtags;
    }

    /**
     * Returns the share url.
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface
    {
        $parts = [];

        if ($this->text !== '') {
            $parts[] = $this->text;
        }

        $parts[] = $this->url->__toString();

        if (count($this->hashtags) > 0) {
            $parts[] = implode(' ', array_map(function (string $hashtag) {
                return '#' . $hashtag;
            }, $this->hashtags));
        }

        return Url::parse('https://twitter.com/home?status=' . rawurlencode(implode(' ', $parts)));
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
    private $hashtags;
}
