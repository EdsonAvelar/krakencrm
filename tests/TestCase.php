<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\Tenant;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $tenancy = false;

    public function setUp(): void
    {
        parent::setUp();

        config(['tenancy.database.prefix' => 'test_tenant']);
    }

    protected function createTenant(): Tenant
    {
        return Tenant::create(['id' => 'tenant']);
    }
}
