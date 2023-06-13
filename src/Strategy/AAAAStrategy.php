<?php

namespace Krist4lle\Strategy;

class AAAAStrategy implements DNSRecordStrategyContract
{
    public function map(array $record): array
    {
        return [
            'name' => $record['host'],
            'type' => $record['type'],
            'ttl' => $record['ttl'],
            'data' => $record['ipv6']
        ];
    }
}