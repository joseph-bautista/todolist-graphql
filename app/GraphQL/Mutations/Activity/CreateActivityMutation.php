<?php

namespace App\GraphQL\Mutations\Activity;

use Closure;
use App\Models\Activity;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateActivityMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createActivity',
        'description' => 'Creates an Activity',
    ];

    public function type(): Type
    {
        return GraphQL::type('Activity');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string(),
            ],
            'user_id' => [
                'name' => 'user_id',
                'type' => Type::int(),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $activity = new Activity();
        $activity->name = $args['name'];
        $activity->description = $args['description'] ?? '';
        $activity->user_id = $args['user_id'] ?? '';
        $activity->is_completed = 0;
        $activity->completed_date = '';
        $activity->save();

        return $activity;
    }
}
