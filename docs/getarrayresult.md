# getArrayResult

Returns mime type, extension type, signature value and vendor name by file or arguments.

## Description

```php
getArrayResult()
```

## Parameters

__No parameters.__

## Return values

No exceptions.

## Examples

Example #1 Returns result as array
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->setFile('image.jpg');
echo $filesignature->getArrayResult();
```

```php
[
    'name' => 'Joint Photographic Experts Group',
    'signature' => 'ffd8ff',
    'ext' => 'JPEG',
    'mime' => 'image/jpeg'
]
```

## Notes

> Each of results array can be fetching using functions defined in README under 'Fetching a result' separately.

## See also

_No documents._
