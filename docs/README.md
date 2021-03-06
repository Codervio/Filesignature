# Filesignature

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codervio/filesignature.svg?style=flat-square)](https://packagist.org/packages/codervio/filesignature)
[![Build Status](https://travis-ci.org/Codervio/Filesignature.svg?branch=master)](https://travis-ci.org/Codervio/Filesignature)
[![Join the chat at https://gitter.im/Codervio/Filesignature](https://badges.gitter.im/Codervio/Filesignature.svg)](https://gitter.im/Codervio/Filesignature?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

A `Filesignature` detects mime type, extension and type of file by reading a headers from a file.

It is possible to guess mime type, extension, vendor name and mime type using input arguments function.

## Installation

1. Installation via [Composer](http://www.composer.org) on [Packagist](https://packagist.org/packages/codervio/filesignature)
2. Installation using [Git](http://www.github.com) GIT clone component

## Changelog

Status of core:

| Version       | State                |
| ------------- |:-------------------- |
| `1.0`         | Release version      |

PHP version above `7.1`.
Quality assurance: Unit tests provided

#### References

* [`Filesignature`](filesignature.md) - A filesignature constructor

Fetching a result:

* [`getVendor()`](getvendor.md) - Fetch a vendor by file
* [`getExtension()`](getextension.md) - Get an extension type
* [`getMime()`](getextension.md) - Get an extension type
* [`getSignature()`](getsignature.md) - Get a file signature headers
* [`getVendor()`](getvendor.md) - Fetch a vendor by file
* [`getArrayResult()`](getarrayresult.md) - Returns result as array

Guess by input arguments:

* [`recognizeByMime()`](recognizebymime.md) - Return a result from mime type
* [`recognizeByExtension()`](recognizebyextension.md) - Return a result from extension name