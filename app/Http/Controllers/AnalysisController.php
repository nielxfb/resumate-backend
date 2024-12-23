<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Cv;
use App\Models\ResumeFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnalysisController extends Controller
{
    public function getAll()
    {
        return Analysis::all();
    }

    public function getByUserId(Request $request)
    {
        $analysis = Analysis::where('user_id', $request->userId)->get();
        $analysis->load('cvs');
        return response()->json($analysis);
    }

    public function saveResult(Request $request)
    {
        Analysis::insert([
            'user_id' => $request->userId,
            'date' => $request->date,
            'education_target' => $request->educationTarget,
            'gpa_target' => $request->gpaTarget,
            'job_target' => $request->jobTarget,
            'years_target' => $request->yearsTarget,
            'experience_target' => $request->experienceTarget,
            'skill_target' => $request->skillTarget,
            'soft_skill_target' => $request->softSkillTarget,
            'language_target' => $request->languageTarget,
        ]);

        $analysisId = Analysis::latest('id')->first()->id;

        foreach ($request->resumeFeatures as $resumeFeatureData) {
            ResumeFeature::insert([
                'user_id' => $request->userId,
                'date' => $request->date,
                'education' => $resumeFeatureData['educations'],
                'gpa' => $resumeFeatureData['gpa'],
                'job' => $resumeFeatureData['jobTitles'],
                'years' => $resumeFeatureData['yearsExperiences'],
                'experience' => $resumeFeatureData['experiences'],
                'skill' => $resumeFeatureData['skills'],
                'soft_skill' => $resumeFeatureData['softSkills'],
                'language' => $resumeFeatureData['languages'],
                'analysis_id' => $analysisId,
            ]);
        }

        foreach ($request->cvs as $cvData) {
            Cv::insert([
                'file_name' => $cvData['fileName'],
                'file_path' => $cvData['fileURL'],
                'education_rating' => $cvData['educationRating'],
                'gpa_rating' => $cvData['gpaRating'],
                'job_rating' => $cvData['jobRating'],
                'years_rating' => $cvData['yearsRating'],
                'experience_rating' => $cvData['experienceRating'],
                'skill_rating' => $cvData['skillRating'],
                'soft_skill_rating' => $cvData['softSkillRating'],
                'language_rating' => $cvData['languageRating'],
                'analysis_id' => $analysisId,
            ]);
        }

        return response()->json(['message' => 'Analysis created'], 201);
    }
}
