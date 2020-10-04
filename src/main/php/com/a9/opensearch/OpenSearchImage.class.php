<?php namespace com\a9\opensearch;

use xml\{Xmlns, Xmlfactory, Xmlmapping};

/**
 * Represents an open search Image
 *
 * @see      xp://com.a9.opensearch.OpenSearchDescription
 */
#[Xmlns(s: 'http://a9.com/-/spec/opensearch/1.1/')]
class OpenSearchImage {
  protected
    $type       = null,
    $url        = null,
    $width      = 0,
    $height     = 0;

  /**
   * Constructor
   *
   * @param   string type default '' content type
   * @param   string url default ''
   * @param   int width default 0
   * @param   int height default 0
   */
  public function __construct($type= '', $url= '', $width= 0, $height= 0) {
    $this->type= $type;
    $this->url= $url;
    $this->width= $width;
    $this->height= $height;
  }

  /**
   * Set type
   *
   * @param   string type
   */
  #[Xmlmapping(['element' => '@type'])]
  public function setType($type) {
    $this->type= $type;
  }

  /**
   * Get type
   *
   * @return  string
   */
  #[Xmlfactory(['element' => '@type'])]
  public function getType() {
    return $this->type;
  }

  /**
   * Set Width
   *
   * @param   int width
   */
  #[Xmlmapping(['element' => '@width', 'type' => 'int'])]
  public function setWidth($width) {
    $this->width= $width;
  }

  /**
   * Get Width
   *
   * @return  int
   */
  #[Xmlfactory(['element' => '@width'])]
  public function getWidth() {
    return $this->width;
  }

  /**
   * Set Height
   *
   * @param   int height
   */
  #[Xmlmapping(['element' => '@height'], type= 'int')]
  public function setHeight($height) {
    $this->height= $height;
  }

  /**
   * Get Height
   *
   * @return  int
   */
  #[Xmlfactory(['element' => '@height'])]
  public function getHeight() {
    return $this->height;
  }

  /**
   * Set url
   *
   * @param   string url
   */
  #[Xmlmapping(['element' => '.')]]
  public function setUrl($url) {
    $this->url= $url;
  }

  /**
   * Get url
   *
   * @return  string
   */
  #[Xmlfactory(['element' => '.')]]
  public function getUrl() {
    return $this->url;
  }
}
