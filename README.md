# TuneInShoutcast

Generowanie plików do połączenia z radiem v1.0

```php
<?php
$TuneIn = new \TuneInShoutcast\TuneIn(ip:port);
$TuneIn->generate($_GET['type']);
?>
```