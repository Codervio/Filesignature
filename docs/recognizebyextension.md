# recognizeByExtension

Recognize by extension name to fetch a filesignature and vendor, mime and type result.

## Description

```php
recognizeByExtension($fileType)
```

## Parameters

__fileType__
: Full extension name

## Return values

__exception__
: Exception if mime is not readable by system.

## Examples

Example #1 Recognize mime type 'JPG' to get vendor name
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();
$filesignature->recognizeByExtension('JPG');

echo $filesignature->getVendor();
```

```php
Joint Photographic Experts Group
```

Example #2 Get a signature from extension name
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->recognizeByExtension('JPG');
echo $filesignature->getSignature();
```

```php
ffd8ffdb
```

Example #3 Get a mime name
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->recognizeByExtension('JPG');
echo $filesignature->getMime();
```

```php
image/jpeg
```

Example #4 Get extension from detected file
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->recognizeByExtension('JPG');
echo $filesignature->getExtension();
```

```php
JPG
```

## Notes

> A signature resolves from mimes.dat that is defined above 600 filetypes reading hex values in a file.

## See also

_No documents._
