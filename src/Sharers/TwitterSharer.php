<?php

/**
 * This file is a part of the link-sharer package.
 *
 * Read more at https://github.com/themichaelhall/link-sharer
 */

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Sharers;

use DataTypes\Interfaces\UrlInterface;
use DataTypes\Url;
use MichaelHall\LinkSharer\Sharers\Base\AbstractSharer;

/**
 * Twitter sharer.
 *
 * @since 1.0.0
 */
class TwitterSharer extends AbstractSharer
{
    /**
     * Constructs a TwitterSharer.
     *
     * @since 1.0.0
     *
     * @param UrlInterface $url      The url.
     * @param string       $text     The text.
     * @param string[]     $hashtags The hashtags.
     */
    public function __construct(UrlInterface $url, string $text = '', array $hashtags = [])
    {
        parent::__construct($url, $text, $hashtags);
    }

    /**
     * Returns the share url.
     *
     * @since 1.0.0
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface
    {
        $parts = [];

        $parts[] = 'url=' . rawurlencode($this->getUrl()->__toString());

        if ($this->getText() !== '') {
            $parts[] = 'text=' . rawurlencode($this->getText());
        }

        if (count($this->getHashtags()) > 0) {
            $parts[] = 'hashtags=' . rawurlencode(implode(',', $this->getHashtags()));
        }

        return Url::parse('https://twitter.com/intent/tweet?' . implode('&', $parts));
    }
}
