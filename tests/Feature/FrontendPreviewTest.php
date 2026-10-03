<?php

namespace Tests\Feature;

use Tests\TestCase;

class FrontendPreviewTest extends TestCase
{
    public function test_frontend_preview_pages_load_without_database_sessions(): void
    {
        config(['session.driver' => 'database']);

        foreach (['/test', '/verification', '/login', '/register'] as $path) {
            $this->get($path)->assertOk();
        }
    }
}
