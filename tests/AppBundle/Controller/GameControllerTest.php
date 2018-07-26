<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @group formation
 */
class GameControllerTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();

    }

    public function testWrongLetter()
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', '/game/');

        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $link = $crawler->selectLink('A')->link();
        $crawler = $this->client->click($link);

        $CSSclass = $crawler->selectLink('A')->attr('class');
        $this->assertContains('disabled', $CSSclass);

        $allLetters = $crawler->filter('.d-inline');
        $allLetters->each(function(Crawler $a) {
            $this->assertSame(' _ ', $a->text());
        });
    }

    public function testGoodLetter()
    {
        $this->client->followRedirects();
        $crawler = $this->client->request('GET', '/game/');

        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $link = $crawler->selectLink('B')->link();
        $crawler = $this->client->click($link);

        $CSSclass = $crawler->selectLink('B')->attr('class');
        $this->assertContains('disabled', $CSSclass);

        $allLetters = $crawler->filter('.d-inline');
        $firstLetter = $allLetters->first();

        $this->assertContains('B', $firstLetter->text());
    }
}
