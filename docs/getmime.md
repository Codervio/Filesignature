# getMime

Recognize by file signature mime vendor type or guess from input arguments.

## Description

```php
getMime($single = true)
```

Default:
- `single` - boolean type list view of mime

By default show only one mime result.

## Parameters

__single__
: Response one of mime result
: Default: true

## Return values

No exceptions.

## Examples

Example #1 Detect mime type from filename
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->setFile('image.jpg');
echo $filesignature->getMime();
```

```php
image/jpeg
```

## Notes

> Some vendors may be overwritten vendors due to same vendor uses multiple mimes types.

## See also

_No documents._