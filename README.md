# Filesignature

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codervio/filesignature.svg?style=flat-square)](https://packagist.org/packages/codervio/filesignature)
[![Build Status](https://travis-ci.org/Codervio/Filesignature.svg?branch=master)](https://travis-ci.org/Codervio/Filesignature)
[![Join the chat at https://gitter.im/Codervio/Filesignature](https://badges.gitter.im/Codervio/Filesignature.svg)](https://gitter.im/Codervio/Filesignature?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

A `Filesignature` detects mime type, extension and type of file by reading a headers from a file.

It is possible to guess mime type, extension, vendor name and mime type using input arguments function.

## Donations

Due I am working 100% alone without any helps, organizations and any others team I can be satisfy for receiving any amount of payment to improve, develop and continue building on origin idea of framework.

You can pay any amount to PayPal: https://www.paypal.me/codervio?locale.x=en_US

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

* [`Filesignature`] - A filesignature constructor

Fetching a result:

* [`getVendor()`] - Fetch a vendor by file
* [`getExtension()`] - Get an extension type
* [`getMime()`] - Get an extension type
* [`getSignature()`] - Get a file signature headers
* [`getVendor()`] - Fetch a vendor by file
* [`getArrayResult()`] - Returns result as array

Guess by input arguments:

* [`recognizeByMime()`] - Return a result from mime type
* [`recognizeByExtension()`] - Return a result from extension name

[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2FCodervio%2FFilesignature.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2FCodervio%2FFilesignature?ref=badge_large)
