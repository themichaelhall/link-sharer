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
     * @param UrlInterface $url The url.
     */
    public function __construct(UrlInterface $url)
    {
        parent::__construct($url);
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
        return Url::parse('https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($this->getUrl()->__toString()));
    }
}
