<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Classes extends JsonResource
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
            'user'      => new UserResource($this->user),
            'subject'   => $this->subject,
            'cost'      => $this->cost,
            'schedules' => $this->class_schedules
        ];
    }
}
