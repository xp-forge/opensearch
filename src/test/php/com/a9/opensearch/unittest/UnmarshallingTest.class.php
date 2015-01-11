<?php namespace com\a9\opensearch\unittest;

use xml\meta\Unmarshaller;
use xml\parser\StringInputSource;

/**
 * End-to-end API usage test
 *
 * @see   http://www.opensearch.org/Specifications/OpenSearch/1.1
 */
class UnmarshallingTest extends \unittest\TestCase {

  /**
   * Unmarshal a resource and return an `OpenSearchDescription` instance
   *
   * @param  string $fixture
   * @return com.a9.opensearch.OpenSearchDescription
   */
  protected function unmarshal($fixture) {
    return (new Unmarshaller())->unmarshalFrom(
      new StringInputSource($this->getClass()->getPackage()->getResource($fixture.'.xml')),
      'com.a9.opensearch.OpenSearchDescription'
    );
  }

  #[@test]
  public function short_name() {
    $this->assertEquals('Web Search', $this->unmarshal('simple')->getShortName());
  }

  #[@test]
  public function description() {
    $this->assertEquals('Use Example.com to search the Web.', $this->unmarshal('simple')->getDescription());
  }

  #[@test]
  public function tags() {
    $this->assertEquals('example web', $this->unmarshal('simple')->getTags());
  }

  #[@test]
  public function contact() {
    $this->assertEquals('admin@example.com', $this->unmarshal('simple')->getContact());
  }

  #[@test]
  public function has_one_url() {
    $this->assertEquals(1, $this->unmarshal('simple')->numUrls());
  }

  #[@test]
  public function urls() {
    $this->assertInstanceOf(
      'util.collections.Vector<com.a9.opensearch.OpenSearchUrl>',
      $this->unmarshal('simple')->getUrls()
    );
  }

  #[@test]
  public function first_url() {
    $this->assertInstanceOf(
      'com.a9.opensearch.OpenSearchUrl',
      $this->unmarshal('simple')->urlAt(0)
    );
  }

  #[@test]
  public function first_urls_type() {
    $this->assertEquals(
      'application/rss+xml',
      $this->unmarshal('simple')->urlAt(0)->getType()
    );
  }

  #[@test]
  public function first_urls_template() {
    $this->assertEquals(
      'http://example.com/?q={searchTerms}&pw={startPage?}&format=rss',
      $this->unmarshal('simple')->urlAt(0)->getTemplate()
    );
  }
}