<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;

class OrganizationController extends Controller
{
    public function getShow($organization_id) {
        $organization = Organization::find($organization_id);
        return view('organizations.show', ['organization' => $organization]);
    }

    //Admin Functions

    public function getAdminIndex() {
        $organizations = Organization::all();
        return 'admin orgs';
    }
}
