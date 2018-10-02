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
 * LinkedIn sharer.
 *
 * @since 1.1.0
 */
class LinkedInSharer extends AbstractSharer
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
        parent::__construct($url, $text);
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

        $parts[] = 'url=' . rawurlencode($this->getUrl()->__toString());

        if ($this->getText() !== '') {
            $parts[] = 'title=' . rawurlencode($this->getText());
        }

        return Url::parse('https://www.linkedin.com/shareArticle?mini=true&' . implode('&', $parts));
    }
}
