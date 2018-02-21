<?php
namespace Maalls\OGTagScraper;

use Maalls\DomDocument\Factory;

class OGTagScraper {

	public function scrap($url, $includeDefaults = true) {

		$factory = new Factory();

		libxml_use_internal_errors(true);

		$dom = $factory->createFromUrl($url);

		$og = [

			'og:title' => '',
			'og:description' => '',
			'og:image' => '',
			'non-og:title' => '',
			'non-og:decription' => '',
		];

		foreach ($dom->getElementsByTagName('meta') as $tag) {

			if ($includeDefaults && $tag->hasAttribute('name') && $tag->hasAttribute('content') && $tag->getAttribute('name') == 'description') {

				$og['non-og:description'] = $tag->getAttribute('content');

			} else if ($tag->hasAttribute('property') && $tag->hasAttribute('content')) {

				$og[$tag->getAttribute('property')] = $tag->getAttribute('content');

			}
		}
		if ($includeDefaults) {

			$titles = $dom->getElementsByTagName('title');

			if ($titles->length > 0) {

				$og['non-og:title'] = $titles->item(0)->textContent;

			}
		}

		return $og;

	}

}