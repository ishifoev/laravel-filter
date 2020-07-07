<?php

namespace App\Filters\Course;

use App\Filters\FiltersAbstract;
use App\Filters\Course\{AccessFilter, DifficultyFilter, TypeFilter, SubjectFilter, StartedFilter};
use App\Filters\Course\Ordering\ViewsOrder;
use App\Models\Subject;

class CourseFilters extends FiltersAbstract
{
    protected $filters = [
        'access' => AccessFilter::class,
        'difficulty' => DifficultyFilter::class,
        'type' => TypeFilter::class,
        'subject' => SubjectFilter::class,
        'started' => StartedFilter::class,
        'created_at' => ViewsOrder::class
    ];

    public static function mappings()
    {
        $map = [
          'access' => [
              'free' => 'Free',
              'premium' => 'Premium'
          ],
          'difficulty' => [
            'beginner' => 'Beginner', 
            'intermediate' => 'Intermediate',
            'advanced' => 'Advanced'
          ],
          'type' => [
            'theory' => 'Theory', 
            'project' => 'Project',
            'snippet' => 'Snippet'
          ],
          'subjects' => Subject::get()->pluck('name', 'slug')->toArray()
        ];

        if(auth()->check()) {
            $map = array_merge($map, [
                'started' => [
                    'true' => 'Started',
                    'false' => 'Not Started'
                ]
            ]);
        }

        return $map;
    }
}
