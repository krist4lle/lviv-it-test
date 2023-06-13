<?php

namespace Krist4lle\Strategy;

class NSStrategy implements DNSRecordStrategyContract
{
    public function map(array $record): array
    {
        return [
            'name' => $record['host'],
            'type' => $record['type'],
            'ttl' => $record['ttl'],
            'data' => $record['target']
        ];
    }
}