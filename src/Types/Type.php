<?php

namespace Ampersa\Meta\Types;

interface Type
{
    /**
     * Return the HTML tag for this meta
     * @return string
     */
    public function tag();
}
