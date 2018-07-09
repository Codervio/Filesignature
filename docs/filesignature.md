# Filesignature

An Filesignature constructor

## Description

```php
Filesignature($file)
```

Default:
- `file` - a filename to read a signature file

Use `setFile()` to read another file outside of constructor.

## Parameters

__file__
: A filename path
: Default: null

## Return values

__exception__
: Exception if file is not readed correctly.

## Examples

Example #1 Filesignature example
```php
use Codervio\Filesignature\Filesignature;

$filesignature = new Filesignature('file.jpg');
echo $filesignature->getVendor();
```

```php
Joint Photographic Experts Group
```

## Notes

> A signature resolves from mimes.dat that is defined above 600 filetypes reading hex values in a file.

## See also

_No documents._
