<?php

namespace Krist4lle\Strategy;

class SRVStrategy implements DNSRecordStrategyContract
{
    public function map(array $record): array
    {
        return [
            'name' => $record['host'],
            'type' => $record['type'],
            'ttl' => $record['ttl'],
            'data' => [
                'priority' => $record['pri'],
                'weight' =>$record['weight'],
                'port' => $record['port'],
                'target' => $record['target']
            ]
        ];
    }
}