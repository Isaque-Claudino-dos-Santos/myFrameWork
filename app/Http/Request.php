<?php

namespace app\Http;

class Request
{
    public function __construct(private array $req)
    {
        $this->req = $req;
    }

    public function find(string $key): string | int | float
    {
        return $this->req[$key];
    }

    public function findAll(array $keysToOmit = []): array
    {
        $req = $this->req;
        foreach ($keysToOmit as $key) {
            if (!array_key_exists($key, $req))
                throw new \Exception("The key $key passed to omit the request not exist");
            unset($req[$key]);
        }
        return $req;
    }
}
