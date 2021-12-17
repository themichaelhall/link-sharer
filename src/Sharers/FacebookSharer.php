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
 * Facebook sharer.
 *
 * @since 1.0.0
 */
class FacebookSharer extends AbstractSharer
{
    /**
     * Constructs a FacebookSharer.
     *
     * @since 1.0.0
     *
     * @param UrlInterface $url      The url.
     * @param array        $hashtags The hashtags.
     */
    public function __construct(UrlInterface $url, array $hashtags)
    {
        parent::__construct($url, '', $hashtags);
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

        $parts[] = 'u=' . rawurlencode($this->getUrl()->__toString());

        if (count($this->getHashtags()) > 0) {
            $parts[] = 'hashtag=' . rawurlencode('#' . $this->getHashtags()[0]);
        }

        return Url::parse('https://www.facebook.com/sharer/sharer.php?' . implode('&', $parts));
    }
}
