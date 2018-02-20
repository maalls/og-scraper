# Install

```console
composer require maalls/og-tag-scraper
```

# Example

```php 
use Maalls\OGTagScraper\OGTagScraper;

$scraper = new OGTagScraper;
$tags = $scraper->scrap("http://someurl.com");
var_dump($tags);
``` 

# Testing

```command
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/
```