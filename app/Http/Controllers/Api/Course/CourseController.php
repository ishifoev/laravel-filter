<?php

namespace App\Http\Controllers\Api\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Filters\Course\{AccessFilter, CourseFilters, DifficultyFilter, TypeFilter, SubjectFilter, StartedFilter};
use  App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        return new CourseResource(
            Course::with(['subjects', 'users'])->latest()->filter($request)->paginate(2)
        );
    }

    public function filters()
    {
        return response()->json([
            'data' => CourseFilters::mappings()
        ], 200);
    }

    protected function getFilters()
    {
        return [];
    }
}
