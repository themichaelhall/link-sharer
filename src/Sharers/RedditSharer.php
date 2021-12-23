<?php

/**
 * This file is a part of the link-sharer package.
 *
 * Read more at https://github.com/themichaelhall/link-sharer
 */

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Sharers;

use DataTypes\Net\Url;
use DataTypes\Net\UrlInterface;
use MichaelHall\LinkSharer\Sharers\Base\AbstractSharer;

/**
 * Reddit sharer.
 *
 * @since 2.1.0
 */
class RedditSharer extends AbstractSharer
{
    /**
     * Constructs a RedditSharer.
     *
     * @since 2.1.0
     *
     * @param UrlInterface $url  The url.
     * @param string       $text The text.
     */
    public function __construct(UrlInterface $url, string $text = '')
    {
        parent::__construct($url, $text);
    }

    /**
     * Returns the share url.
     *
     * @since 2.1.0
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface
    {
        $parts = [];

        $parts[] = 'url=' . rawurlencode($this->getUrl()->__toString());

        if ($this->getText() !== '') {
            $parts[] = 'title=' . rawurlencode($this->getText());
        }

        return Url::parse('https://www.reddit.com/submit?' . implode('&', $parts));
    }
}
