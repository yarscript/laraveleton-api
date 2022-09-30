<?php


namespace Yarscript\User\Http\Resources;

use Illuminate\Http\{Request, Resources\Json\JsonResource};


/**
 * Class UserInfo
 * @method Collect
 * @package Yarscript\User\Http\Resources
 */
class UserInfo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'info_uuid' => $this->info_uuid,
            'user_id'   => $this->user_id
        ];
    }
}
