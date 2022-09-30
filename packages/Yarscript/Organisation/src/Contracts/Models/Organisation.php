<?php


namespace Yarscript\Organisation\Contracts\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Interface Organisation
 * @package Yarscript\Organisation\Contracts\Models
 */
interface Organisation
{
    /**
     * Table Name const
     * @var string
     */
    public const TABLE_NAME = 'organisations';

    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo;

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany;

    /**
     * @return HasMany
     */
    public function projects(): HasMany;
}
