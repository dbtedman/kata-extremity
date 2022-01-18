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

## Design

### PHP Coding Style

[PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/)

### Domain Use Cases

-   Filter traffic
-   Audit log
-   Attach required headers inbound and outbound
-   Filter unwanted headers inbound and outbound
-   Alert on suspicious behaviour
-   Apply custom rules

## License

The [MIT License](./LICENSE.md) is used by this project.
