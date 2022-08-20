<?php


namespace App\Core;


class Request
{

    /**
     * Returns URI path, filters get parameters out
     *
     * @return false|mixed|string
     */
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');


        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost(): bool
    {
        return $this->method() === 'post';
    }

    public function isGet(): bool
    {
        return $this->method() === 'get';
    }

    public function getBody(): array
    {
        $body = [];

        //TODO: Input sanitize interface

        if ($this->isGet()) {
            foreach ($_GET as $key => $item) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->isPost()) {
            foreach ($_POST as $key => $item) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

}