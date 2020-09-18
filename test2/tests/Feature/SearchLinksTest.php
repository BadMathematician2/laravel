<?php


namespace Tests\Feature;


use Tests\TestCase;

class SearchLinksTest extends TestCase
{
    private $text = 'http:/test.local something https:google.com http:/test.local';
    private $test = '012345678901234567890123456789012345678901234567890123456789';



    public function testSearchLinks()
    {
        $links = \Search::searchLinks($this->text);
        $this->assertEquals(2, count($links));
        $this->assertEquals(2, count($links['http:/test.local']));
    }
}
