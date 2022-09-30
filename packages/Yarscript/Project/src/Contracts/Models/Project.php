<?php


namespace Yarscript\Project\Contracts\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Interface Project
 * @package Yarscript\Project\Contracts\Models
 */
interface Project
{
    /**
     * @return BelongsTo
     */
    public function owner(): BelongsTo;

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany;

    /**
     * @return BelongsTo
     */
    public function organisation(): BelongsTo;
}
