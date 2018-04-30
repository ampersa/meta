<?php

namespace Ampersa\Meta;

class Meta
{
    /** @var array */
    protected $tagTypes = [
        'canonical'     => \Ampersa\Meta\Tags\Canonical::class,
        'charset'       => \Ampersa\Meta\Tags\Charset::class,
        'description'   => \Ampersa\Meta\Tags\Description::class,
        'favicon'       => \Ampersa\Meta\Tags\Favicon::class,
        'http-equiv'    => \Ampersa\Meta\Tags\Httpequiv::class,
        'og'            => \Ampersa\Meta\Tags\Opengraph::class,
        'publisher'     => \Ampersa\Meta\Tags\Publisher::class,
        'shortcut-icon' => \Ampersa\Meta\Tags\Favicon::class,
        'title'         => \Ampersa\Meta\Tags\Title::class,
        'twitter'       => \Ampersa\Meta\Tags\Twitter::class,
        'viewport'      => \Ampersa\Meta\Tags\Viewport::class,
    ];

    protected $genericTag = \Ampersa\Meta\Tags\Generic::class;

    /** @var array */
    protected $meta = [];

    /**
     * Construct and setup the class. Array of tags may be passed to init
     *
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
     *
     * @param Tag|array   $type
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

        // Create an instance of the Tag class outside of setting so that we can
        // access the properties to determine our next actions before setting
        $tagInstance = new $class(['tag' => $tag, 'content' => $value]);

        $key = get_class($tagInstance);

        // If the Tag instance specifies that the tag can be duplicated in the output,
        // then append a random time-based string to the key name so as to allow
        // tags of the same type to be set. This isn't perfect, but it works!
        if ($tagInstance->canBeDuplicated()) {
            $key = $key . sha1($key . mt_rand());
        }

        $this->meta[$key] = $tagInstance;

        return $this;
    }

    /**
     * Return a string containing all the meta tags delimited with a newline
     *
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
     *
     * @return array
     */
    public function all()
    {
        return $this->meta;
    }
}
