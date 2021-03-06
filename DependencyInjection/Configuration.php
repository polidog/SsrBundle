<?php

namespace Polidog\SsrBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('polidog_ssr');

        $rootNode
            ->children()
                ->scalarNode('bundle_src_path')->isRequired()->end()
                ->scalarNode('cache')->defaultFalse()->end()
                ->arrayNode('baracoa')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('object')->defaultValue('polidog_ssr.baracore')->isRequired()->end()
                        ->scalarNode('cache_object')->defaultValue('polidog_ssr.cache_baracore')->isRequired()->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
