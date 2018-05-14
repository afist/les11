<?php
namespace Socket\Processing;

interface RequestInterface
{
    public function getQuery(): string;

    public function getMethod(): string;

    public function getCookie(): array;

    public function getBody(): string;
}
