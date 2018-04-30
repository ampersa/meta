<?php

namespace Ampersa\Meta\Tags;

class Generic implements Tag
{
    /** @var array */
    protected $content = [];

    /** @var bool  Whether this tag must be unique in the output */
    protected $unique = false;

    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * @inheritdoc
     */
    public function tag()
    {
        return sprintf('<meta name="%s" content="%s">', $this->content['tag'], $this->content['content']);
    }

    /**
     * Determine if the tag can be duplicated in the output
     *
     * @return bool
     */
    public function canBeDuplicated() : bool
    {
        return ! $this->unique;
    }
}
