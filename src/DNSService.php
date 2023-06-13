<?php

namespace Krist4lle;

use Krist4lle\Exceptions\DNSException;
use Krist4lle\Strategy\DNSRecordStrategyContract;

class DNSService implements DNSServiceContract
{
    /**
     * Get all possible records for the specified domain name.
     *
     * @param string $domain
     * @return array
     * @throws DNSException
     */
    public function getDNSRecords(string $domain): array
    {
        $records = dns_get_record($domain, DNS_ALL);

        if (!$records) {
            throw DNSException::gerRecordsFails();
        }

        return $this->mapRecords($records);
    }

    /**
     * Map each record array to proper response type.
     *
     * @param array $records
     * @return array
     */
    private function mapRecords(array $records): array
    {
        return array_map(function (array $record) {
            $strategy = $this->getStrategy($record['type']);

            return $strategy->map($record);
        }, $records);
    }

    /**
     * Get Strategy for each type of record, to get a proper response.
     *
     * @param $type
     * @return DNSRecordStrategyContract
     */
    private function getStrategy($type): DNSRecordStrategyContract
    {
        $className = 'Krist4lle\\Strategy\\'.$type.'Strategy';

        return new $className();
    }
}