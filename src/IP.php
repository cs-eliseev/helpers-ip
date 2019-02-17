<?php

declare(strict_types = 1);

namespace cse\helpers;

/**
 * Class IP
 *
 * @package cse\helpers
 */
class IP
{
    const IP_VERSION_4 = 4;
    const IP_VERSION_6 = 6;

    /**
     * Get real IP
     *
     * @return null|string
     */
    public static function getRealIP(): ?string
    {
        if (!empty($_SERVER['HTTP_X_REAL_IP'])) {
            // Check ip from share internet
            $ip = $_SERVER['HTTP_X_REAL_IP'];
        } elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            // Check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // To check ip is pass from proxy
            $ips = explode(',', str_replace(' ', '', $_SERVER['HTTP_X_FORWARDED_FOR']));
            $ips = array_filter($ips);
            if (count($ips)) $ip = array_pop($ips);
        }

        return empty($ip) ? ($_SERVER['REMOTE_ADDR'] ?? null) : $ip;
    }

    /**
     * Remove subnet mask to IPv6
     *
     * @param string $ip
     * @return mixed
     */
    public static function removeSubnetMaskIPv6(string $ip): ?string
    {
        return preg_replace('/^(.*)(\/[\d]*)$/', '${1}', $ip);
    }

    /**
     * Check is IPv4 address
     *
     * @param string $ip
     * @return bool
     */
    public static function isIPv4(string $ip): bool
    {
        return (bool) filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    /**
     * Check is IPv4 address
     *
     * @param string $ip
     * @return bool
     */
    public static function isIPv6(string $ip): bool
    {
        return (bool) filter_var(self::removeSubnetMaskIPv6($ip), FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }

    /**
     * Get version IP address
     *
     * @param string $ip
     * @return int|null
     */
    public static function getVersionIP(string $ip): ?int
    {
        return self::isIPv4($ip) ? self::IP_VERSION_4 : (self::isIPv6($ip) ? self::IP_VERSION_6 : null);
    }
}