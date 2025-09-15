<?php

use League\Flysystem\Local\LocalFilesystemAdapter;
use League\Flysystem\Filesystem;
use yii\base\BaseObject;

/**
 * Class LocalFilesystemBuilder
 * @author Eugene Terentev <eugene@terentev.net>*
 *
 */
class LocalFilesystemBuilder extends BaseObject implements \trntv\filekit\filesystem\FilesystemBuilderInterface
{
    /**
     * @var
     */
    public $path;

    /**
     * @return Filesystem
     */
    public function build()
    {
        $adapter = new LocalFilesystemAdapter(\Yii::getAlias($this->path));
        return new Filesystem($adapter);
    }
}
