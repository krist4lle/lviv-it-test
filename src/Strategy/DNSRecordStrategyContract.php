<?php

namespace Krist4lle\Strategy;

interface DNSRecordStrategyContract
{
    public function map(array $record): array;
}