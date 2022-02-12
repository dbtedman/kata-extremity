# [Kata](https://github.com/dbtedman/kata) // [Extremity](https://github.com/dbtedman/kata-extremity)

> ⚠️ WARNING: Not production ready code.

[![CI GitHub Pipeline](https://img.shields.io/github/workflow/status/dbtedman/kata-extremity/ci?style=for-the-badge&logo=github&label=ci)](https://github.com/dbtedman/kata-extremity/actions/workflows/ci.yml?query=branch%3Amain)
![language: php](https://img.shields.io/badge/language-php-blue.svg?style=for-the-badge&logo=php)
![platform: wordpress plugin](https://img.shields.io/badge/platform-wordpress%20plugin-orange.svg?style=for-the-badge&logo=wordpress)

Secure traffic flowing in and out of your WordPress site at its extremity.

-   [Getting Started](#getting-started)
-   [Design](#design)
-   [License](#license)

## Getting Started

```shell
nvm use && make
```

## Verification

### Linting

-   [Prettier](https://prettier.io)
-   [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)

```shell
make lint
```

### Unit Testing

-   [PHPUnit](https://phpunit.de)

```shell
make test
```

Executes unit tests contained within the `test/unit/php` directory.

### Integration Testing

> ⚠️ Currently only for manual testing.

```shell
make wordpress
```

You can then access a live instance of wordpress with extremity plugin installed [http://localhost:8080](http://localhost:8080).

## Design

### PHP Coding Style

[PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/)

### Domain Entities

-   Alert Message
-   Audit Message
-   Request
-   Request Filter
-   Request Transform
-   Response
-   Response Filter
-   Response Transform

### Domain Use Cases

-   Filter traffic
-   Write event to audit log
-   Attach required headers inbound and outbound
-   Filter unwanted headers inbound and outbound
-   Alert on suspicious behaviour
-   Apply custom rules

### Gateways

-   WordPress
-   Audit Log
-   Alert Receiver

## License

The [MIT License](./LICENSE.md) is used by this project.
