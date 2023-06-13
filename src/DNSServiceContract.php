<?php

namespace Krist4lle;

interface DNSServiceContract
{
    public function getDNSRecords(string $domain): array;
}