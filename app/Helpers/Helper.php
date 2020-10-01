<?php


namespace App\Helpers;


class Helper
{
    /**
     * Common words to exclude.
     */
    private static $common_words = [
        'the', 'be', 'to', 'of', 'and', 'a', 'in', 'that', 'have', 'I', 'it', 'for', 'not', 'on', 'with', 'he', 'as',
        'you', 'do', 'at', 'this', 'but', 's', 'his', 'by', 'from', 'they', 'we', 'say', 'her', 'she', 'or', 'an', 'will',
        'my', 'one', 'all', 'would', 'new', 'com', 'there', 'their', 'what', 'so', 'up', 'out', 'if', 'about', 'who',
        'get', 'which', 'go', 'me,', 'http', '-', 'www', 'is', 'also', 'than', 'your', 'are'
    ];


    /**
     * Find most frequent words in given text
     * @param $text
     * @return array
     */
    public static function getMostFrequentWords($text)
    {
        $words = [];

        $found_words = str_word_count($text, 1);
        $words = array_merge_recursive($words, $found_words);

        $most_frequent_words = array_count_values($words);

        foreach ($most_frequent_words as $key => $value) {
            if (in_array(strtolower($key), self::$common_words)) {
                unset($most_frequent_words[$key]);
            }
        }

        arsort($most_frequent_words);

        return array_slice(array_keys($most_frequent_words), 0, 15);
    }

    /**
     * Check route global function
     * @param $route
     * @return bool
     */
    public static function routeIsActive($route)
    {
        return strpos($_SERVER['REQUEST_URI'], $route) !== false ? 'active' : '';
    }

    /**
     * Slug text
     * @param $string
     * @return string
     */
    public static function slugify($string)
    {
        return trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-');
    }
}