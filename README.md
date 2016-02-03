# TuneInShoutcast

Generate files for connect to server shoutcast.
Available format $_GET['type'] ['asx','m3u','pls','qtl','wax','ram']
```php
<?php
include_once "src/TuneIn.php";
$TuneIn = new \TuneInShoutcast\TuneIn("ip:port");
$TuneIn->generate($_GET['type']);
die();
?>
```

Composer
https://packagist.org/packages/dusta/tuneinshoutcast