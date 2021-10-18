<?php

namespace Awm\CustomerImport\Model;

use Awm\CustomerImport\Model\Files\FilesFactory;

class Files
{
    /**
     * @var FilesFactory
     */
    protected $filesFactory;

    /**
     * @var array
     */
    protected $files;

    /**
     * @param FilesFactory $filesFactory
     * @param array $files
     */
    public function __construct(
        FilesFactory $filesFactory,
        array $files
    ){
        $this->filesFactory = $filesFactory;
        $this->files = $files;
    }

    /**
     * @param $filePath
     * @param $filetype
     * @return mixed
     */
    public function readFile($filePath, $filetype){
        $type = $this->getFileType($filetype);
        $fileModel = $this->filesFactory->create($this->files[$type]);
        return $fileModel->process($filePath);
    }

    /**
     * @param $file
     * @return mixed|string
     */
    private function getFileType($file){
        $array = explode('-', $file);
        return $array[1];
    }
}
