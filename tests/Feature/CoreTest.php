<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CoreTest extends TestCase
{
    /***
     * @return void
     */
    public function testWeHaveASite()
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
        
        $response->assertSee('Take a Fact. Leave a Fact.');
    }
}
