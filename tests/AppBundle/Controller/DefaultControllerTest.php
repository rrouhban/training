<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

class DefaultControllerTest extends WebTestCase
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testHome()
    {
        $this->client->request('GET', '/');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $content = $this->client->getResponse()->getContent();
        $this->assertContains('play', $content);
    }

    public function testContact()
    {
        $this->client->request('GET', '/contact-us');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}
