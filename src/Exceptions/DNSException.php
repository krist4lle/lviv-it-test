<?php

namespace Krist4lle\Exceptions;

class DNSException extends \Exception
{
    public static function gerRecordsFails(): self
    {
        return new self('Unable to retrieve DNS records for the domain.', 400);
    }
}