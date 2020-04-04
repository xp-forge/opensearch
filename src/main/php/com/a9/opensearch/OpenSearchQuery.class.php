<?php namespace com\a9\opensearch;

/**
 * Represents an open search Query
 *
 * @see      xp://com.a9.opensearch.OpenSearchDescription
 */
#[@xmlns(['s' => 'http://a9.com/-/spec/opensearch/1.1/'])]
class OpenSearchQuery {
  protected
    $role        = null,
    $searchTerms = null;

  /**
   * Constructor
   *
   * @param   string role default ''
   * @param   string searchTerms default ''
   */
  public function __construct($role= '', $searchTerms= '') {
    $this->role= $role;
    $this->searchTerms= $searchTerms;
  }

  /**
   * Set role
   *
   * @param   string role
   */
  #[@xmlmapping(element= '@role')]
  public function setRole($role) {
    $this->role= $role;
  }

  /**
   * Get role
   *
   * @return  string
   */
  #[@xmlfactory(element= '@role')]
  public function getRole() {
    return $this->role;
  }

  /**
   * Set searchTerms
   *
   * @param   string searchTerms
   */
  #[@xmlmapping(element= '@searchTerms')]
  public function setSearchTerms($searchTerms) {
    $this->searchTerms= $searchTerms;
  }

  /**
   * Get searchTerms
   *
   * @return  string
   */
  #[@xmlfactory(element= '@searchTerms')]
  public function getSearchTerms() {
    return $this->searchTerms;
  }
}
