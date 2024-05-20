<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait ImageSaver
{
    public function saveProjectPhotos($request, $project_id): void
    {
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $photo_path = $file->store('/project_photos', 'public');
                DB::table('project_photos')->insert(['id' => $project_id, 'photo_path' => $photo_path]);
            }
        }
    }

    public function savePhotos($request, Model $model , string $folder): void
    {
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store($folder, 'public');
            if ($model->logo_path !== null) {
                Storage::disk('public')->delete($model->logo_path);
            }
            $model->logo_path = $path;
        }
    }
}
