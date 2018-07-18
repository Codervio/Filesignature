# getExtension

Recognize by file signature extension type or guess from recognize input arguments.

## Description

```php
getExtension($single = true)
```

Default:
- `single` - boolean type list view of extensions

By default show only one of extension.

## Parameters

__single__
: Response one of extension result
: Default: true

## Return values

No exceptions.

## Examples

Example #1 Get an extension by filename
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->setFile('image.jpg');
echo $filesignature->getExtension();
```

```php
JPEG
```

## Notes

> Extension response will be always uppercase (ex. JPEG).

## See also

_No documents._
