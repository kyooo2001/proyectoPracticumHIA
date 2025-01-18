<?php

namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;
//use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_creacion_user_en_memoria()
    {
        $user = new User([
            'name'=>'María A',
            'email'=>'maria@test.com',
            'password'=>'123456',
            
             ]);

        $this->assertEquals('María A',$user->name);
        $this->assertEquals('maria@test.com',$user->email);
        $this->assertEquals('123456',$user->password);
        

    }

    /**
     * Verficar que los Guarded esten correctos
     */

     public function test_guarded_user()
    {

        $user = new User();
        $this->assertEquals([], $user->getGuarded());
        
    }
}
