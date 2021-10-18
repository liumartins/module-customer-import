<?php

namespace Awm\CustomerImport\Model\Files;

interface FileInterface
{
    /**
     * @param $file
     * @return mixed
     */
    public function process($file);
}
