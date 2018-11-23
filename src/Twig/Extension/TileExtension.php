<?php

declare(strict_types=1);

/*
 * (c) Jeroen van den Enden <info@endroid.nl>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Endroid\Tile\Twig\Extension;

use Twig_Extension;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Twig_SimpleFunction;

class TileExtension extends Twig_Extension implements ContainerAwareInterface
{
    /**
     * {@inheritdoc}
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('tile_url', [$this, 'tileUrlFunction']),
        ];
    }

    /**
     * Creates the QR code URL corresponding to the given message and extension.
     *
     * @param $text
     * @param string $extension
     *
     * @return mixed
     */
    public function tileUrlFunction($text, $extension = 'png')
    {
        $router = $this->container->get('router');
        $url = $router->generate('tile', [
            'text' => $text,
            'extension' => $extension,
        ]);

        return $url;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'endroid_tile';
    }
}
