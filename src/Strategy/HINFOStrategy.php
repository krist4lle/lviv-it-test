<?php

namespace Krist4lle\Strategy;

class HINFOStrategy implements DNSRecordStrategyContract
{
    public function map(array $record): array
    {
        return [
            'name' => $record['host'],
            'type' => $record['type'],
            'ttl' => $record['ttl'],
            'data' => $record['cpu'].'/'.$record['os']
        ];
    }
}