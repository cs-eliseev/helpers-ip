<?php

use cse\helpers\IP;
use PHPUnit\Framework\TestCase;

class TestIP extends TestCase
{
    /**
     * @param array $server
     * @param string $expected
     *
     * @dataProvider  providerGetRealIp
     *
     * @runInSeparateProcess
     */
    public function testGetRealIp(array $server, string $expected): void
    {
        $_SERVER = array_merge($_SERVER, $server);

        $this->assertEquals($expected, IP::getRealIP());
    }

    /**
     * @return array
     */
    public function providerGetRealIp(): array
    {
        return [
            [
                [
                    'HTTP_X_REAL_IP' => '',
                    'HTTP_CLIENT_IP' => '',
                    'HTTP_X_FORWARDED_FOR' => '10.10.10.160, 10.10.10.161, 10.10.10.162',
                ],
                '10.10.10.162',
            ],
        ];
    }

    /**
     * @param array $server
     * @param string $expected
     *
     * @dataProvider  providerRemoveSubnetMaskIPv6
     *
     * @runInSeparateProcess
     */
    public function testRemoveSubnetMaskIPv6(string $ip, string $expected): void
    {
        $this->assertEquals($expected, IP::removeSubnetMaskIPv6($ip));
    }

    /**
     * @return array
     */
    public function providerRemoveSubnetMaskIPv6(): array
    {
        return [
            [
                '2a0a:2b40::4:60',
                '2a0a:2b40::4:60'
            ],
            [
                '2a0a:2b40::4:60/124',
                '2a0a:2b40::4:60'
            ],
        ];
    }
}