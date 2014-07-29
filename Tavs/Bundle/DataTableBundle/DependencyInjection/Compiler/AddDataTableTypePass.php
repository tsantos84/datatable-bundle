<?php
namespace Tavs\Bundle\DataTableBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class AddDataTableTypePass
 * @package Tavs\Bundle\DataTableBundle\DependencyInjection\Compiler
 */
class AddDataTableTypePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('datatable.registry')) {
            return;
        }

        $definition = $container->getDefinition('datatable.registry');

        foreach ($container->findTaggedServiceIds('datatable.type') as $id => $tags) {
            $definition->addMethodCall('addDataTableType', array(
                new Reference($id)
            ));
        }
    }
}
