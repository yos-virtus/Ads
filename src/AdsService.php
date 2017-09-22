<?php 

namespace Ads; 

class AdsService
{
    protected $retrieveBehavior;
    protected $logger;
    protected $isLoggingOn = true;

    public function __construct(string $dataSourceType, $logger)
    {
        $reflectionDataSource = new \ReflectionClass("Ads\\RetrieveFrom" . $dataSourceType);
        $this->retrieveBehavior = $reflectionDataSource->newInstance();

        $this->logger = $logger;
    }

    /**
     * Get an ad object
     * 
     * @param  int $id
     * @return Ads\Ad
     */
    public function retrieveAd($id)
    {
        $ad = $this->retrieveBehavior->retrieve($id);
        if ($this->isLoggingOn) {
            $this->logger->log(date("Y-m-d H:m:s") . " " . $this->getInvokedMethodName() . "(id={$id})");
        }
        return $ad;
    }

    public function turnOnLogging()
    {
        $this->isLoggingOn = true;
    }

    public function turnOffLogging()
    {
        $this->isLoggingOn = false;
    }

    public function getInvokedMethodName()
    {
        $className = (new \ReflectionClass($this->retrieveBehavior))->getShortName();
        if ($className == 'RetrieveFromDeamon') {
            $method = "get_deamon_ad_info";
        } elseif ($className == 'RetrieveFromMySQL') {
            $method = "getAdRecord";
        } else {
            $method = "unknown";
        }

        return $method;
    }

}