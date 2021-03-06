<?php

namespace Mouf\Database\MagicQuery\Twig;
use Twig_Error_Loader;
use Twig_Source;

/**
 * This loader completely bypasses the loader mechanism, by directly passing the key as a template.
 * Useful in our very case.
 *
 * This is a reimplementation of Twig's String loader that has been deprecated.
 * We enable it back in our case because there won't be a million of different cache keys.
 * And yes, we know what we are doing :)
 */
class StringLoader implements \Twig_LoaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getSource($name)
    {
        return $name;
    }
    /**
     * {@inheritdoc}
     */
    public function getCacheKey($name)
    {
        return $name;
    }
    /**
     * {@inheritdoc}
     */
    public function isFresh($name, $time)
    {
        return true;
    }

    /**
     * Returns the source context for a given template logical name.
     *
     * @param string $name The template logical name
     *
     * @return Twig_Source
     *
     * @throws Twig_Error_Loader When $name is not found
     */
    public function getSourceContext($name)
    {
        return new Twig_Source($name, $name);
    }

    /**
     * Check if we have the source code of a template, given its name.
     *
     * @param string $name The name of the template to check if we can load
     *
     * @return bool If the template source code is handled by this loader or not
     */
    public function exists($name)
    {
        return true;
    }
}
