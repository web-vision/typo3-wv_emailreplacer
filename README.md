# Introduction

This extension will replace the label of all email links in Frontend with the
configured label. This way no email will be visible in Frontend.

# Configuration

In TypoScript configure the label to use for each language:

    config.spamProtectEmailAddresses_linkSubst {
        de = E-Mail senden
        en = Send E-Mail
    }
