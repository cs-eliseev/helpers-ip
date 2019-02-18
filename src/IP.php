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

    /**
     * Is IP address
     *
     * @param string $ip
     * @return bool
     */
    public static function isIP(string $ip): bool
    {
        return is_int(self::getVersionIP($ip));
    }

    /**
     * Get range IPv6 address
     *
     * @param $ip - ex. 2a0a:2b40::4:60/124
     * @return array  - ex. {2a0a:2b40::4:60, 2a0a:2b40::4:6f}
     */
    public static function getRangeIPv6(string $ip): array
    {
        list($first_addr_str, $prefix_len) = explode('/', $ip);

        // Parse the address into a binary string
        $first_addr_bin = inet_pton($first_addr_str);
        // Convert the binary string to a string with hexadecimal characters
        $addr_hex = unpack('H*', $first_addr_bin);
        $first_addr_hex = reset($addr_hex);
        // Overwriting first address string to make sure notation is optimal
        $first_addr_str = inet_ntop($first_addr_bin);
        // Calculate the number of 'flexible' bits
        $flex_bits = 128 - $prefix_len;
        // Build the hexadecimal string of the last address
        $last_addr_hex = $first_addr_hex;

        // We start at the end of the string (which is always 32 characters long)
        $pos = 31;
        while ($flex_bits > 0) {
            // Get the character at this position
            $orig = substr($last_addr_hex, $pos, 1);
            // Convert it to an integer
            $origval = hexdec($orig);
            // OR it with (2^flexbits)-1, with flexbits limited to 4 at a time
            $new_val = $origval | (pow(2, min(4, $flex_bits)) - 1);
            // Convert it back to a hexadecimal character
            $new = dechex($new_val);
            // And put that character back in the string
            $last_addr_hex = substr_replace($last_addr_hex, $new, $pos, 1);
            // We processed one nibble, move to previous position
            $flex_bits -= 4;
            $pos -= 1;
        }

        // Convert the hexadecimal string to a binary string
        $last_addr_bin = pack('H*', $last_addr_hex);
        // And create an IPv6 address from the binary string
        $last_addr_str = inet_ntop($last_addr_bin);

        return [
            $first_addr_str,
            $last_addr_str,
        ];
    }

    /**
     * Filter IPs address
     *
     * @param array $ips
     * @param int|null $version
     * @return array
     */
    public static function filterIPs(array $ips, ?int $version = null): array
    {
        $result = [self::IP_VERSION_4 => [], self::IP_VERSION_6 => []];

        foreach ($ips as $ip) {
            $current_version = self::getVersionIP($ip);
            if (is_int($current_version)) $result[$current_version][] = $ip;
        }

        return is_int($version) ? $result[$version] : $result;
    }
}