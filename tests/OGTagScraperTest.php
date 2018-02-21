<?php 

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Maalls\OGTagScraper\OGTagScraper;

final class OGTagScraperTest extends TestCase
{

    public function testScrap(): void
    {

        $scraper = new OGTagScraper();
        $tags = $scraper->scrap("http://ultrasupernew.com");
        $this->assertEquals("UltraSuperNew", $tags["og:title"]);

        
    }

}


