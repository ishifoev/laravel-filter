<?php

namespace App\Filters\Course;

use App\Filters\FiltersAbstract;
use App\Filters\Course\{AccessFilter, DifficultyFilter, TypeFilter, SubjectFilter, StartedFilter};
use App\Filters\Course\Ordering\ViewsOrder;

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
}