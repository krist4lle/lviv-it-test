<?php

namespace Krist4lle\Strategy;

class AStrategy implements DNSRecordStrategyContract
{
    public function map(array $record): array
    {
        return [
            'name' => $record['host'],
            'type' => $record['type'],
            'ttl' => $record['ttl'],
            'data' => $record['ip']
        ];
    }
}