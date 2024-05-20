<?php

namespace App\Http\Controllers\AdminSide\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait FileSaver
{
    public function saveFiles($request, Model $model): void
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('/company_files', 'public');
            if ($model->logo_path !== null) {
                Storage::disk('public')->delete($model->logo_path);
            }
            $model->file_path = $path;
        }
    }
}
