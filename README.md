Demo extension for Nette, installable via Composer.

As the first step in a Nette project, install the extension using the command `composer require nowready/demo-erp`.
The second step involves registering the extension in the appropriate configuration file and setting the environmental variables that the extension utilizes.
```
extensions:
    DemoErpExtension: nowready\DemoErp\DI\DemoErpExtension

DemoErpExtension:
    erpEndpoint: 'http://example.com/api'
    erpSecret: 'secret-key'
    erpVersion: 2.0
```
In case the required data is not configured, the extension will throw an exception.
