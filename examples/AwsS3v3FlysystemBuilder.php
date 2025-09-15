<?php

use League\Flysystem\Filesystem;
use trntv\filekit\filesystem\FilesystemBuilderInterface;
use yii\base\BaseObject;

/**
 * Class AwsS3v3FlysystemBuilder
 * @author Eugene Terentev <eugene@terentev.net>
 */
class AwsS3v3FlysystemBuilder extends BaseObject implements FilesystemBuilderInterface
{
    public $key;
    public $secret;
    public $region;

    /**
     * @return mixed
     */
    public function build()
    {
        $client = new Aws\S3\S3Client([
            'credentials' => [
                'key'    => $this->key,
                'secret' => $this->secret
            ],
            'region' => $this->region,
            'version' => 'latest',
        ]);

        // Flysystem v3 AWS S3 adapter namespace / classname depends on the adapter package;
        // common package provides AwsS3V3\AwsS3Adapter (adjust if your adapter differs)
        $adapter = new \League\Flysystem\AwsS3V3\AwsS3Adapter($client, 'your-bucket-name');
        $filesystem = new Filesystem($adapter);

        return $filesystem;
    }
}
