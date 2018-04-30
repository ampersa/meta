<?php

namespace Ampersa\Meta\Tags;

interface Tag
{
    /**
     * Create the new Tag
     *
     * @param array  $content
     */
    public function __construct(array $content);

    /**
     * Return the HTML tag for this meta
     *
     * @return string
     */
    public function tag();

    /**
     * Determine if the tag can be duplicated in the output
     *
     * @return bool
     */
    public function canBeDuplicated() : bool;
}
