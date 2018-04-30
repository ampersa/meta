<?php

namespace Ampersa\Meta\Tags;

class Httpequiv extends Generic
{
    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = false;

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta http-equiv="%s" content="%s">', $this->content['tag'], $this->content['content']);
    }
}
