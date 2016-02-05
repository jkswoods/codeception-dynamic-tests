<?php
/**
 * @file
 * Crawl each of the URLs on the front page, checking that each is returning a 200 (OK).
 */

$I = new WebGuy($scenario);
$I->wantTo('crawl the front page for links and check that each link is returning a 200 (OK) status');
// Navigate to the front page.
$I->amOnPage('/');
// Check the repsonse code for the front page is 200 (OK).
$I->seeResponseCodeIs(200);
// Grab all a[href] values.
$elements = $I->grabMultiple('a', 'href');
// Loop through the links array and check the status code of each one.
foreach($elements as $element) {
  // Split the URL up into different parts.
  $el = parse_url($element);
  // Make sure the host and path is set.
  if (isset($el['host']) && isset($el['path'])) {
    // Check each path returns a 200 (OK) status.
    if ($el['host'] == $GLOBALS['host']) {
      // Navigate to the
      $I->amOnPage($el['path']);
      $I->seeResponseCodeIs(200);
    }
  }
}
