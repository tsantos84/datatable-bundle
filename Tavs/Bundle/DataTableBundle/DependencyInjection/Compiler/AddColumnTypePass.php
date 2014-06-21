<?php

namespace Tavs\Bundle\DataTableBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class AddColumnTypePass
 * @package Tavs\Bundle\MenuBundle\DependenceInjection\Compilerw
 */
class AddColumnTypePass implements CompilerPassInterface
{
    /**
     * @inheritdoc
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('datatable.registry')) {
            return;
        }

        $definition = $container->getDefinition('datatable.registry');

        foreach ($container->findTaggedServiceIds('datatable.column_type') as $id) {
            $definition->addMethodCall('addColumnType', [new Reference($id)]);
        }
    }

} 