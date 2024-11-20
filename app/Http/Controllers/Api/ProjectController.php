<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $query = Project::query();
        $query->orderBy("created_at","desc");
        $projects = $query->get();
        return response()->json($projects);
    }
}
