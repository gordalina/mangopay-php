<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Tests\Integration;

use Gordalina\Mangopay\Client;
use Gordalina\Mangopay\Config;

class IntegrationTestCase extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (MANGOPAY_RUN_INTEGRATION_TESTS === false) {
            $this->markTestSkipped('Integration tests are not enabled');
        }
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        $client = new Client($this->getConfig());
        $client->setSandbox(true);

        return $client;
    }

    /**
     * @return Config
     */
    protected function getConfig()
    {
        return new Config(
            MANGOPAY_PARTNER,
            MANGOPAY_PRIVATE_KEY,
            MANGOPAY_PRIVATE_KEY_PASSPHRASE
        );
    }
}
