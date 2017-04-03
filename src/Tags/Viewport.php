<?php

namespace Ampersa\Meta\Tags;

class Viewport implements Tag
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
        return sprintf('<meta name="viewport" content="%s">', $this->content['content']);
    }
}
