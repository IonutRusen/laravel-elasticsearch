<?php

declare(strict_types=1);

namespace PDPhilip\Elasticsearch\Eloquent\Docs;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Cursor;
use Illuminate\Pagination\CursorPaginator;

/**
 * @method $this term(string $term, $boostFactor = null) @return $this
 * @method $this andTerm(string $term, $boostFactor = null)
 * @method $this orTerm(string $term, $boostFactor = null)
 * @method $this fuzzyTerm(string $term, $boostFactor = null)
 * @method $this andFuzzyTerm(string $term, $boostFactor = null)
 * @method $this orFuzzyTerm(string $term, $boostFactor = null)
 * @method $this regEx(string $term, $boostFactor = null)
 * @method $this andRegEx(string $term, $boostFactor = null)
 * @method $this orRegEx(string $term, $boostFactor = null)
 * @method $this phrase(string $term, $boostFactor = null)
 * @method $this andPhrase(string $term, $boostFactor = null)
 * @method $this orPhrase(string $term, $boostFactor = null)
 * @method $this minShouldMatch(int $value)
 * @method $this minScore(float $value)
 * @method $this field(string $field, int $boostFactor = null)
 * @method $this fields(array $fields)
 * @method int|array sum(array|string $columns)
 * @method int|array min(array|string $columns)
 * @method int|array max(array|string $columns)
 * @method int|array avg(array|string $columns)
 * @method search(array $columns = '*')
 * @method query(array $columns = '*')
 * @method toDsl(array $columns = '*')
 * @method agg(array $functions, $column)
 * @method $this WhereDate($column, $operator = null, $value = null, $boolean = 'and')
 * @method $this WhereTimestamp($column, $operator = null, $value = null, $boolean = 'and')
 * @method $this whereIn(string $column, array $values)
 * @method $this whereExact(string $column, string $value)
 * @method $this wherePhrase(string $column, string $value)
 * @method $this wherePhrasePrefix(string $column, string $value)
 * @method $this filterGeoBox(string $column, array $topLeftCoords, array $bottomRightCoords)
 * @method $this filterGeoPoint(string $column, string $distance, array $point)
 * @method $this whereRegex(string $column, string $regex)
 * @method $this whereNestedObject(string $column, Callable $callback, string $scoreType = 'avg')
 * @method $this whereNotNestedObject(string $column, Callable $callback, string $scoreType = 'avg')
 * @method $this firstOrCreate(array $attributes, array $values = [])
 * @method $this firstOrCreateWithoutRefresh(array $attributes, array $values = [])
 * @method $this orderBy(string $column, string $direction = 'asc', string $mode = null, array $missing = '_last')
 * @method $this orderByDesc(string $column, string $mode = null, array $missing = '_last')
 * @method $this orderByGeo(string $column, array $pin, $direction = 'asc', $unit = 'km', $mode = null, $type = 'arc')
 * @method $this orderByGeoDesc(string $column, array $pin, $unit = 'km', $mode = null, $type = 'arc')
 * @method $this orderByNested(string $column, string $direction = 'asc', string $mode = null)
 * @method bool chunk(mixed $count, callable $callback, string $keepAlive = '5m')
 * @method bool chunkById(mixed $count, callable $callback, $column = '_id', $alias = null, $keepAlive = '5m')
 * @method $this queryNested(string $column, Callable $callback)
 * @method array rawSearch(array $bodyParams, bool $returnRaw = false)
 * @method array rawAggregation(array $bodyParams)
 * @method $this highlight(array $fields = [], string|array $preTag = '<em>', string|array $postTag = '</em>', $globalOptions = [])
 * @method bool deleteIndexIfExists()
 * @method bool deleteIndex()
 * @method $this createIndex(array $settings = [])
 * @method array getIndexMappings()
 * @method array getIndexSettings()
 * @method bool indexExists()
 * @method LengthAwarePaginator paginate(int $perPage = 15, array $columns = ['*'], string $pageName = 'page', ?int $page = null, ?int $total = null)
 * @method CursorPaginator cursorPaginate(int $perPage = null, array $columns = [], string $cursorName = 'cursor', ?Cursor $cursor = null)
 *
 * @mixin \Illuminate\Database\Query\Builder
 */
trait ModelDocs {}
