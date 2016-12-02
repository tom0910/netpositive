<?php


use Doctrine\DBAL\Types\Type;

Type::addType('ip', 'Darsyn\IP\Doctrine\IpType');