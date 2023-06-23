<?php

namespace App\GraphQL\Mutations\Activity;

use Closure;
use App\Models\Activity;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateActivityMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateActivity',
        'description' => 'Updates an Activity',
    ];

    public function type(): Type
    {
        return GraphQL::type('Activity');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::string(),
            ],
            'is_completed' => [
                'name' => 'is_completed',
                'type' => Type::boolean(),
            ],
            'user_id' => [
                'name' => 'user_id',
                'type' => Type::int(),
            ]
            
        ];
    }

    public function resolve($root, $args)
    {
        $activity = Activity::findOrFail($args['id']);
        $activity->name = $args['name'] ?? $activity->name;
        $activity->description = $args['description'] ?? $activity->description;
        $activity->user_id = $args['user_id'] ?? $activity->user_id;
        $activity->is_completed = $args['is_completed'] ?? $activity->is_completed;
        if($args['is_completed']){
            $activity->completed_date = Carbon::now();
        }
        $activity->save();

        return $activity;
    }
}
