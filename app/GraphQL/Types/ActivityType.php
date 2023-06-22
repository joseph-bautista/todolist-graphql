<?php

namespace App\GraphQL\Types;

use App\Models\Activity;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ActivityType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Activity',
        'description' => 'A Todo item',
        'model' => Activity::class

    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The ID of the Activity',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the Activity',
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'Detailed description of an Activity'
            ],
            'is_completed' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'Indicates whether the Activity is completed or not',
            ],
            'completed_date' => [
                'type' => Type::string(),
                'description' => 'The completion date of the Activity',
            ],
        ];
    }
}
