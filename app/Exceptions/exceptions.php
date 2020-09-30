<?php declare(strict_types=1);

namespace App\Exceptions;

use InvalidArgumentException;
use RuntimeException;


interface WatchNotFoundException {

}

class RepositoryException extends RuntimeException {

}

class MySqlRepositoryException extends RepositoryException
{
}

class MySqlWatchNotFoundException extends MySqlRepositoryException implements WatchNotFoundException
{
}

class XmlLoaderException extends RuntimeException
{
}

class XmlRepositoryException extends RepositoryException
{
}

class XmlWatchNotFoundException extends XmlRepositoryException implements WatchNotFoundException
{
}

class InvalidInputArrayForMappingException extends InvalidArgumentException {

}

class InvalidXmlInputArrayException extends InvalidInputArrayForMappingException {

}