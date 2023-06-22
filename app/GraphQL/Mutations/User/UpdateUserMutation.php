<?php

namespace App\GraphQL\Mutations\User;

use Closure;
use App\Models\User;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateUserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateUser',
        'description' => 'Updates an User',
    ];

    public function type(): Type
    {
        return GraphQL::type('User');
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
        $user = User::findOrFail($args['id']);
        $user->name = $args['name'] ?? $user->name;
        $user->email = $args['email'] ?? $user->email;
        $user->password = $args['password'] ?? $user->password;
        $user->role = $args['role'] ?? $user->role;
        
        $user->save();

        return $user;
    }
}
