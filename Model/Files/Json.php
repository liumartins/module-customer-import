<?php

namespace Awm\CustomerImport\Model\Files;

use Magento\Framework\Exception\FileSystemException;
use Magento\Framework\Filesystem\Driver\File;
use Magento\Framework\Serialize\Serializer\Json as JsonFile;

class Json implements FileInterface
{
    /**
     * @var File
     */
    protected $file;

    /**
     * @var JsonFile
     */
    protected $json;

    public function __construct(
        File $file,
        JsonFile $json
    ){
        $this->file = $file;
        $this->json = $json;
    }

    /**
     * @param $file
     * @return array|bool|float|int|mixed|string|void|null
     */
    public function process($file){
        try {
            if ($this->file->isExists($file)) {
                $contents =  $this->file->fileGetContents($file);
                $jsonDecode = $this->json->unserialize($contents);
                return $jsonDecode;
            }
        } catch (FileSystemException $e) {

        }
    }
}
