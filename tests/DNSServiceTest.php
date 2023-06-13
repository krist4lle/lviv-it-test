<?php

namespace Krist4lle\Tests;

use Krist4lle\DNSService;
use PHPUnit\Framework\TestCase;

class DNSServiceTest extends TestCase
{
    private array $dnsTypes = [
        'A',
        'AAAA',
        'CAA',
        'CNAME',
        'HINFO',
        'MX',
        'NAPTR',
        'NS',
        'PTR',
        'SOA',
        'SRV',
        'TXT'
    ];

    private array $domains = [
        'google.com',
        'github.com',
        'packagist.org'
    ];

    private array $recordsFromDomains;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $service = new DNSService();

        foreach ($this->domains as $domain) {
            $this->recordsFromDomains[$domain] = $service->getDNSRecords($domain);
        }
    }
    public function testRecordsType()
    {
        foreach ($this->recordsFromDomains as $records) {
            $this->assertIsArray($records);
        }
    }

    public function testName()
    {
        foreach ($this->recordsFromDomains as $domain => $records) {
            foreach ($records as $record) {
                $this->assertArrayHasKey('name', $record);
                $this->assertSame($domain, $record['name']);
            }
        }
    }

    public function testTtl()
    {
        foreach ($this->recordsFromDomains as $records) {
            foreach ($records as $record) {
                $this->assertArrayHasKey('ttl', $record);
                $this->assertIsNumeric($record['ttl']);
            }
        }
    }

    public function testType()
    {
        foreach ($this->recordsFromDomains as $records) {
            foreach ($records as $record) {
                $this->assertArrayHasKey('type', $record);
                $this->assertContains($record['type'], $this->dnsTypes);
            }
        }
    }

    public function testData()
    {
        foreach ($this->recordsFromDomains as $records) {
            foreach ($records as $record) {
                $this->assertArrayHasKey('data', $record);
            }
        }
    }
}