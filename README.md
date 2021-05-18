# book-bundle

Offers tools for management of books.

## Getting Started

```shell
composer req baldeweg/book-bundle
```

Activate the bundle in your `config/bundles.php`, if not done automatically.

```php
Baldeweg\Bundle\BookBundle\BaldewegBookBundle::class => ['all' => true],
```

Building a new query.

```php
use Baldeweg\Bundle\BookBundle\Search\Find;

$find = new Find($em, $term, $filter, $orderBy);
$find->setFields([]);
$find->setForcedFilters([]);
$find->find();
```

## Options

## Query

- term - string , Operator: like
- filter - array\<filter\>
- orderBy - array
  - book - array\<order\>
  - author - array\<order\>
- limit - integer
- offset - integer

## Filter

- genre - array\<integer\>, Operator: in
- lendOn - integer, Operators: eq, gte, gt, lte, lt, null
- branches - integer, Operator: eq
- releaseYear - integer, Operator: eq, gte, gt, lte, lt, null
- sold - bool, Operator: eq
- removed - bool, Operator: eq
- type - string, Operator: eq
- added - integer, Operator: eq, gte, gt, lte, lt, null

## Order

- field - string
- direction - string
