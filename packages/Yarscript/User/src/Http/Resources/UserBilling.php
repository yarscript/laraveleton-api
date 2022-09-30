<?php


namespace Yarscript\User\Http\Resources;

use Illuminate\Http\{Request, Resources\Json\JsonResource};


/**
 * Class UserBilling
 * @package Yarscript\User\Http\Resources
 */
class UserBilling extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id
        ];
    }
}
