# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/) 
and this project adheres to [Semantic Versioning](http://semver.org/).

## [7.2.0] - 2019-08-25
### Added
- New method `Row::reload()` refresh the data from the database and, optionally, discard changes.
- New argument to `RowCollection::toArray()` to convert only the collection but not the rows.
- Provided a basic event dispatcher
- Added the `Table::init()` method to run custom code after instantation.

### Fixed
- Field `Serialize` returns `NULL` if the value is not a string.
- `NULL` values on insert.
- Update a row with no changes.

## [7.1.0] - 2019-08-23
### Changed
- BREAKING: The way to define custom fields has changed in order to make it more easy and less verbose.

## 7.0.0 - 2019-04-03
This library was rewritten and a lot of breaking changes were included.

### Added
- This changelog

### Changed
- Minimum requirement is `php >= 7.2`
- Added `Atlas.Pdo` as dependency
- Use [PSR-14 Event Dispatcher](https://www.php-fig.org/psr/psr-14/) to handle events
- Added `Atlas.Query` as a dependency to create the queries and adopt its API
- The pagination info is returned with `$selectQuery->getPageInfo()` function.
- Many other changes. See the docs.

[7.2.0]: https://github.com/oscarotero/simple-crud/compare/v7.1.0...v7.2.0
[7.1.0]: https://github.com/oscarotero/simple-crud/compare/v7.0.0...v7.1.0
