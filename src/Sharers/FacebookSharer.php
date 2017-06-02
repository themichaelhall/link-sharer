<?php

declare(strict_types=1);

namespace LinkSharer\Sharers;

use DataTypes\Interfaces\UrlInterface;
use DataTypes\Url;

/**
 * Facebook sharer.
 */
class FacebookSharer
{
    /**
     * Constructs a FacebookSharer.
     *
     * @param UrlInterface $url The url.
     */
    public function __construct(UrlInterface $url)
    {
        $this->url = $url;
    }

    /**
     * Returns the share url.
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface
    {
        return Url::parse('https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode($this->url->__toString()));
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
}
