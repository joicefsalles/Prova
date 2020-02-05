<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\contaDados;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL as GraphQL;

class ContaDadosQuery extends Query
{
    protected $attributes = [
        'name' => 'contaDados',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return GraphQL::type('Conta_Dados_type');
    }

    public function args(): array
    {
        return [
            'n_conta' =>[
                'type' => Type::int()

            ],
                'valor' =>[
                    'type' => Type::int()
    
                    ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return [
          contaDados::all()
        ];
    }
}
