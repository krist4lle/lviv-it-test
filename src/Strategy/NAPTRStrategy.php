<?php

namespace Krist4lle\Strategy;

class NAPTRStrategy implements DNSRecordStrategyContract
{
    public function map(array $record): array
    {
        return [
            'name' => $record['host'],
            'type' => $record['type'],
            'ttl' => $record['ttl'],
            'data' => $record['order']." ".$record['pref']." ".$record['flags']." ".$record['service']." ".$record['regexp']
        ];
    }
}