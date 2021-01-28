<?php

class Url
{
    public function getUrlInfo()
    {
        $currentUrl = $_SERVER['PHP_SELF'];
        $currentPageUrl = $_SERVER['REQUEST_URI'];

        $pathInfo = explode('/', pathinfo($currentUrl)['dirname']);
        $path = '/';

        for ($i = 0; $i < $_ENV['PATH_INFO']; $i++) {
            if (!empty($pathInfo[$i])) {
                $pathInfo[$i] .= '/';
                $path .= $pathInfo[$i];
            }
        }

        $host = $_SERVER['HTTP_HOST'];
        $protocol = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) == 'https' ? 'https' : 'http';

        $uri[0] = $protocol . '://' . $host . $path;
        $uri[1] = $protocol . '://' . $host . $currentPageUrl;
        return $uri;
    }
}
