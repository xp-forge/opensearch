<?php namespace com\a9\opensearch;

use lang\types\ArrayList;
use util\collections\Vector;
use xml\{Xmlns, Xmlfactory, Xmlmapping};

/**
 * Wrap OpenSearch XML description file
 *
 * @see   http://www.opensearch.org/Specifications/OpenSearch/1.1
 */
#[Xmlns(s: 'http://a9.com/-/spec/opensearch/1.1/')]
class OpenSearchDescription {
  protected
    $shortName        = null,
    $longName         = null,
    $developer        = null,
    $attribution      = null,
    $description      = null,
    $tags             = null,
    $contact          = null,
    $image            = null,
    $urls             = null,
    $queries          = null,
    $adultContent     = false,
    $inputEncoding    = null,
    $outputEncoding   = null,
    $syndicationRight = SyndicationRight::IS_OPEN,
    $languages        = ['*'];

  /**
   * Constructor
   */
  public function __construct() {
    $this->urls= create('new util.collections.Vector<com.a9.opensearch.OpenSearchUrl>');
    $this->queries= create('new util.collections.Vector<com.a9.opensearch.OpenSearchQuery>');
  }

  /**
   * Set shortName
   *
   * @param   string shortName
   */
  #[Xmlmapping(['element' => 's:ShortName'])]
  public function setShortName($shortName) {
    $this->shortName= $shortName;
  }

  /**
   * Get shortName
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:ShortName'])]
  public function getShortName() {
    return $this->shortName;
  }

  /**
   * Set longName
   *
   * @param   string longName
   */
  #[Xmlmapping(['element' => 's:LongName'])]
  public function setLongName($longName) {
    $this->longName= $longName;
  }

  /**
   * Get longName
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:LongName'])]
  public function getLongName() {
    return $this->longName;
  }

  /**
   * Set developer
   *
   * @param   string developer
   */
  #[Xmlmapping(['element' => 's:Developer'])]
  public function setDeveloper($developer) {
    $this->developer= $developer;
  }

  /**
   * Get developer
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:Developer'])]
  public function getDeveloper() {
    return $this->developer;
  }

  /**
   * Set attribution
   *
   * @param   string attribution
   */
  #[Xmlmapping(['element' => 's:Attribution'])]
  public function setAttribution($attribution) {
    $this->attribution= $attribution;
  }

  /**
   * Get attribution
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:Attribution'])]
  public function getAttribution() {
    return $this->attribution;
  }

  /**
   * Set syndicationRight
   *
   * @see     xp://com.a9.opensearch.SyndicationRight
   * @param   string syndicationRight one of the SyndicationRight::* class constants
   */
  #[Xmlmapping(['element' => 's:SyndicationRight'])]
  public function setSyndicationRight($syndicationRight) {
    $this->syndicationRight= strtolower($syndicationRight);   // Case-insensitive by spec
  }

  /**
   * Get syndicationRight
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:SyndicationRight'])]
  public function getSyndicationRight() {
    return $this->syndicationRight;
  }

  /**
   * Add language
   *
   * @param   string language
   */
  #[Xmlmapping(['element' => 's:Language'])]
  public function addLanguage($language) {
    $this->languages[$language]= true;
  }

  /**
   * Set languages
   *
   * @return  lang.types.ArrayList<string> languages
   */
  public function setLanguages(ArrayList $languages) {
    $this->languages= array_flip($languages->values);
  }

  /**
   * Get languages
   *
   * @return  lang.types.ArrayList<string>
   */
  #[Xmlfactory(['element' => 's:Language'])]
  public function getLanguages() {
    return new ArrayList(array_values($this->languages));
  }

  /**
   * Set description
   *
   * @param   string description
   */
  #[Xmlmapping(['element' => 's:Description'])]
  public function setDescription($description) {
    $this->description= $description;
  }

  /**
   * Get description
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:Description'])]
  public function getDescription() {
    return $this->description;
  }

  /**
   * Set tags
   *
   * @param   string tags
   */
  #[Xmlmapping(['element' => 's:Tags'])]
  public function setTags($tags) {
    $this->tags= $tags;
  }

  /**
   * Get tags
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:Tags'])]
  public function getTags() {
    return $this->tags;
  }

  /**
   * Set contact
   *
   * @param   string contact
   */
  #[Xmlmapping(['element' => 's:Contact'])]
  public function setContact($contact) {
    $this->contact= $contact;
  }

  /**
   * Get contact
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:Contact'])]
  public function getContact() {
    return $this->contact;
  }

  /**
   * Set Image
   *
   * @param   com.a9.opensearch.OpenSearchImage image
   */
  #[Xmlmapping(['element' => 's:Image', 'class' => 'com.a9.opensearch.OpenSearchImage'])]
  public function setImage($image) {
    $this->image= $image;
  }

