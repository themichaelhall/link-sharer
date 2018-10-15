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
 * Tumblr sharer.
 *
 * @since 2.2.0
 */
class TumblrSharer extends AbstractSharer
{
    /**
     * Constructs a TumblrSharer.
     *
     * @since 2.2.0
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
     * @since 2.2.0
     *
     * @return UrlInterface The share url.
     */
    public function getShareUrl(): UrlInterface
    {
        $parts = [];

        $parts[] = 'canonicalUrl=' . rawurlencode($this->getUrl()->__toString());

        if ($this->getText() !== '') {
            $parts[] = 'title=' . rawurlencode($this->getText());
        }

        if (count($this->getHashtags()) > 0) {
            $parts[] = 'tags=' . rawurlencode(implode(',', $this->getHashtags()));
        }

        return Url::parse('https://www.tumblr.com/widgets/share/tool?' . implode('&', $parts));
    }
}
