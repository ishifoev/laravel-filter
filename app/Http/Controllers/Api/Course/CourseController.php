<?php

namespace App\Http\Controllers\Api\Course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Filters\Course\{AccessFilter, DifficultyFilter, TypeFilter, SubjectFilter, StartedFilter};
use  App\Http\Resources\CourseResource;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        return new CourseResource(
            Course::with(['subjects', 'users'])->latest()->filter($request)->paginate(2)
        );
    }

    protected function getFilters()
    {
        return [];
    }
}
