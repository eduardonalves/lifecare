<?php

class phproTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        // Which browser to use
        $this->setBrowser('firefox');
        // The base URL
        $this->setBrowserUrl('http://www.phpro.org/');
    }

    public function testContactName()
    {
        // The URL to test
        $this->url('http://www.phpro.org/contact');
        // check the value of an element by ID
        $this->assertEquals('Anonymous Coward', $this->byId('Name')->value());
    }
}

?>
