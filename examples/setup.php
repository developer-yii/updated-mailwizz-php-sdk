<?php
/**
 * This file contains an example of base setup for the MailWizzApi PHP-SDK.
 *
 * @author Serban George Cristian <cristian.serban@mailwizz.com>
 * @link https://www.mailwizz.com/
 * @copyright 2013-2020 https://www.mailwizz.com/
 */

// exit('COMMENT ME TO TEST THE EXAMPLES!');

// require the autoloader class if you haven't used composer to install the package
require_once dirname(__FILE__) . '/../MailWizzApi/Autoloader.php';

// register the autoloader if you haven't used composer to install the package
MailWizzApi_Autoloader::register();

// if using a framework that already uses an autoloading mechanism, like Yii for example,
// you can register the autoloader like:
// Yii::registerAutoloader(array('MailWizzApi_Autoloader', 'autoloader'), true);

/**
 * Notes:
 * If SSL present on the webhost, the api can be accessed via SSL as well (https://...).
 * A self signed SSL certificate will work just fine.
 * If the MailWizz powered website doesn't use clean urls,
 * make sure your apiUrl has the index.php part of url included, i.e:
 * http://www.mailwizz-powered-website.tld/api/index.php
 *
 * Configuration components:
 * The api for the MailWizz EMA is designed to return proper etags when GET requests are made.
 * We can use this to cache the request response in order to decrease loading time therefore improving performance.
 * In this case, we will need to use a cache component that will store the responses and a file cache will do it just fine.
 * Please see MailWizzApi/Cache for a list of available cache components and their usage.
 */

// // configuration object
// $config = new MailWizzApi_Config(array(
//     'apiUrl'        => 'http://www.mailwizz-powered-website.tld/api',
//     'publicKey'     => 'PUBLIC-KEY',
//     'privateKey'    => 'PRIVATE-KEY',

//     // components
//     'components' => array(
//         'cache' => array(
//             'class'     => 'MailWizzApi_Cache_File',
//             'filesPath' => dirname(__FILE__) . '/../MailWizzApi/Cache/data/cache', // make sure it is writable by webserver
//         )
//     ),
// ));
// configuration object
$config = new MailWizzApi_Config(array(
    'apiUrl'        => 'http://mailwizz.test/mailwizz-2.3.5/latest/api/index.php',
    'publicKey'     => 'f1aad754a12c970227dff411404c24d7516984fe',
    'privateKey'    => 'f1aad754a12c970227dff411404c24d7516984fe',

    // components
    'components' => array(
        'cache' => array(
            'class'     => 'MailWizzApi_Cache_File',
            'filesPath' => dirname(__FILE__) . '/../MailWizzApi/Cache/data/cache', // make sure it is writable by webserver
        )
    ),
));

// now inject the configuration and we are ready to make api calls
MailWizzApi_Base::setConfig($config);

// start UTC
date_default_timezone_set('UTC');

function generateRandomEmail($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $email = '';
    for ($i = 0; $i < $length; $i++) {
        $email .= $characters[rand(0, strlen($characters) - 1)];
    }
    $email=$email.rand(000, 999999);
    $email .= '@mailinator.com'; // You can change the domain as needed
    return $email;
}
function generateRandomCompanyName() {
    $adjectives = ['Creative', 'Innovative', 'Global', 'Dynamic', 'Tech', 'Digital', 'Smart', 'Awesome', 'Unique', 'Eco'];
    $nouns = ['Solutions', 'Systems', 'Services', 'Group', 'Enterprises', 'Technologies', 'Innovations', 'Labs', 'Corp', 'Inc'];

    $randomAdjective = $adjectives[array_rand($adjectives)];
    $randomNoun = $nouns[array_rand($nouns)];

    return $randomAdjective . ' ' . $randomNoun;
}
function getRandomFirstName() {
    $firstNames = ['John', 'Jane', 'Michael', 'Emily', 'William', 'Olivia', 'James', 'Sophia', 'Robert', 'Emma'];
    return $firstNames[array_rand($firstNames)];
}
function getRandomLastName() {
    $lastNames = ['Smith', 'Johnson', 'Brown', 'Davis', 'Miller', 'Wilson', 'Moore', 'Taylor', 'Anderson', 'Thomas'];
    return $lastNames[array_rand($lastNames)];
}
