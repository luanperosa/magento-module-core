<?php

namespace TheITNerd\Core\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\ObjectManager;
use Magento\Store\Model\ScopeInterface;
use TheITNerd\Core\Api\Adapters\PostcodeClientInterface;

/**
 * Class Config
 * @package TheITNerd\Core\Helper
 */
class Config extends AbstractHelper
{
    public const ADDRESS_SEARCH_API_ENABLED_CONFIG_PATH = "address_search/api/enabled";
    public const ADDRESS_SEARCH_API_ADAPTER_CONFIG_PATH = "address_search/api/adapter";

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::ADDRESS_SEARCH_API_ENABLED_CONFIG_PATH, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return PostcodeClientInterface
     */
    public function getAdapter(): PostcodeClientInterface
    {
        return ObjectManager::getInstance()->get($this->scopeConfig->getValue(self::ADDRESS_SEARCH_API_ADAPTER_CONFIG_PATH, ScopeInterface::SCOPE_STORE));
    }

}
