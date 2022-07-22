--TEST--
sec-fetch check: detect csrf
--SKIPIF--
<?php if (!extension_loaded("snuffleupagus")) print "skip"; ?>
--INI--
sp.configuration_file={PWD}/config/sec_fetch_check.ini
display_errors=1
display_startup_errors=1
error_reporting=E_ALL
--ENV--
return <<<EOF
HTTP_SEC_FETCH_SITE=none
EOF;
--POST--
a=b
--FILE--
<?php
var_dump($_SERVER['HTTP_SEC_FETCH_SITE']);
--EXPECT--
Fatal error: [snuffleupagus][0.0.0.0][sec_fetch_check][drop] cross-site POST request detected in Unknown on line 0
