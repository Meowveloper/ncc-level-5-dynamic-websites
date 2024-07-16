<?php

namespace Helper;

class Text
{
    public static function truncate($text, $limit, $ellipsis = ' ...')
    {
        if (str_word_count($text, 0) > $limit) {
            $words = explode(' ', $text, $limit + 1);
            array_pop($words);
            return implode(' ', $words) . $ellipsis;
        }
        return $text;
    }
}
