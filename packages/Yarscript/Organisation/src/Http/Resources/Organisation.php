<?php


namespace Yarscript\Organisation\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class User
 * @package Yarscript\User\Http\Resources
 */
class Organisation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'organisation_uuid' => $this->organisation_uuid,
            'user_uuid' => $this->user_uuid
        ];
    }
}
