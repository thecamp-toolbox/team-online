<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');

c::set('debug', true);

c::set('routes', array(
  array(
	'pattern' => 'staff/(:any)',
	'action'  => function ($uid) {
		$kirby = kirby();
		$site = $kirby->site();
		if ($user = $site->user($uid)->exists()) {
			return tpl::load(kirby()->roots()->templates() . DS . 'user.php', array('site' => $site, 'uid' => $uid), false);
		}

    }
  )
));

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/