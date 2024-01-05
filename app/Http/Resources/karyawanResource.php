<?php

namespace App\Http\Resources;

use App\Models\karyawan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class karyawanResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    // public function toArray(Request $request): array
    // {
    //     return parent::toArray($request);
    // }
    public function show(karyawan $karyawan)
    {
        return new karyawanResource($karyawan);
    }
}
