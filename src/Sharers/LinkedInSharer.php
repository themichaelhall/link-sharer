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
use MichaelHall\LinkSharer\Sharers\Interfaces\SharerInterface;

/**
 * LinkedIn sharer.
 *
 * @since 1.1.0
 */
class LinkedInSharer implements SharerInterface
{
    /**
     * Constructs a LinkedInSharer.
     *
     * @since 1.1.0
     *
     * @param UrlInterface $url  The url.
     * @param string       $text The text.
     */
    public function __construct(UrlInterface $url, string $text = '')
    {
        $this->url = $url;
        $this->text = $text;
    }

    /**
     * Returns the share url.
     *
     * @since 1.1.0
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface
    {
        $parts = [];

        $parts[] = 'url=' . rawurlencode($this->url->__toString());

        if ($this->text !== '') {
            $parts[] = 'title=' . rawurlencode($this->text);
        }

        return Url::parse('https://www.linkedin.com/shareArticle?mini=true&' . implode('&', $parts));
    }

    /**
     * Returns the share url as a string.
     *
     * @since 1.1.0
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
}
