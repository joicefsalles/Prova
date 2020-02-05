<?php

declare(strict_types=1);


namespace App\GraphQL\Types;

use App\contaDados;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class ContaDadosType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ContaDadosType',
        'description' => 'A type',
        'model' => contaDados::class
    ];

    public function fields(): array
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
}
