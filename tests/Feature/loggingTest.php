<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class loggingTest extends TestCase
{

    public function testLogging()
    {
        Log::info("Helo Info");
        Log::warning("Helo Warning");
        Log::error("Helo Error");
        Log::critical("Helo Critical");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Helo Info", ["user" => "Ican"]);
        self::assertTrue(true);
    }

    public function testWithContext()
    {
        Log::withContext(["user" => "Ican"]);

        Log::info("Helo Info");
        Log::warning("Helo Warning");
        Log::error("Helo Error");
        Log::critical("Helo Critical");

        self::assertTrue(true);
    }


    public function testChannnel()
    {
        $slackLogger = Log::channel("slack");
        $slackLogger->error("Helo Slack"); // Send to slack channel

        Log::info("Helo Laravel"); // Send to default channel
        self::assertTrue(true);
    }
}
