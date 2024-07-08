<?php

if (!function_exists('get_gravatar_url')) {
    /**
     * Generate a Gravatar URL for the user based on their email address.
     *
     * @param string $email The user's email address.
     * @param int $size The size of the Gravatar image.
     * @param string $default The default image to be displayed if no Gravatar is found.
     * @param string $rating The content rating for the image.
     * @return string The Gravatar URL.
     */
    function get_gravatar_url($email, $size = 100, $default = 'identicon', $rating = 'g')
    {
        $url = "https://secure.gravatar.com/avatar";
        $hash = md5(strtolower(trim($email)));
        return "{$url}/{$hash}?s={$size}&d={$default}&r={$rating}";
    }
}
