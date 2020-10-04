<?php namespace com\a9\opensearch;

use xml\{Xmlns, Xmlfactory, Xmlmapping};

/**
 * Represents an open search Query
 *
 * @see      xp://com.a9.opensearch.OpenSearchDescription
 */
#[Xmlns(s: 'http://a9.com/-/spec/opensearch/1.1/')]
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
  #[Xmlmapping(['element' => '@role'])]
  public function setRole($role) {
    $this->role= $role;
  }

  /**
   * Get role
   *
   * @return  string
   */
  #[Xmlfactory(['element' => '@role'])]
  public function getRole() {
    return $this->role;
  }

  /**
   * Set searchTerms
   *
   * @param   string searchTerms
   */
  #[Xmlmapping(['element' => '@searchTerms'])]
  public function setSearchTerms($searchTerms) {
    $this->searchTerms= $searchTerms;
  }

  /**
   * Get searchTerms
   *
   * @return  string
   */
  #[Xmlfactory(['element' => '@searchTerms'])]
  public function getSearchTerms() {
    return $this->searchTerms;
  }
}
