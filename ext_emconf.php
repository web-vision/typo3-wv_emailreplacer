<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Email Replacer',
    'description' => 'Replace all email adresses with call to action in Frontend.',
    'category' => 'frontend',
    'author' => 'Daniel Siepmann',
    'author_email' => 'd.siepmann@web-vision.de',
    'state' => 'stable',
    'author_company' => 'web-vision',
    'version' => '1.0.0',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.0-6.2.99',
        ),
    ),
);
