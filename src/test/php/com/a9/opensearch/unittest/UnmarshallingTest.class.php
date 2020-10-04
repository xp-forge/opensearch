<?php namespace com\a9\opensearch\unittest;

use com\a9\opensearch\{OpenSearchDescription, OpenSearchUrl};
use unittest\Test;
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
      new StringInputSource(typeof($this)->getPackage()->getResource($fixture.'.xml')),
      OpenSearchDescription::class
    );
  }

  #[Test]
  public function short_name() {
    $this->assertEquals('Web Search', $this->unmarshal('simple')->getShortName());
  }

  #[Test]
  public function description() {
    $this->assertEquals('Use Example.com to search the Web.', $this->unmarshal('simple')->getDescription());
  }

  #[Test]
  public function tags() {
    $this->assertEquals('example web', $this->unmarshal('simple')->getTags());
  }

  #[Test]
  public function contact() {
    $this->assertEquals('admin@example.com', $this->unmarshal('simple')->getContact());
  }

  #[Test]
  public function has_one_url() {
    $this->assertEquals(1, $this->unmarshal('simple')->numUrls());
  }

  #[Test]
  public function urls() {
    $this->assertInstanceOf(
      'util.collections.Vector<com.a9.opensearch.OpenSearchUrl>',
      $this->unmarshal('simple')->getUrls()
    );
  }

  #[Test]
  public function first_url() {
    $this->assertInstanceOf(
      OpenSearchUrl::class,
      $this->unmarshal('simple')->urlAt(0)
    );
  }

  #[Test]
  public function first_urls_type() {
    $this->assertEquals(
      'application/rss+xml',
      $this->unmarshal('simple')->urlAt(0)->getType()
    );
  }

  #[Test]
  public function first_urls_template() {
    $this->assertEquals(
      'http://example.com/?q={searchTerms}&pw={startPage?}&format=rss',
      $this->unmarshal('simple')->urlAt(0)->getTemplate()
    );
  }
}