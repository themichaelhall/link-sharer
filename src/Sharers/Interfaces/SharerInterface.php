<?php

/**
 * This file is a part of the link-sharer package.
 *
 * Read more at https://github.com/themichaelhall/link-sharer
 */

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Sharers\Interfaces;

use DataTypes\Net\UrlInterface;
use Stringable;

/**
 * Common interface for sharers.
 *
 * @since 2.1.0
 */
interface SharerInterface extends Stringable
{
    /**
     * Returns the share url.
     *
     * @since 2.1.0
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface;
}
