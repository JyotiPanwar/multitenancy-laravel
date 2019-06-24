<?php

namespace Tests\Unit;

use Tests\TestCase;
use Validator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }    
    /**
     * @dataProvider ABProvider
     */
    public function testA($a, $b, $c)
    {
       $this->assertEquals($a, $b);
       return $a;
    }
    /**
     * @dataProvider ABProvider
     */
    public function testB($a, $b, $c)
    {
       $this->assertEquals($a, $b);
       return $c;
    }

    public function ABProvider() 
    {
        return array(
          array(0, 0, 0),
          array(1, 1, 2),
          array(2, 2, 4),
        );
    }
    
}