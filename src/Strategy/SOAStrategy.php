<?php

namespace Krist4lle\Strategy;

class SOAStrategy implements DNSRecordStrategyContract
{
    public function map(array $record): array
    {
        return [
            'name' => $record['host'],
            'type' => $record['type'],
            'ttl' => $record['ttl'],
            'data' => [
                'primary_ns' => $record['mname'],
                'responsible_email' => $record['rname'],
                'serial' => $record['serial'],
                'refresh' => $record['refresh'],
                'retry' => $record['retry'],
                'expire' => $record['expire'],
                'minimum_ttl' => $record['minimum-ttl']
            ]
        ];
    }
}