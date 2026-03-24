# laravel-package-skeleton

Domain Driven Laravel Package Development skeleton project for modular Laravel application development.

Based on <https://github.com/spatie/laravel-package-tools>, this starter ships with Testbench, Pest, PHPStan, Rector, Livewire and Filament with the appropriate and required configuration necessary to develop and test from within the package/module itself.

## How to use

This repository serves as a starting point to a modular approach to app development according to Domain Driven Design and Hexagonal Architecture principles. To get started:

1. Create your package directory and run `git init`;
1. Add package remote `git remote add origin <REPOSITORY> (i.e.git@github.com:99linesofcode/.git`);
1. Add the skeleton as a secondary remote `git remote add skeleton git@github.com:99linesofcode/laravel-package-skeleton.git`;
1. Update local repository using `git fetch skeleton`;
1. Commit changes to the package repository `git rebase skeleton/main`.

If you have access to the Nix package manager you can initialize a local development environment like so:

1. Initialize the `devshell` submodule that is included by default using `git submodule update --init --recursive`;
1. Run `echo use flake ./devshell >> .envrc`;
1. Run `direnv allow`.

## Contributing

Please review the [Contribution Guidelines](https://github.com/99linesofcode/.github/blob/main/.github/CONTRIBUTING.md).

## Code of conduct

In order to ensure that the community is welcoming to all, please review and abide by the [Code of Conduct](https://github.com/99linesofcode/.github?tab=coc-ov-file).

## Security vulnerabilities

Please review the [security policy](https://github.com/99linesofcode/.github?tab=security-ov-file) on how to report security vulnerabilities.

## License

This software is open source and licensed under the [MIT license](https://github.com/99linesofcode/.github?tab=MIT-1-ov-file).
