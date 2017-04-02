<?php

namespace Ampersa\Meta;

use Ampersa\Meta\Tags\Tag;

class Meta
{
    /** @var array */
    protected $tagTypes = [
        'charset'       => \Ampersa\Meta\Tags\Charset::class,
        'description'   => \Ampersa\Meta\Tags\Description::class,
        'http-equiv'    => \Ampersa\Meta\Tags\Httpequiv::class,
        'twitter'       => \Ampersa\Meta\Tags\Twitter::class,
        'og'            => \Ampersa\Meta\Tags\Opengraph::class,
        'title'         => \Ampersa\Meta\Tags\Title::class,
        'viewport'      => \Ampersa\Meta\Tags\Viewport::class,
    ];

    protected $genericTag = \Ampersa\Meta\Tags\Generic::class;
    
    /** @var array */
    protected $meta = [];

    /**
     * Construct and setup the class. Array of tags may be passed to init
     * @param array $types
     */
    public function __construct(array $tags = null)
    {
        if (!is_null($tags)) {
            $this->set($tags);
        }
    }

    /**
     * Set a new Meta tag
     * @param Type|array  $type
     * @param string|null $value
     */
    public function set($tag, $value = null)
    {
        if (is_array($tag)) {
            foreach ($tag as $sTag => $sValue) {
                $this->set($sTag, $sValue);   
            }

            return $this;
        }

        $class = $this->genericTag;

        // Does this tag have a Tag class?
        if (array_key_exists($tag, $this->tagTypes)) {
            $class = $this->tagTypes[$tag];
        }
        
        $this->meta[] = new $class(['tag' => $tag, 'content' => $value]);

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
