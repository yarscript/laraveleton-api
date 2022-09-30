<?php


namespace Yarscript\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class User
 * @package Yarscript\User\Http\Resources
 */
class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $dbg = true;
        return [
            'user_uuid'           => $this->user_uuid,
            'first_name'          => $this->first_name,
            'last_name'           => $this->last_name,
            'email'               => $this->email,
            'email_verified_at'   => $this->email_verified_at,
            'service_plan_uuid'   => $this->service_plan_uuid,
            'service_plan_status' => $this->service_plan_status,
            'remember_token'      => $this->remember_token,
            'created_at'          => $this->created_at,
            'updated_at'          => $this->updated_at,
            'deleted_at'          => $this->deleted_at,
        ];
    }
}
