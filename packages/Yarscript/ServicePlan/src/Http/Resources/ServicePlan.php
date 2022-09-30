<?php


namespace Yarscript\ServicePlan\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ServicePlan
 * @package Yarscript\ServicePlan\Http\Resources
 */
class ServicePlan extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'service_plan_uuid' => $this->service_plan_uuid,
            'name'              => $this->name,
            'plan'              => $this->plan,
            'created_by'        => $this->created_by,
            'deleted_by'        => $this->deleted_by,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'deleted_at'        => $this->deleted_at,
        ];
    }
}
