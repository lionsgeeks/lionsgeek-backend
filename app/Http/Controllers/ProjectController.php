<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Carbon\Carbon;
use Gemini;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        $projects->map(function ($project) {
            $project->description = json_decode($project->description);
            $project->description = $project->description->en;
        });

        return view("project.project", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            "name" => "required",
            "description" => "required",
            "logo" => "required|mimes:png,jpg,svg,jfif,gif",
        ]);



        if ($request->hasFile("logo")) {
            $logo = file_get_contents($request->logo);
            $logoName = hash("sha256", $logo . Carbon::now())  . "." . $request->logo->getClientOriginalExtension();
            Storage::disk("public")->put("images/projects/" . $logoName, $logo);
        }
        if ($request->hasFile("preview")) {
            $preview = file_get_contents($request->preview);
            $previewName = hash("sha256", $preview . Carbon::now())  . "." . $request->preview->getClientOriginalExtension();
            Storage::disk("public")->put("images/projects/" . $previewName, $preview);
        }

        $gemini_api_key = env("GEMINI_API_KEY");

        $client = Gemini::client($gemini_api_key);

        $prompt = "Translate the following text into English, French, and Arabic, and return the result in an object like this  one  all in one  line: 
        {\"en\": \"[translated text in English]\", \"fr\": \"[translated text in French]\", \"ar\": \"[translated text in Arabic]\"}. 
        The text to translate is: \"$request->description\"";

        try {
            $result = $client->geminiPro()->generateContent($prompt);
            // dd($result->text());
            Project::create([
                "name" => $request->name,
                "description" => $result->text(),
                "logo" => $logoName,
                "preview" => $request->hasFile("preview") ? $previewName : null
            ]);

            return back()->with("success", "kj");
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //

        request()->validate([
            "name" => "required",
            "description" => "required",
        ]);

        if ($request->hasFile("logo")) {
            Storage::disk("public")->delete("app/public/images/projects/" . $project->logo);
            $logo = file_get_contents($request->logo);
            $logoName = hash("sha256", $logo . Carbon::now())  . "." . $request->logo->getClientOriginalExtension();
            Storage::disk("public")->put("images/projects/" . $logoName, $logo);
        }

        if ($request->hasFile("preview")) {
            Storage::disk("public")->delete("app/public/images/projects/" . $project->logo);
            $preview = file_get_contents($request->preview);
            $previewName = hash("sha256", $preview . Carbon::now())  . "." . $request->preview->getClientOriginalExtension();
            Storage::disk("public")->put("images/projects/" . $previewName, $preview);
        }

        $gemini_api_key = env("GEMINI_API_KEY");

        $client = Gemini::client($gemini_api_key);


        $prompt = "Translate the following text into English, French, and Arabic, and return the result in an object like this  one  all in one  line: 
        {\"en\": \"[translated text in English]\", \"fr\": \"[translated text in French]\", \"ar\": \"[translated text in Arabic]\"}. 
        The text to translate is: \"$request->description\"";
        $result = $client->geminiPro()->generateContent($prompt);

        $project->update([
            "name" => $request->name,
            "description" => $result->text(),
            "logo" => $request->hasFile("logo") ? $logoName : $project->logo,
            "preview" => $request->hasFile("preview") ? $previewName : $project->preview
        ]);

        return back()->with("success", "kj");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        Storage::disk('public')->delete("images/projects/" . $project->logo);
        Storage::disk('public')->delete("images/projects/" . $project->preview);
        $project->delete();
        return back();
    }
}
