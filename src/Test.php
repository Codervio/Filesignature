<?php

include 'Filesignature.php';

use Codervio\Filesignature\Filesignature;

$signature = new Filesignature();

//$signature->setFile('../Tests/data/a.jpg');
//var_dump($signature->getVendor());
//var_dump($signature->getSignature());
//var_dump($signature->getExtension());
//var_dump($signature->getMime());
//
//$signature->recognizeByMime('image/jpeg');
//var_dump('Vendor: '.$signature->getVendor());
//var_dump('Signature: '.$signature->getSignature(false));
//var_dump('Ext: '.$signature->getExtension());
//var_dump('Mime: '.$signature->getMime());
//
//$signature->recognizeByExtension('jpg');
//var_dump('Vendor: '.$signature->getVendor());
//var_dump('Signature: '.$signature->getSignature());
//var_dump('Ext: '.$signature->getExtension());
//var_dump('Mime: '.$signature->getMime());

$signature->setFile('../Tests/fixtures/jpg.jpg');
var_dump($signature->getArrayResult());