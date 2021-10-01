<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\CacheHelper;
use App\Traits\FileHelper;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SettingController extends Controller
{
    use FileHelper, CacheHelper;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            try {
                $this->authorizeForUser(auth()->user(), 'setting_management');
            } catch (AuthorizationException $e) {
                abort(401);
            }
            return $next($request);
        });
    }

    public function create()
    {
        return view('admin.setting.create')
            ->with([
                'setting' => collect([
                    'company_name' => settings()->get('company_name'),
                    'company_email' => settings()->get('company_email'),
                    'company_contact' => settings()->get('company_contact'),
                    'company_address' => settings()->get('company_address'),
                    'company_logo' => settings()->get('company_logo'),
                ])

            ]);
    }

    public function store(Request $request)
    {
        $company_logo = '';
        if ($request->hasFile('company_logo'))
            $company_logo = $this->saveFileAndGetName($request->file('company_logo'));

        settings()
            ->set('company_name', $request->get('company_name'))
            ->set('company_email', $request->get('company_email'))
            ->set('company_contact', $request->get('company_contact'))
            ->set('company_address', $request->get('company_address'))
            ->save();

        if ($company_logo !== '') {
            settings()
                ->set('company_logo', $company_logo)->save();
        }

        if ($request->wantsJson()) {
            return new Response('', 201);
        }

        return back();
    }
}
