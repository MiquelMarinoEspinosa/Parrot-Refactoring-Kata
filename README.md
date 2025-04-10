# Parrot Refactoring Kata

This is the PHP version of the 
Parrot Refactoring Kata. The Kata is fully functional, with a full test suite. The objective of this Kata is to 
improve the code using Pol(l)ymorphism. The tests do not normally need to be changed.

## Installation

The kata uses:

- [PHP 8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Recommended:

- [Git](https://git-scm.com/downloads)

See [GitHub cloning a repository](https://help.github.com/en/articles/cloning-a-repository) for details on how to
create a local copy of this project on your computer.

```sh
git clone https://github.com/emilybache/Parrot-Refactoring-Kata.git
```

Install all the dependencies using composer

```sh
cd Parrot-Refactoring-Kata/PHP
composer install
```

Run all the tests

```shell script
composer tests
```

## Dependencies

The kata uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard)

## Folders

- `src` - contains the Parrot class which need to be refactored and a ParrotTypeEnum.
- `tests` - contains the corresponding tests. All the tests are passing, and shouldn't need to be changed.

## Testing

PHPUnit is pre-configured to run tests. PHPUnit can be run using a composer script. To run the unit tests, from the root
of the PHP kata run:

```shell script
composer tests
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias pu="composer test"`), the same
PHPUnit `composer test` can be run:

```shell script
pu.bat
```

### Tests with Coverage Report

To run all test and generate a html coverage report run:

```shell script
composer test-coverage
```

The test-coverage report will be created in /builds, it is best viewed by opening /builds/**index.html** in your browser.

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards, **PSR-12** is used.

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias cc="composer check-cs"`), the
same `composer check-cs` can be run:

```shell script
cc.bat
```

### Fix Code

There are many code fixes automatically provided by ECS, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias fc="composer fix-cs"`), the same 
`composer fix-cs` can be run:

```shell script
fc.bat
```

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias ps="composer phpstan"`), the 
same `composer phpstan` can be run:

```shell script
ps.bat
```

**Happy coding**!

### Refactor
Check the `refactor` brach up!

### Refactor strategy
- Since the current units tests has got a 100% coverage, the refactor is safe to begin :)
- For every step through the reafactor, the unit tests would be executed and the coverage reviewed to guarantee the correctness of the process
- The refactor would be focus on apply `polymorphism` to the code decoupling the different kind of parrots behaviour
- The parrot super class will be responsible to create the different kind of parrots via a `factory method`
- Chances are that the super class `Parrot` will become `abstract`

### Refactor steps
- Introduce the `factory method` at the `Parrot` class to instantiate the parrot
    - In this first iteration, it will return the `Parrot` class itself
    - The `__construct` class can be passed to `protected` to force the clients to use the new `factory method`
    - The `test` class, as a client of the `Parrot` class, needs to be change to use the new `factory method`
- It has been identified the `getCry` method as the easiest to start the refactor introducing `polymorphism`
- `European` parrot class would be introduced and instantiated at the `Parrot` factory method
- Refactor pull `european` `getCry` method logic down to `EuropeanParrot`
- Introduce `African` parrot class and instantiate it at the `Parrot` factory method
- Refactor `create` factory method to use the `match` operator instead of using multiple conditionals
- Refactor pull `african` `getCry` method logic down to `AfricanParrot`
- Introduce `NorwegianBlue` parrot class and instantiate it at the `Parrot` factory method
- Refactor pull `norwegian blue` `getCry` method logic down to `NorwegianBlue`
- At this point since all the parrot classes have been introduced and the `getCry` logic method has been pull down to the classes, this method could be defined as `abstract` making the `Parrot` class abstract and therefore not instantiable. Some change needed to be done before.
    - Add exception to the `default factory method option` and covered with tests
        - TDD
            - Red: First add a unit test which fails when try to instiate an `unknown` parrot
            - Green: Fix the test throwing an exception when unknown parrot is tried to be created
            - Blue: Refactor remove `getCry` implementation and make it abstract. The method will not be directly called from the parent class anymore which will also be `abstract` from now on
- At this point we are ready to continue with pulling `Parrot` super class logic down to the subclasses refactoring the `getSpeed` method
    - Refactor pull `getSpeed european logic` from `Parrot` super class to `EuropeanParrot` subclass
    - Refactor pull `getSpeed african logic` from `Parrot` super class to `AfricanParrot` subclass
    - Refactor pull `getSpeed norwegian blue logic` from `Parrot` super class to `NorwegianBlueParrot` subclass
    - Make the `getSpeed Parrot class` method abstract
- At this point of the refactor both the `getSpeed` and the `getCry` are `abstract` at the super class. The previous logic has been pull down to the new parrot subclasses. During the refactor has been detected some improvements related to certain data as well as methods use by certain parrots but not all of them. It would be interesting to not have common logic share across the parrots when the logic is used just for one kind for instance. Here there are some refactor suggestions as next steps:
    - Convert `methods` that just return scalar values into `constants`
    - Review and pull down the superclass `methods` that are just used for one kind of parrot
    - Review and pull down the superclass `fields` that are just used for one kind of parrot
        - In those cases the `__construct` method should be override in the parrot subclasses
- Refactor pull `loadFactor` method down to `AfricanParrot`
- Refactor `loadFactor AfricanParrot method` convert it into `constant`
- Refactor pull `getBaseSpeedWith` super class method down to `NorwegianBlueParrot` subclass
- Refactor inline method for `getBaseSpeedWith` at `NorwegianBlueParrot` 
- Refactor extract `getBaseSpeed` super class method into a `constant`
    
