<?php

namespace Awm\CustomerImport\Model\Files;

class FilesFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Provide custom price model with basic validation
     *
     * @param string $name
     * @return \Awm\CustomerImport\Model\Files\FileInterface
     * @throws \UnexpectedValueException
     */
    public function create($name)
    {
        $fileType = $this->objectManager->create($name);
        return $fileType;
    }

}
