<?php namespace com\a9\opensearch;

/**
 * Enumeration of syndication rights
 *
 * Meanings:
 * ```
 * "open" (SyndicationRight::IS_OPEN)
 *   The search client may request search results. 
 *   The search client may display the search results to end users. 
 *   The search client may send the search results to other search clients. 
 *
 * "limited" (SyndicationRight::IS_LIMITED)
 *   The search client may request search results. 
 *   The search client may display the search results to end users. 
 *   The search client may not send the search results to other search clients. 
 *
 * "private" (SyndicationRight::IS_PRIVATE)
 *   The search client may request search results. 
 *   The search client may not display the search results to end users. 
 *   The search client may not send the search results to other search clients. 
 *
 * "closed" (SyndicationRight::IS_CLOSED)
 *   The search client may not request search results. 
 * ```
 *
 * @see   xp://com.a9.opensearch.OpenSearchDescription#setSyndicationRight
 */
class SyndicationRight {
  const
    IS_OPEN    = 'open',
    IS_LIMITED = 'limited',
    IS_PRIVATE = 'private',
    IS_CLOSED  = 'closed';

}
