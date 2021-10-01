<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Providers\RoleProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SyncRolePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'raido:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create All Define Permission In Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach ($this->getAllPermissions() as $permission) {
            Permission::firstOrCreate([
                'label' => $permission['label'],
                'slug'  => $permission['slug']
            ]);
        }
        Cache::forget('roles');
        RoleProvider::define();
    }

    protected function getAllPermissions()
    {
        return [
            [
                'label' => 'Customer Management',
                'slug'  => 'customer_management'
            ],
            [
                'label' => 'Admin Management',
                'slug'  => 'admin_management'
            ],
            [
                'label' => 'Vendor Management',
                'slug'  => 'vendor_management'
            ],
            [
                'label' => 'Driver With Vehicle Management',
                'slug'  => 'driver_management'
            ],
            [
                'label' => 'Role Management',
                'slug'  => 'role_management'
            ],
            [
                'label' => 'Vehicle Type Management',
                'slug'  => 'vehicle_type_management'
            ],
            [
                'label' => 'User Request Management',
                'slug'  => 'user_request_management'
            ],
            [
                'label' => 'Setting Management',
                'slug'  => 'setting_management'
            ],
        ];
    }
}
