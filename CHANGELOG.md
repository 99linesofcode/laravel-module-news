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



# [0.2.0](https://github.com/99linesofcode/laravel-module-news/compare/v0.1.4...v0.2.0) (2026-09-06)


### Bug Fixes

* **dependabot:** introduce dependency cooldown to mitigate supply chain attacks ([3a83b34](https://github.com/99linesofcode/laravel-module-news/commit/3a83b34e84f92b72b5adcfd44baa8d5d202f1177))
* **dependabot:** introduce dependency cooldown to mitigate supply chain attacks ([eee94e1](https://github.com/99linesofcode/laravel-module-news/commit/eee94e1c1260aae58ba6323656e335118b7cc254))
* **dependabot:** time should be a string not an int ([0cb4455](https://github.com/99linesofcode/laravel-module-news/commit/0cb445539850a8a50f73ad89a218c13cf589e45d))
* **dependabot:** time should be a string not an int ([f66f3cb](https://github.com/99linesofcode/laravel-module-news/commit/f66f3cbe78db6cc713509d8f65aa69ef806512e8))
* **deps:** bump basic-ftp in the npm_and_yarn group across 1 directory ([#18](https://github.com/99linesofcode/laravel-module-news/issues/18)) ([b7bd299](https://github.com/99linesofcode/laravel-module-news/commit/b7bd2996d9a15c9bdbbf725a4518b3cbb4f16631))
* **deps:** bump basic-ftp in the npm_and_yarn group across 1 directory ([#19](https://github.com/99linesofcode/laravel-module-news/issues/19)) ([97f7b5c](https://github.com/99linesofcode/laravel-module-news/commit/97f7b5c76bef4ab320aeb2c692a168e4559400fe))
* **deps:** bump basic-ftp in the npm_and_yarn group across 1 directory ([#20](https://github.com/99linesofcode/laravel-module-news/issues/20)) ([c121f2c](https://github.com/99linesofcode/laravel-module-news/commit/c121f2ca325c1bb802dd282f815ebb2263adcacc))
* **deps:** bump basic-ftp in the npm_and_yarn group across 1 directory ([#21](https://github.com/99linesofcode/laravel-module-news/issues/21)) ([3fbd6db](https://github.com/99linesofcode/laravel-module-news/commit/3fbd6dbb678892a6ba9700a97ce8f526e76365f8))
* **deps:** bump brace-expansion ([#12](https://github.com/99linesofcode/laravel-module-news/issues/12)) ([d9e8adf](https://github.com/99linesofcode/laravel-module-news/commit/d9e8adfe06cf35f99b4b4db4b25e189570a3a253))
* **deps:** bump devshell from `0195dc0` to `e949d95` ([f715225](https://github.com/99linesofcode/laravel-module-news/commit/f71522515cfc5e6309e286779bf70f32c78d9f66))
* **deps:** bump devshell from `e949d95` to `7b1fc23` ([3c6163e](https://github.com/99linesofcode/laravel-module-news/commit/3c6163e7b4b894cc88377814f0585a9a608e9576))
* **deps:** bump follow-redirects ([#22](https://github.com/99linesofcode/laravel-module-news/issues/22)) ([1d8e7ba](https://github.com/99linesofcode/laravel-module-news/commit/1d8e7baeefbcd82a492f4bd382ad5a92b195c5b6))
* **deps:** bump follow-redirects ([#24](https://github.com/99linesofcode/laravel-module-news/issues/24)) ([a15efe7](https://github.com/99linesofcode/laravel-module-news/commit/a15efe795d75b20789149cc60804c3c92c2973d3))
* **deps:** bump protobufjs in the npm_and_yarn group across 1 directory ([#25](https://github.com/99linesofcode/laravel-module-news/issues/25)) ([0f3ae40](https://github.com/99linesofcode/laravel-module-news/commit/0f3ae406efeba293991b5dfd4126553bc8057ba7))
* **deps:** bump protobufjs in the npm_and_yarn group across 1 directory ([#26](https://github.com/99linesofcode/laravel-module-news/issues/26)) ([9e1959f](https://github.com/99linesofcode/laravel-module-news/commit/9e1959f1f35b25e96020ecb33f6dbd396d0efd36))
* **deps:** bump the npm_and_yarn group across 1 directory with 2 updates ([6cdbc23](https://github.com/99linesofcode/laravel-module-news/commit/6cdbc2347132f186f960241324b6b078529d1fdc))


### Features

* **dependabot:** automatically update submodules, node and composer packages ([19eab27](https://github.com/99linesofcode/laravel-module-news/commit/19eab27375cafc2f7c15f1d4c26976da07992098))



