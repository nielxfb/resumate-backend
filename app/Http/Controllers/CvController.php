<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Cv;
use App\Models\ResumeFeature;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function getAll()
    {
        return response()->json(Cv::all());
    }

    public function getByAnalysisId(Request $request)
    {
        $analysis = Analysis::find($request->analysisId);
        $cv = Cv::where('analysis_id', $request->analysisId)->get();
        $resumeFeatures = ResumeFeature::where('analysis_id', $request->analysisId)->get();

        return response()->json([
            'analysis' => $analysis,
            'cvs' => $cv,
            'resumeFeatures' => $resumeFeatures
        ]);
    }

    public function create(Request $request)
    {
        $cv = new Cv();
        $cv->file_name = $request->file_name;
        $cv->file_path = $request->file_path;
        $cv->education_rating = $request->education_rating;
        $cv->gpa_rating = $request->gpa_rating;
        $cv->job_rating = $request->job_rating;
        $cv->years_rating = $request->years_rating;
        $cv->experience_rating = $request->experience_rating;
        $cv->skill_rating = $request->skill_rating;
        $cv->soft_skill_rating = $request->soft_skill_rating;
        $cv->language_rating = $request->language_rating;
        $cv->save();
        return response()->json(['message' => 'Cv created', 'cv' => $cv], 201);
    }
}
