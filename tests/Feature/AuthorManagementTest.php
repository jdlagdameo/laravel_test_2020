<?php

namespace Tests\Feature;

use App\Author;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;
   
    /** @test */
    public function an_author_can_be_created(){
        $this->post('author', [
            'name' => 'Author Name',
            'dob' => '10/16/1994',
        ]);

        $author = Author::all();
        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        $this->assertEquals('1994/16/10', $author->first()->dob->format('Y/d/m'));
    }
    
}
