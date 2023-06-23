<?php

namespace App\GraphQL\Queries\Activity;

use Closure;
use App\Models\Activity;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class ActivityQuery extends Query
{
    protected $attributes = [
        'name' => 'activity',
        'description' => 'a query of an activity',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Activity'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Activity::findOrFail($args['id']);
    }
}
