<?php

namespace Awm\CustomerImport\Model\Customers;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Customer\Api\Data\CustomerInterfaceFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;

class Import
{
    /**
     * @var CustomerInterfaceFactory
     */
    protected $customerFactory;

    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    /**
     * @param CustomerInterfaceFactory $customerFactory
     * @param CustomerRepositoryInterface $customerRepository
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        CustomerInterfaceFactory $customerFactory,
        CustomerRepositoryInterface $customerRepository,
        StoreManagerInterface $storeManager
    ){
        $this->customerFactory = $customerFactory;
        $this->customerRepository = $customerRepository;
        $this->storeManager = $storeManager;
    }

    /**
     * @param $customersData
     */
    public function import($customersData){

        try {
            foreach ($customersData as $customerData) {
                /*** Set Customer Infomation */
                $customer   = $this->customerFactory->create();
                $customer->setStoreId($this->storeManager->getStore()->getId());
                $customer->setWebsiteId($this->storeManager->getWebsite()->getId());
                $customer->setEmail($customerData['emailaddress']);
                $customer->setFirstname($customerData['fname']);
                $customer->setLastname($customerData['lname']);
                 /*** Save Customer */
                $this->customerRepository->save($customer);

            }
        } catch (\Exception $e) {
            // Todo: save some logs here
        }
    }

}
