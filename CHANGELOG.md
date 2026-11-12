## [1.0.1](https://github.com/99linesofcode/laravel-module-news/compare/v1.0.0...v1.0.1) (2026-11-12)


### Bug Fixes

* **lint:** scan _ide_helper_models.php alone and read the migrations ([b90c556](https://github.com/99linesofcode/laravel-module-news/commit/b90c556cce6d00d9aae946066ebb698609386fbe))
* **posts:** correct what PHPStan found once it could run ([989cb2a](https://github.com/99linesofcode/laravel-module-news/commit/989cb2a50938509c2f97b6b630cf84dd9d6830d0))



# [1.0.0](https://github.com/99linesofcode/laravel-module-news/compare/v0.3.0...v1.0.0) (2026-11-12)


### Bug Fixes

* **deps:** bump brace-expansion from 5.0.9 to 5.0.12 ([#88](https://github.com/99linesofcode/laravel-module-news/issues/88)) ([fe52d5c](https://github.com/99linesofcode/laravel-module-news/commit/fe52d5c27a80e7d346901bbcc618c289f4053715))
* **deps:** bump devshell from `4075c8d` to `5278d4d` ([#84](https://github.com/99linesofcode/laravel-module-news/issues/84)) ([45af3ef](https://github.com/99linesofcode/laravel-module-news/commit/45af3ef721a879469f6693076712114cce1a836c))
* **deps:** bump follow-redirects from 1.16.0 to 1.16.1 ([#90](https://github.com/99linesofcode/laravel-module-news/issues/90)) ([1ca67d5](https://github.com/99linesofcode/laravel-module-news/commit/1ca67d58dc807e6a2df4f1e65dfb758ef9678009))
* **deps:** bump follow-redirects from 1.16.1 to 1.16.2 ([#93](https://github.com/99linesofcode/laravel-module-news/issues/93)) ([d98c444](https://github.com/99linesofcode/laravel-module-news/commit/d98c444aaf9b7071d5d4a5463889599b70a6c818))
* **deps:** bump ip-address from 10.2.0 to 10.7.4 ([#86](https://github.com/99linesofcode/laravel-module-news/issues/86)) ([d091e5a](https://github.com/99linesofcode/laravel-module-news/commit/d091e5aacde487bbd5b51b14fc1247a6c3013678))
* **deps:** bump source-map-js from 1.2.1 to 1.2.2 ([#87](https://github.com/99linesofcode/laravel-module-news/issues/87)) ([7473b91](https://github.com/99linesofcode/laravel-module-news/commit/7473b917f56565dfefda06b69e52553a1542b409))
* **deps:** bump the automated group with 2 updates ([#95](https://github.com/99linesofcode/laravel-module-news/issues/95)) ([e143dfe](https://github.com/99linesofcode/laravel-module-news/commit/e143dfec98bdcaebde706f76fdf91d95a52b60f0))
* **deps:** bump the automated group with 8 updates ([#92](https://github.com/99linesofcode/laravel-module-news/issues/92)) ([fd677a1](https://github.com/99linesofcode/laravel-module-news/commit/fd677a1639477718e2cbf44ba4b2b5172949e00f))


* feat!: record a post's author as a UserId ([b8100c8](https://github.com/99linesofcode/laravel-module-news/commit/b8100c848be9ba1f192ac0b17e347816a350f145))


### BREAKING CHANGES

* PostData::$author_id is a UserId rather than an int,
and Post::author() is removed.

Issue: 0052-laravel-modules-meet-the-skeleton-user-contract



# [0.3.0](https://github.com/99linesofcode/laravel-module-news/compare/v0.2.2...v0.3.0) (2026-10-06)


### Bug Fixes

* **deps:** bump devshell from `21db3dd` to `4075c8d` ([#81](https://github.com/99linesofcode/laravel-module-news/issues/81)) ([958837b](https://github.com/99linesofcode/laravel-module-news/commit/958837bf3484ff24c0ef97b02325857231c77461))
* **deps:** fall back to VCS resolution for the sibling modules ([a813edc](https://github.com/99linesofcode/laravel-module-news/commit/a813edc78c72074e0b544bc11c3af15989160bcf))
* **deps:** glob the path repository so CI tolerates absent siblings ([7c65814](https://github.com/99linesofcode/laravel-module-news/commit/7c6581470c0c3f14afbdeb32df15b6401ae812e6))


### Features

* **lint:** enforce the layer contract with deptrac ([7253d09](https://github.com/99linesofcode/laravel-module-news/commit/7253d09861a9e3d2ba8236ae9d98d0685cbbae34))



## [0.2.2](https://github.com/99linesofcode/laravel-module-news/compare/v0.2.1...v0.2.2) (2026-09-21)


### Bug Fixes

* **deps:** bump devshell from `c369d7f` to `21db3dd` ([#79](https://github.com/99linesofcode/laravel-module-news/issues/79)) ([0f2ed53](https://github.com/99linesofcode/laravel-module-news/commit/0f2ed53c7a574bf9e809dda2d860d55a203b4a32))



## [0.2.1](https://github.com/99linesofcode/laravel-module-news/compare/v0.2.0...v0.2.1) (2026-09-17)


### Bug Fixes

* **deps:** bump devshell from `7b1fc23` to `c369d7f` ([#77](https://github.com/99linesofcode/laravel-module-news/issues/77)) ([1f364f3](https://github.com/99linesofcode/laravel-module-news/commit/1f364f339f0ea53247673f684389043b4c03275e))



