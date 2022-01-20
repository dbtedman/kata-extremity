# [Kata](https://github.com/dbtedman/kata) // [Extremity](https://github.com/dbtedman/kata-extremity)

> ⚠️ WARNING: Not production ready code.

[![CI Results](https://github.com/dbtedman/kata-extremity/workflows/ci/badge.svg)](https://github.com/dbtedman/kata-extremity/actions?workflow=ci)

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
