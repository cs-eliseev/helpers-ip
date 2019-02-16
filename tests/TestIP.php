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
}