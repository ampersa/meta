<?php

namespace Ampersa\Meta\Tags;

class Httpequiv implements Tag
{
    /** @var array */
    protected $content = [];

    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta http-equiv="%s" content="%s">', $this->content['tag'], $this->content['content']);
    }
}
