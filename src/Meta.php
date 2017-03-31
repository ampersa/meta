<?php

namespace Ampersa\Meta;

use Ampersa\Meta\Tag;
use Ampersa\Meta\Types\Type;

class Meta
{
    const META_CHARSET      = \Ampersa\Meta\Types\Chartset::class;
    const META_DESCRIPTION  = \Ampersa\Meta\Types\Description::class;
    const META_GENERIC      = \Ampersa\Meta\Types\Generic::class;
    const META_HTTPEQUIV    = \Ampersa\Meta\Types\Httpequiv::class;
    const META_OPENGRAPH    = \Ampersa\Meta\Types\Opengraph::class;
    const META_TITLE        = \Ampersa\Meta\Types\Title::class;
    const META_TWITTER      = \Ampersa\Meta\Types\Twitter::class;
    const META_VIEWPORT     = \Ampersa\Meta\Types\Viewport::class;

    /** @var array */
    protected $meta = [];

    /**
     * Construct and setup the class. Array of Types may be passed to init
     * @param array $types
     */
    public function __construct(array $types = null)
    {
        if (!is_null($types)) {
            $this->add($types);
        }
    }

    /**
     * Add a new Meta type
     * @param Type|array  $type
     */
    public function add($type)
    {
        if (is_array($type)) {
            foreach ($type as $entry) {
                $this->add($entry);   
            }

            return $this;
        }

        if (!$type instanceof Type and !$type instanceof Tag) {
            throw new InvalidArgumentException('Meta must be an instance of Ampersa\Meta\Types\Type or Ampersa\Meta\Tag');
        }

        $this->meta[] = $type;

        return $this;
    }

    /**
     * Return a string containing all the meta tags delimited with a newline
     * @return string
     */
    public function output()
    {
        $output = [];
        foreach ($this->meta as $meta) {
            $output[] = $meta->tag();
        }

        return implode("\n", $output);
    }

    /**
     * Return all the stored Meta
     * @return array
     */
    public function all()
    {
        return $this->meta;
    }
}
