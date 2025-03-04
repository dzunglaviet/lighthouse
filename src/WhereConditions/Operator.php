<?php

namespace Nuwave\Lighthouse\WhereConditions;

use Illuminate\Database\Eloquent\Model;

/**
 * An Operator handles the database or application specific bits
 * of applying WHERE conditions to a database query builder.
 */
interface Operator
{
    /**
     * Return the GraphQL SDL definition of the operator enum.
     */
    public function enumDefinition(): string;

    /**
     * The default value if no operator is specified.
     *
     * @example "EQ"
     */
    public function default(): string;

    /**
     * The default value if no has operator is specified.
     *
     * @example "GTE"
     */
    public function defaultHasOperator(): string;

    /**
     * Apply the conditions to the query builder.
     *
     * @param  \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder  $builder
     * @param  array<string, mixed>  $whereConditions
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function applyConditions($builder, array $whereConditions, string $boolean, Model $model);
}
