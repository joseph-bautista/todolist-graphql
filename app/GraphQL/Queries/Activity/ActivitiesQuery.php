<?php

namespace App\GraphQL\Queries\Activity;

use Closure;
use App\Models\Activity;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ActivitiesQuery extends Query
{
    protected $attributes = [
        'name' => 'activities',
        'description' => 'a query of all activities',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Activity'));
    }

    public function resolve($root, $args)
    {
        return Activity::all();
    }
}
