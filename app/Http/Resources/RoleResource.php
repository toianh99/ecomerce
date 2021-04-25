<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use function Sodium\add;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name_role' => $this->name,
//            'permissions' => PermissionResource::collection($this->permissions),
            'permissions' => array_map(
                function ($permission) {
                    if ($permission['name']==='edit_user') return [
                        'id'=>$permission['id'],
                        'name'=>$permission['name'],
                    ];
                },$this->permissions->toArray()

            )[0],
        ];
    }
}
