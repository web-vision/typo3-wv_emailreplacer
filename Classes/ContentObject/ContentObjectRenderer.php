<?php

namespace WebVision\WvEmailreplacer\ContentObject;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use \TYPO3\CMS\Frontend\ContentObject;

/**
 * Overwrite core to extend functionality.
 *
 * @author Daniel Siepmann <d.siepmann@web-vision.de>
 */
class ContentObjectRenderer extends ContentObject\ContentObjectRenderer
{
    const CONFIG = 'config';
    const LABEL_PATH = 'spamProtectEmailAddresses_linkSubst.';

    /**
     * Creates a href attibute for given $mailAddress.
     * The function uses spamProtectEmailAddresses and Jumpurl functionality
     * for encoding the mailto statement.  If spamProtectEmailAddresses is
     * disabled, it'll just return a string like "mailto:user@example.tld".
     *
     * @param string $mailAddress Email address
     * @param string $linktxt Link text, default will be the email address.
     * @param string $initP Initial link parameters. Example: ?id=5&type=0
     *
     * @return string
     */
    public function getMailTo($mailAddress, $linktxt, $initP = '?')
    {
        $languageKey = $GLOBALS['TSFE']->config[static::CONFIG]['language'];
        $return = parent::getMailTo($mailAddress, $linktxt, $initP);
        if (trim($linktxt) === '' || \TYPO3\CMS\Core\Utility\GeneralUtility::validEmail($linktxt)
            && isset($GLOBALS['TSFE']->config[static::CONFIG][static::LABEL_PATH]['default'])
        ) {
            $return[1] = $GLOBALS['TSFE']->config[static::CONFIG][static::LABEL_PATH]['default'];
            if (array_key_exists($languageKey, $GLOBALS['TSFE']->config[static::CONFIG][static::LABEL_PATH])) {
                $return[1] = $GLOBALS['TSFE']->config[static::CONFIG][static::LABEL_PATH][$languageKey];
            }
        }

        return $return;
    }
}
