# getVendor

Recognize by file signature hash or guess by parameters a vendor type of file.

## Description

```php
getVendor($single = true)
```

Default:
- `single` - boolean type list view of vendor, show one of vendor found

By default there are more vendors for same file signature.

## Parameters

__single__
: Response one of vendor result
: Default: true

## Return values

No exceptions.

## Examples

Example #1 Get a vendor by filename
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->setFile('image.jpg');
echo $filesignature->getVendor();
```

```php
Joint Photographic Experts Group
```

## Notes

__No notes.__

## See also

_No documents._
