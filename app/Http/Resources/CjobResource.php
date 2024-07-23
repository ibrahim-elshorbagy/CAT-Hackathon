<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CjobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'company_id' => $this->company_id,
            'contact_email' => $this->contact_email,
            'contact_phone' => $this->contact_phone,
            'logo' => $this->logo && !(str_starts_with($this->logo, 'http')) ?
                Storage::url($this->logo) : $this->logo,
            'field' => $this->field,

        ];
    }
}
