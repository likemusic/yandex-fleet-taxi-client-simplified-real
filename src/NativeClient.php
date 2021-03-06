<?php

namespace Likemusic\YandexFleetTaxiClientSimplified\Real;

use Http\Client\Curl\Client as CurlClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Likemusic\YandexFleetTaxiClient\Client as BaseNativeClient;
use Likemusic\YandexFleetTaxiClient\PageParser\FleetTaxiYandexRu\Index as DashboardPageParser;
use Likemusic\YandexFleetTaxiClient\PageParser\PassportYandexRu\Auth\Welcome as WelcomePageParser;

class NativeClient extends BaseNativeClient
{
    public function __construct($options)
    {
        $httpClient = new CurlClient(null, null, $options);

        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $welcomePageParser = new WelcomePageParser();
        $dashboardPageParser = new DashboardPageParser();


        parent::__construct($httpClient, $requestFactory, $streamFactory, $welcomePageParser, $dashboardPageParser);
    }
}
