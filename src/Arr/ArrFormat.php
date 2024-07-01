<?php

namespace Biin2013\PhpUtils\Arr;

use Biin2013\PhpUtils\Str\StrFormat;

class ArrFormat
{
    /**
     * @param array $data
     * @param int $currentDeep
     * @param int $deep
     * @return array
     */
    public static function arrayKeyToCamel(array $data, int $currentDeep = 1, int $deep = PHP_INT_MAX): array
    {
        $arr = [];
        foreach ($data as $k => $v) {
            $key = is_numeric($k) ? $k : StrFormat::camel($k);
            if ($deep > $currentDeep && is_array($v)) {
                $arr[$key] = self::arrayKeyToCamel($v, ++$currentDeep, $deep);
            } else {
                $arr[$key] = $v;
            }
        }

        return $arr;
    }

    /**
     * @param array $list
     * @param string $leafKey
     * @param string $pidKey
     * @param string $subKey
     * @param string $idKey
     * @return array
     */
    public static function category(
        array  $list,
        string $leafKey = '',
        string $pidKey = 'pid',
        string $subKey = 'children',
        string $idKey = 'id'
    ): array
    {
        $data = [];
        $tree = [];

        foreach ($list as $item) {
            if ($leafKey) {
                $item[$leafKey] = true;
            }
            $data[$item[$idKey]] = $item;
        }

        foreach ($data as $item) {
            if (isset($data[$item[$pidKey]])) {
                if ($leafKey) {
                    $data[$item[$pidKey]][$leafKey] = false;
                }
                if (!isset($data[$item[$pidKey]][$subKey])) {
                    $data[$item[$pidKey]][$subKey] = [];
                }

                $data[$item[$pidKey]][$subKey][] = &$data[$item[$idKey]];
            } else {
                $tree[] = &$data[$item[$idKey]];
            }
        }

        return $tree;
    }
}