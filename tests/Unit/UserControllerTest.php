<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\UserService;


class UserControllerTest extends TestCase
{
    public function testLoginPage()
    {
        $this->assertTrue(true);
    }



    public function testLoginForMember()
    {
        $this->withSession([
            "user" => "ican"
        ])->get('/login')
            ->assertRedirect('/');
    }



    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "ican",
            "password" => "rahasia"
        ])->assertRedirect("/")
            ->assertSessionHas("user", "ican");
    }



    public function testLoginForUserAlreadyLogin()
    {
        $this->withSession([
            "user" => "ican"
        ])->post('/login', [
            "user" => "ican",
            "password" => "rahasia"
        ])->assertRedirect("/");
    }



    public function testLoginValidationError()
    {
        $this->post('/login', [])->assertSeeText("User or password is required");
    }



    public function testLoginFailed()
    {
        $this->post('/login', [
            "user" => "wrong",
            "password" => "wrong"
        ])->assertSeeText("User or password is wrong");
    }



    public function testLogout()
    {
        $this->withSession([
            "user" => "ican"
        ])->post('/logout')
            ->assertRedirect("/")
            ->assertSessionMissing("user");
    }


    public function testLogoutGuest()
    {
        $this->post('/logout')
            ->assertRedirect("/");
    }
}
