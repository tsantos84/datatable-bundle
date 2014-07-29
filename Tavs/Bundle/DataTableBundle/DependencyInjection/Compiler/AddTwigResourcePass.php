<?php

namespace Tavs\Bundle\DataTableBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class AddTwigResourcePass
 * @package Tavs\Bundle\DataTableBundle\DependencyInjection\Compiler
 */
class AddTwigResourcePass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('twig.loader.filesystem') || !$container->hasDefinition('datatable.twig_extension')) {
            return;
        }

        // adiciona a pasta do recurso padrão do componente
        $refl = new \ReflectionClass('Tavs\DataTable\DataTableInterface');
        $path = dirname($refl->getFileName()).'/Resources/views';
        $container->getDefinition('twig.loader.filesystem')->addMethodCall('addPath', array($path));

        // adiciona o recurso para o DataTable
        $definition = $container->getDefinition('datatable.twig_extension');
        $definition->replaceArgument(0, $container->getParameter('datatable.twig_layout'));
    }
}
