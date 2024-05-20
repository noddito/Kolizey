<?php
declare(strict_types=1);

namespace App\Http\Controllers\AdminSide;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Validator;


class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $company_info = Company::orderBy('created_at', 'desc')->get();
        return view('admin.company.index', [
            'company_info' => $company_info
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $company = new Company();

        $validator = Validator::make($request->all(), $company->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $company->file_name = $request->input('file_name');
        $company->file_description = $request->input('file_description');
        $company->saveFiles($request, $company);
        $company->save();

        return redirect()
            ->route('company.index')
            ->with('success', 'Файл успешно добавлен');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View
    {
        return view('admin.company.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company): RedirectResponse
    {
        $validator = Validator::make($request->all(), $company->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $company->file_name = $request->input('file_name');
        $company->file_description = $request->input('file_description');
        $company->saveFiles($request, $company);
        $company->save();

        return redirect()
            ->route('company.index')
            ->with('success', 'Файл успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();
        return redirect()
            ->route('company.index')
            ->with('success', 'Файл успешно удален');
    }
}
