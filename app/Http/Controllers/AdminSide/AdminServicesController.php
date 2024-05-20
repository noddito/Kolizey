<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class AdminServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = Service::orderBy('created_at', 'desc')->get();
        return view('admin.services.index', [
            'services' => $services
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->savePhotos($request, $service , '/service_logos');
        $service->save();

        return redirect()
            ->route('services.index')
            ->with('success', 'Услуга успешно создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service): View
    {
        return view('admin.services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $rules = [
            'name' => 'required|string',
            'description' => 'nullable|string',
            'file' => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $service = Service::where(['id' => $request->id])->first();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->savePhotos($request, $service , '/service_logos');
        $service->save();
        return redirect()
            ->route('services.index')
            ->with('success', 'Улусга успешно изменена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Улусга успешно удалена');
    }
}
