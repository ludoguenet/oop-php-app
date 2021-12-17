<?php

namespace Routes;

class Router
{
    private string $route;

    public function __construct(string $route)
    {
        $this->route = $route;
    }

    public function parseRoute(): array
    {
        return explode('/', str_replace('', "", $this->route));
    }
}