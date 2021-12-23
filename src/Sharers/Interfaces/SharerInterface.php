<?php

/**
 * This file is a part of the link-sharer package.
 *
 * Read more at https://github.com/themichaelhall/link-sharer
 */

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Sharers\Interfaces;

use DataTypes\Net\UrlInterface;

/**
 * Common interface for sharers.
 *
 * @since 2.1.0
 */
interface SharerInterface
{
    /**
     * Returns the share url.
     *
     * @since 2.1.0
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface;

    /**
     * Returns the share url as a string.
     *
     * @since 2.1.0
     *
     * @return string The share url as a string.
     */
    public function __toString(): string;
}
