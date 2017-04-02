<?php

namespace Ampersa\Meta\Tags;

class Charset implements Tag
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
        return sprintf('<meta charset="%s">', $this->content['content']);
    }
}
