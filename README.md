# link-sharer

[![Tests](https://github.com/themichaelhall/link-sharer/workflows/tests/badge.svg?branch=master)](https://github.com/themichaelhall/link-sharer/actions)
[![StyleCI](https://styleci.io/repos/92959905/shield?style=flat)](https://styleci.io/repos/92959905)
[![License](https://poser.pugx.org/michaelhall/link-sharer/license)](https://packagist.org/packages/michaelhall/link-sharer)
[![Latest Stable Version](https://poser.pugx.org/michaelhall/link-sharer/v/stable)](https://packagist.org/packages/michaelhall/link-sharer)
[![Total Downloads](https://poser.pugx.org/michaelhall/link-sharer/downloads)](https://packagist.org/packages/michaelhall/link-sharer)

Link sharer helper for sharing links on social networks.

## Requirements

- PHP >= 7.3

## Install with composer

``` bash
$ composer require michaelhall/link-sharer
```

## Basic usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

$url = \DataTypes\Url::parse('http://example.com/');

// $text and $hashtags parameters are optional.
$text = 'My Webpage';
$hashtags = ['my', 'webpage'];

$linkSharer = new \MichaelHall\LinkSharer\LinkSharer($url, $text, $hashtags);

// Prints https://twitter.com/intent/tweet?url=...
echo $linkSharer->getTwitterSharer();

// Prints https://www.facebook.com/sharer/sharer.php?u=...
echo $linkSharer->getFacebookSharer();

// And so on...
echo $linkSharer->getGooglePlusSharer();
echo $linkSharer->getLinkedInSharer();
echo $linkSharer->getRedditSharer();
echo $linkSharer->getTumblrSharer();
```

## License

MIT
