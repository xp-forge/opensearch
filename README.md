OpenSearch
==========

[![Build Status on TravisCI](https://secure.travis-ci.org/xp-forge/opensearch.svg)](http://travis-ci.org/xp-forge/opensearch)
[![XP Framework Module](https://raw.githubusercontent.com/xp-framework/web/master/static/xp-framework-badge.png)](https://github.com/xp-framework/core)
[![BSD Licence](https://raw.githubusercontent.com/xp-framework/web/master/static/licence-bsd.png)](https://github.com/xp-framework/core/blob/master/LICENCE.md)
[![Required PHP 5.4+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-5_4plus.png)](http://php.net/)
[![Required HHVM 3.4+](https://raw.githubusercontent.com/xp-framework/web/master/static/hhvm-3_4plus.png)](http://hhvm.com/)
[![Latest Stable Version](https://poser.pugx.org/xp-forge/opensearch/version.png)](https://packagist.org/packages/xp-forge/opensearch)


OpenSearch XML classes. See http://www.opensearch.org/Specifications/OpenSearch/1.1

Example
-------

```php
use xml\meta\Unmarshaller;
use xml\parser\StreamInputSource;
use peer\http\HttpConnection;

$conn= new HttpConnection('http://de.wikipedia.org//w/opensearch_desc.php');
$desc= (new Unmarshaller())->unmarshalFrom(
  new StreamInputSource($conn->get()->in()),
  'com.a9.opensearch.OpenSearchDescription'
);

Console::writeLine('Results: ', $desc);
```
