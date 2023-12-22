<?php

namespace App\Http\Controllers\Central;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Domain;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render("Central/Dashboard", [
            'tenant' => Tenant::with('domains')->get(),
        ]);
    }

    public function create_tenant(Request $request)
    {
        $input = $request->all();

        $tenant = Tenant::create(['tenant_id' => $input['tenant_id'], 'plan' => $input['plan']]);
        $tenant->domains()->create(['domain' => $input['domain']]);
    }

}