  /**
   * Get Image
   *
   * @return  com.a9.opensearch.OpenSearchImage
   */
  #[Xmlfactory(['element' => 's:Image'])]
  public function getImage() {
    return $this->image;
  }

  /**
   * Set query
   *
   * @param   com.a9.opensearch.OpenSearchQuery query
   * @return  com.a9.opensearch.OpenSearchQuery The added query
   */
  #[Xmlmapping(['element' => 's:Query', 'class' => 'com.a9.opensearch.OpenSearchQuery'])]
  public function addQuery($query) {
    $this->queries->add($query);
    return $query;
  }

  /**
   * Get query
   *
   * @return  util.collections.Vector<com.a9.opensearch.OpenSearchQuery>
   */
  #[Xmlfactory(['element' => 's:Query'])]
  public function getQueries() {
    return $this->queries;
  }

  /**
   * Set queries
   *
   * @param   util.collections.Vector<com.a9.opensearch.OpenSearchQuery> queries
   */
  public function setQueries($queries) {
    $this->queries= $queries;
  }

  /**
   * Returns number of queries
   *
   * @return  int
   */
  public function numQueries() {
    return $this->queries->size();
  }

  /**
   * Returns url at a given position
   *
   * @param   int
   * @return  com.a9.opensearch.OpenSearchQuery
   */
  public function queryAt($offset) {
    return $this->queries->get($offset);
  }

  /**
   * Returns whether queries exist
   *
   * @return  bool
   */
  public function hasQueries() {
    return !$this->queries->isEmpty();
  }

  /**
   * Set adultContent
   *
   * @param   mixed adultContent either a string or a bool
   */
  #[Xmlmapping(['element' => 's:AdultContent'])]
  public function setAdultContent($adultContent) {
    if (is_string($adultContent)) {
      $this->adultContent= !in_array($adultContent, ['false', '0', 'no']);
    } else {
      $this->adultContent= (bool)$adultContent;
    }
  }

  /**
   * Get adultContent
   *
   * @return  string
   */
  #[Xmlfactory(['element' => 's:AdultContent'])]
  public function getAdultContent() {
    return $this->adultContent ? 'true' : 'false';
  }

  /**
   * Get adultContent
   *
   * @return  bool
   */
  public function isAdultContent() {
    return $this->adultContent;
  }

  /**
   * Set inputEncoding
   *
   * @param   lang.Object inputEncoding
   */
  #[Xmlmapping(['element' => 's:InputEncoding'])]
  public function setInputEncoding($inputEncoding) {
    $this->inputEncoding= $inputEncoding;
  }

  /**
   * Get inputEncoding
   *
   * @return  lang.Object
   */
  #[Xmlfactory(['element' => 's:InputEncoding'])]
  public function getInputEncoding() {
    return $this->inputEncoding;
  }

  /**
   * Set outputEncoding
   *
   * @param   lang.Object outputEncoding
   */
  #[Xmlmapping(['element' => 's:OutputEncoding'])]
  public function setOutputEncoding($outputEncoding) {
    $this->outputEncoding= $outputEncoding;
  }

  /**
   * Get outputEncoding
   *
   * @return  lang.Object
   */
  #[Xmlfactory(['element' => 's:OutputEncoding'])]
  public function getOutputEncoding() {
    return $this->outputEncoding;
  }

  /**
   * Add url
   *
   * @param   com.a9.opensearch.OpenSearchUrl url
   * @return  com.a9.opensearch.OpenSearchUrl the added url
   */
  #[Xmlmapping(['element' => 's:Url', 'class' => 'com.a9.opensearch.OpenSearchUrl'])]
  public function addUrl($url) {
    $this->urls->add($url);
    return $url;
  }

  /**
   * Set urls
   *
   * @param   util.collections.Vector<com.a9.opensearch.OpenSearchUrl> urls
   */
  public function setUrls($urls) {
    $this->urls= $urls;
  }

  /**
   * Returns number of urls
   *
   * @return  int
   */
  public function numUrls() {
    return $this->urls->size();
  }

  /**
   * Returns url at a given position
   *
   * @param   int
   * @return  com.a9.opensearch.OpenSearchUrl
   */
  public function urlAt($offset) {
    return $this->urls->get($offset);
  }

  /**
   * Returns whether urls exist
   *
   * @return  bool
   */
  public function hasUrls() {
    return !$this->urls->isEmpty();
  }

  /**
   * Get urls
   *
   * @return   util.collections.Vector<com.a9.opensearch.OpenSearchUrl> urls
   */
  #[Xmlfactory(['element' => 's:Url'])]
  public function getUrls() {
    return $this->urls;
  }
}
