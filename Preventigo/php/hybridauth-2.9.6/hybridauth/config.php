<?php

/**
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2015, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */
// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return array(
	
    "base_url" => 'http://localhost:8080/SourceCode/preventigo/php/hybridauth-2.9.6/hybridauth/',
    "providers" => array(
        // openid providers
        "OpenID" => array(
            "enabled" => true,
        ),
        "Yahoo" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
        ),
        "AOL" => array(
            "enabled" => true,
        ),
        "Google" => array(
            "enabled" => true,
            "keys" => array("id" => "129024192453-eluoeb139li3c7g0ak87m9i4ra27ondl.apps.googleusercontent.com", "secret" => "ntDzRWvzx7sFutVyQMZSNQG0"),
			/* "scope"   => "https://www.googleapis.com/auth/plus.login ". // optional
                       "https://www.googleapis.com/auth/plus.me ". // optional
                       "https://www.googleapis.com/auth/plus.profile.emails.read", // optional
			"access_type"     => "offline",   // optional
			"approval_prompt" => "force",     // optional
			"hd"              => "domain.com" // optional */
        ),
        "Facebook" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
            "trustForwarded" => false,
        ),
        "Twitter" => array(
            "enabled" => true,
            "keys" => array("key" => "bOWyLQNBxgszAWICKsPWDnUR3", "secret" => "WWX2KRphdjBiNR8Rlp6wreA9OhgBdnkidHZyLpqXyEyTfv2KTR"),
            "includeEmail" => false,
        ),
        // windows live
        "Live" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
        ),
        "LinkedIn" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
            "fields" => array(),
        ),
        "Foursquare" => array(
            "enabled" => true,
            "keys" => array("id" => "", "secret" => ""),
        ),
    ),
    // If you want to enable logging, set 'debug_mode' to true.
    // You can also set it to
    // - "error" To log only error messages. Useful in production
    // - "info" To log info and error messages (ignore debug messages)
    "debug_mode" => true,
    // Path to file writable by the web server. Required if 'debug_mode' is not false
    "debug_file" =>  dirname(__FILE__) . '/logs/hybridauth.log',
);
