<?php
/**
 * @file
 * Check the status code of the front page is 200 (OK)
 */

$I = new WebGuy($scenario);
$I->wantTo('check the front page is returning 200 (OK) status');
$I->amOnPage('/');
$I->seeResponseCodeIs(200);
