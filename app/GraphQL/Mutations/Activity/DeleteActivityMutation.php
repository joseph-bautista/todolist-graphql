<?php

namespace App\GraphQL\Mutations\Activity;

use Closure;
use App\Models\Activity;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteActivityMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteActivity',
        'description' => 'Deletes an Activity',
    ];

    public function type(): Type
    {
        return Type::boolean();
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
        $activity = Activity::findOrFail($args['id']);

        return $activity->delete() ? true : false;
    }
}
