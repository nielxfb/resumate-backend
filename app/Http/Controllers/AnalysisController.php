<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function getAll()
    {
        return Analysis::all();
    }

    public function getByUserId(Request $request)
    {
        $analysis = Analysis::where('user_id', $request->user_id)->get();
        return response()->json($analysis);
    }

    public function saveResult(Request $request)
    {
        $analysis = new Analysis();
        $analysis->user_id = $request->user_id;
        $analysis->date = $request->date;
        $analysis->education_target = $request->education_target;
        $analysis->gpa_target = $request->gpa_target;
        $analysis->job_target = $request->job_target;
        $analysis->years_target = $request->years_target;
        $analysis->experience_target = $request->experience_target;
        $analysis->skill_target = $request->skill_target;
        $analysis->soft_skill_target = $request->soft_skill_target;
        $analysis->language_target = $request->language_target;
        $analysis->cv_id = $request->cv_id;
        $analysis->save();

        return response()->json(['message' => 'Analysis created', 'analysis' => $analysis], 201);
    }
}
