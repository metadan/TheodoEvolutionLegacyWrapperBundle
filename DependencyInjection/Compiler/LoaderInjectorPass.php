<?php

namespace Theodo\Evolution\Bundle\LegacyWrapperBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * LoaderInjectorPass
 * 
 * @author Benjamin Grandfond <benjaming@theodo.fr>
 */
class LoaderInjectorPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        // Inject composer.loader into tagged "loader_aware" services
        $taggedServices = $container->findTaggedServiceIds('loader_aware');
        foreach ($taggedServices as $id => $attributes) {
            $container->getDefinition($id)->addMethodCall('setLoader', array(new Reference('composer.loader')));
        }
    }
}
