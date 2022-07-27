<?php

namespace Tests\Feature;

use App\Models\Article;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function testAll()
    {
        // запрос к базе данных
        dd(Article::query()->where('id', 'qwe')->all());
        
        // из базы берем все строки а потом фильтруем
        dd(Article::all()->where('id', 'qwe')->all());
        
    }
}
