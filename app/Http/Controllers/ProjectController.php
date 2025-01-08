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
            "description" => "array|min:3",
            "description.en" => "string|nullable",
            "description.fr" => "string|nullable",
            "description.ar" => "string|nullable",
            "logo" => "required|mimes:png,jpg,svg,jfif,gif",
        ]);



        if ($request->hasFile("logo")) {
            $logoName = $this->uploadFile($request->file('logo'), "/projects/");

        }
        if ($request->hasFile("preview")) {
            $previewName = $this->uploadFile($request->file('preview'), "/projects/");
        }
        //     // dd();

        // $gemini_api_key = env("GEMINI_API_KEY");

        // $client = Gemini::client($gemini_api_key);

        //     $description = (object) $request->description;

        //     $prompt = "Translate the following text into English, French, and Arabic, and return the result in an object like this  one  all in one  line:
        //     {\"en\": \"[translated text in English]\", \"fr\": \"[translated text in French]\", \"ar\": \"[translated text in Arabic]\"}.
        //     The text to translate is: \"$description->en\"";

        //     // dd($description->en);
        // try {
        //     $result = $client->geminiPro()->generateContent($prompt);
        //     dd($result->text());
        //     return response()->json([
        //         'data' => $result->text()
        //     ]);

        // } catch (\Throwable $th) {
        //     return back();
        // }
        Project::create([
            "name" => $request->name,
            // "description" => $result->text(),
            "description" => $request->input("description"),
            "logo" => $logoName,
            "preview" => $request->hasFile("preview") ? $previewName : null
        ]);
//
        return back()->with("success", "Project has been created successfully!");

    }
    public function translate(Request $request)
    {
        $gemini_api_key = env("GEMINI_API_KEY");

        // Check if description is provided
        if (empty($request->description)) {
            return response()->json(['error' => 'No description provided'], 400);
        }

        $client = Gemini::client($gemini_api_key);

        $description = (object) $request->description;

        $prompt = "Translate the following text into English, French, and Arabic, and return the result in an object like this one all in one line:
        {\"en\": \"[translated text in English]\", \"fr\": \"[translated text in French]\", \"ar\": \"[translated text in Arabic]\"}.
        The text to translate is: \"$description->en\"";

        try {
            // Make the API request to Gemini
            $result = $client->geminiPro()->generateContent($prompt);

            // Assuming the result is in plain text format, convert it to JSON
            $translatedText = $result->text();

            // If necessary, parse the translation text into a JSON object
            $translated = json_decode($translatedText, true);



            return response()->json([
                'data' => $translated
            ]);
        } catch (\Throwable $th) {

            return response()->json(['error' => 'Translation failed due to an unexpected error'], 500);
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
            "description" => "array|min:3",
            "description.en" => "string|nullable",
            "description.fr" => "string|nullable",
            "description.ar" => "string|nullable",
        ]);

        if ($request->hasFile("logo")) {
            Storage::disk("public")->delete("/images/projects/" . $project->logo);
            $logoName = $this->uploadFile($request->file('logo'), "/projects/");
        }

        if ($request->hasFile("preview")) {
            Storage::disk("public")->delete("/images/projects/" . $project->preview);
            $previewName = $this->uploadFile($request->file('preview'), "/projects/");

        }

        // $gemini_api_key = env("GEMINI_API_KEY");

        // $client = Gemini::client($gemini_api_key);


        // $prompt = "Translate the following text into English, French, and Arabic, and return the result in an object like this  one  all in one  line:
        // {\"en\": \"[translated text in English]\", \"fr\": \"[translated text in French]\", \"ar\": \"[translated text in Arabic]\"}.
        // The text to translate is: \"$request->description\"";
        // $result = $client->geminiPro()->generateContent($prompt);

        $project->update([
            "name" => $request->name,
            "description" => $request->input("description"),
            "logo" => $request->hasFile("logo") ? $logoName : $project->logo,
            "preview" => $request->hasFile("preview") ? $previewName : $project->preview
        ]);

        return back()->with("success", "Project has been updated successfully!");
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
        return back()->with("success", "Project has been deleted successfully!");
    }
}
