<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\contaDados;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Facades\GraphQL as GraphQL;

class contaDadosMutation extends Mutation
{
    protected $attributes = [
        'name' => 'contaDados',
        'description' => 'A mutation'
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
    
                ],
                'acao' =>[
                    'type' => Type::string()
    
                ]
                

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
       // $fields = $getSelectFields();
        //$select = $fields->getSelect();
        //$with = $fields->getRelations();
        if($args['acao'] == 'saque'){
            $saldoAnt= contaDados::where('n_conta', $args['n_conta'])->select();
            if($saldoAnt < $args['valor']){
              $dados = contaDados::updated([
                  'valor' => ($saldoAnt - $args['valor'])
              ]) ; 
              
              

            }
            $dados = 'saldo insuficiente';

        }

        if($args['acao'] == 'deposito'){
            if($saldoAnt < $args['valor']){
                $dados = contaDados::updated([
                    'valor' => ($saldoAnt + $args['valor'])
                ]) ; 
  
              }
        }
        if($args['acao'] == 'saldo'){
                $dados = $args['valor'];
        }

        return $dados;

    }
}
