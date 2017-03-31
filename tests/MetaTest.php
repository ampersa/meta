<?php

use Ampersa\Meta\Meta;
use Ampersa\Meta\Tag;

class MetaTest extends PHPUnit_Framework_TestCase
{
    public function testMetaSets()
    {
        $meta = new Meta;
        $meta->add(new Tag(Meta::META_TITLE, ['This is a test title']));
        $meta->add(new Tag(Meta::META_GENERIC, ['key', 'value']));

        $this->assertEquals([
            new Tag(Meta::META_TITLE, ['This is a test title']),
            new Tag(Meta::META_GENERIC, ['key', 'value'])
        ], $meta->all());
    }

    public function testMetaOutputs()
    {
        $meta = new Meta;
        $meta->add(new Tag(Meta::META_TITLE, ['This is a test title']));
        $meta->add(new Tag(META::META_GENERIC, ['key', 'value']));

        $this->assertEquals('<title>This is a test title</title>'."\n".'<meta name="key" content="value">', $meta->output());
    }

    public function testMetaSetsViaArray()
    {
        $meta = new Meta;
        $meta->add([
            new Tag(Meta::META_TITLE, ['This is a test title']),
            new Tag(Meta::META_GENERIC, ['key', 'value']),
        ]);

        $this->assertEquals('<title>This is a test title</title>'."\n".'<meta name="key" content="value">', $meta->output());
    }

    public function testMetaSetsViaConstructor()
    {
        $meta = new Meta([
            new Tag(Meta::META_TITLE, ['This is a test title']),
            new Tag(Meta::META_GENERIC, ['key', 'value']),
        ]);

        $this->assertEquals('<title>This is a test title</title>'."\n".'<meta name="key" content="value">', $meta->output());
    }

    public function testMetaSetsViaShorthand()
    {
        $meta = new Meta([
            new Tag('title', ['This is a test title']),
            new Tag('generic', ['key', 'value']),
        ]);

        $this->assertEquals('<title>This is a test title</title>'."\n".'<meta name="key" content="value">', $meta->output());
    }

    public function testArrayBasedMetaOG()
    {
        $meta = new Meta;
        $meta->add(new Tag(Meta::META_OPENGRAPH, [
            [
                'url' => 'https://test.com',
                'image' => 'prettyPicture.png',
                'image:width' => '500',
                'image:height' => '300',
                'title' => 'A lovely Facebook post',
                'group' => [
                    'one' => '1',
                    'two' => '2'
                ]
            ]
        ]));

        $this->assertEquals('<meta property="og:url" content="https://test.com">'."\n".'<meta property="og:image" content="prettyPicture.png">'."\n".'<meta property="og:image:width" content="500">'."\n".'<meta property="og:image:height" content="300">'."\n".'<meta property="og:title" content="A lovely Facebook post">'."\n".'<meta property="og:group:one" content="1">'."\n".'<meta property="og:group:two" content="2">', $meta->output());
    }

    public function testArrayBasedMetaTwitter()
    {
        $meta = new Meta;
        $meta->add(new Tag(Meta::META_TWITTER, [
            [
                'card' => 'summary',
                'site' => '@AmpersaUK',
                'title' => 'Meta tags'
            ],
        ]));

        $this->assertEquals('<meta name="twitter:card" content="summary">'."\n".'<meta name="twitter:site" content="@AmpersaUK">'."\n".'<meta name="twitter:title" content="Meta tags">', $meta->output());
    }
}
