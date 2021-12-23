<?php

/**
 * This file is a part of the link-sharer package.
 *
 * Read more at https://github.com/themichaelhall/link-sharer
 */

declare(strict_types=1);

namespace MichaelHall\LinkSharer\Sharers\Base;

use DataTypes\Net\UrlInterface;
use MichaelHall\LinkSharer\Sharers\Interfaces\SharerInterface;

/**
 * Abstract base sharer class.
 *
 * @since 2.1.0
 */
abstract class AbstractSharer implements SharerInterface
{
    /**
     * Returns the share url.
     *
     * @since 2.1.0
     *
     * @return UrlInterface The share url.
     */
    abstract public function getShareUrl(): UrlInterface;

    /**
     * Returns the share url as a string.
     *
     * @since 2.1.0
     *
     * @return string The share url as a string.
     */
    public function __toString(): string
    {
        return $this->getShareUrl()->__toString();
    }

    /**
     * Returns the hashtags.
     *
     * @since 2.1.0
     *
     * @return string[] The hashtags.
     */
    protected function getHashtags(): array
    {
        return $this->hashtags;
    }

    /**
     * Returns the text.
     *
     * @since 2.1.0
     *
     * @return string The text.
     */
    protected function getText(): string
    {
        return $this->text;
    }

    /**
     * Returns the url.
     *
     * @since 2.1.0
     *
     * @return UrlInterface The url.
     */
    protected function getUrl(): UrlInterface
    {
        return $this->url;
    }

    /**
     * Constructs a sharer.
     *
     * @since 2.1.0
     *
     * @param UrlInterface $url      The url.
     * @param string       $text     The text (optional).
     * @param string[]     $hashtags The hashtags (optional).
     */
    protected function __construct(UrlInterface $url, string $text = '', array $hashtags = [])
    {
        $this->url = $url;
        $this->text = $text;
        $this->hashtags = $hashtags;
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
