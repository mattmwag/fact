<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FactsTest extends TestCase
{
    
    use WithFaker, RefreshDatabase;
    
    /** @test */
    public function a_user_can_add_a_fact()
    {
        $this->withoutExceptionHandling();
        
        $this->actingAs(factory('App\User')->create());
        
        $attributes = factory('App\Fact')->raw(['owner_id' => auth()->id()]);
        
        $this->post('/facts', $attributes)->assertRedirect('/facts');
        
        $this->assertDatabaseHas('facts', $attributes);
        
        $this->get('/facts')->assertSee(htmlspecialchars($attributes['text'], ENT_QUOTES, 'UTF-8'));
    }
    
    /** @test */
    public function a_fact_requires_text()
    {
        $this->actingAs(factory('App\User')->create());
        
        $attributes = factory('App\Fact')->raw(['text' => '']);
    
        $this->post('/facts', $attributes)->assertSessionHasErrors('text');
    }
    
    /** @test */
    public function only_authenticated_users_can_add_facts()
    {
        $attributes = factory('App\Fact')->raw();
        
        $this->post('/facts', $attributes)->assertRedirect('login');
    }
    
    /** @test */
    public function a_user_can_view_a_fact()
    {
        //$this->withoutExceptionHandling();
    
        $fact = factory('App\Fact')->create();
        
        $this->get($fact->path())
             ->assertSee(htmlspecialchars($fact->text, ENT_QUOTES, 'UTF-8'));
    }
}
