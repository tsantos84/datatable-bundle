<?php

namespace Tavs\Bundle\DataTableBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('data_table');

        $rootNode
            ->children()
                ->arrayNode('twig')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('layout')
                            ->defaultValue('datatable_layout.html.twig')
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
