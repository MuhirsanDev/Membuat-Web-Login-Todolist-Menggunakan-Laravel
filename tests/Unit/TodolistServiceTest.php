<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use PHPUnit\Framework\TestCase;

class TodolistServiceTest extends TestCase
{
    private TodolistService $todolistService;

    protected function setUp(): void {
        parent::setUp();
        $this->todolistService = $this->app->make(TodolistService::class);
    }

    public function testTodolistNotNull(){
        self::assertNotNull($this->todolistService);
    }
}
