<?php


namespace Yarscript\User\Contracts\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Interface User
 *
 * @property int service_plan_id
 * @property string service_plan_uuid
 *
 * @package Yarscript\User\Contracts\Models
 */
interface User
{
    /**
     * @return HasOne
     */
    public function info(): HasOne;

    /**
     * @return BelongsTo
     */
    public function servicePlan(): BelongsTo;

    /**
     * @return HasMany
     */
    public function organisations(): HasMany;

    /**
     * @return BelongsToMany
     */
    public function relatedOrganisations(): BelongsToMany;

    /**
     * Get User's id, uuid
     * @return array
     */
    public function getUserIds(): array;

    /**
     * @return HasOne
     */
    public function billing(): HasOne;

}
