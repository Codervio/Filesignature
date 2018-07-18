# recognizeByMime

A function to guess from mime type

## Description

```php
recognizeByMime($mimeType)
```

## Parameters

__mimeType__
: A mime full path name

## Return values

__exception__
: Exception if mime is not readable by system.

## Examples

Example #1 Recognize mime type 'image/jpeg' to get vendor name
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();
$filesignature->recognizeByMime('image/jpeg');

echo $filesignature->getVendor();
```

```php
Joint Photographic Experts Group
```

Example #2 Get a signature from mime type
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->recognizeByMime('image/jpeg');
echo $filesignature->getSignature();
```

```php
ffd8ff
```

Example #3 Get a mime name
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->recognizeByMime('image/jpeg');
echo $filesignature->getMime();
```

```php
image/jpeg
```

Example #4 Get extension
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature();

$filesignature->recognizeByMime('image/jpeg');
echo $filesignature->getExtension();
```

```php
JPEG
```

## Notes

> A signature resolves from mimes.dat that is defined above 600 filetypes reading hex values in a file.

## See also

_No documents._
