OpenSearch
==========

[![Build Status on TravisCI](https://secure.travis-ci.org/xp-forge/opensearch.svg)](http://travis-ci.org/xp-forge/opensearch)
[![XP Framework Module](https://raw.githubusercontent.com/xp-framework/web/master/static/xp-framework-badge.png)](https://github.com/xp-framework/core)
[![BSD Licence](https://raw.githubusercontent.com/xp-framework/web/master/static/licence-bsd.png)](https://github.com/xp-framework/core/blob/master/LICENCE.md)
[![Required PHP 5.6+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-5_6plus.png)](http://php.net/)
[![Supports PHP 7.0+](https://raw.githubusercontent.com/xp-framework/web/master/static/php-7_0plus.png)](http://php.net/)
[![Latest Stable Version](https://poser.pugx.org/xp-forge/opensearch/version.png)](https://packagist.org/packages/xp-forge/opensearch)


OpenSearch XML classes. See http://www.opensearch.org/Specifications/OpenSearch/1.1

Example
-------

```php
use xml\meta\Unmarshaller;
use xml\parser\StreamInputSource;
use peer\http\HttpConnection;
use com\a9\opensearch\OpenSearchDescription;

$conn= new HttpConnection('http://de.wikipedia.org//w/opensearch_desc.php');
$desc= (new Unmarshaller())->unmarshalFrom(
  new StreamInputSource($conn->get()->in()),
  OpenSearchDescription::class
);

Console::writeLine('Results: ', $desc);
```
