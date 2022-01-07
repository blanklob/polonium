# Polonium

> Polonium is a world class old school ✍️ blog website made with Php and Tailwind 🌀 to write dump articles about... Yeah I know, you should probably use Medium instead.

![GitHub release (latest by date)][version-badge]
[![GitHub][licence-badge]](/LICENCE)

Please note that this project was made as school project at Hetic, and is no where near production ready.

## Requirements

This package supports the following minimum versions:

* Docker >= 20.10.11

If you have Docker and Docker Compose installed, just skip to Usage, otherwise Install Them.

> Earlier versions may still work, but we encourage people building new applications
to upgrade to the current stable.

## Usage

First, you will need to install PHP dependencies localy

```shell
$ cd app && compose install
```

### Run the application

To run the application use the Docker commande

```shell
$ docker-compose up -d
```

Open your browser at http://127.0.0.1:5555

> ℹ️ If you want to check the PHPmyAdmin then go to http://127.0.0.1:8080

## Getting help

If you have a question about the application, or are having difficulty using it,
chat with the community in [GitHub Discussions](/discussions)..

## Contributing

Everyone is welcome to make this package better feel free to submit your pull request/feature request 👋.

<!-- Markdown links & img dfn's -->
[licence-badge]: https://img.shields.io/github/license/idbakkasse/polonium
[version-badge]: https://img.shields.io/github/v/release/idbakkasse/polonium
