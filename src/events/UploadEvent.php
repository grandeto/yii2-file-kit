<?php
namespace trntv\filekit\events;
use yii\base\Event;

/**
 * Class UploadEvent
 * @package trntv\filekit\events
 * @author Eugene Terentev <eugene@terentev.net>
 */
class UploadEvent extends Event
{
    /**
     * @var mixed
     */
    public $filesystem;
    /**
     * @var string
     */
    public $path;
    /**
     * @var mixed|null File object is not provided by Flysystem v3; use filesystem read/write methods instead
     */
    public $file;
}
