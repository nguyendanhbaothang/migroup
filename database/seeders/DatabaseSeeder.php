<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->importGroups();
        $this->importRoles();
        $this->importRole();
        $this->importGroupRole();
        $this->call(CategorySeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(UserSeeder::class);
    }
    public function importRoles()
    {
        $groups = ['User'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete','adminUpdatePass'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRole()
    {
        $groups = ['Category', 'Article','Author','Group'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }

    public function importGroupRole()
    {
        for ($i = 1; $i <= 26; $i++) {
            DB::table('group_role')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
    public function importGroups()
    {
        $userGroup = new Group();
        $userGroup->name = 'Supper Admin';
        $userGroup->save();

        $userGroup = new Group();
        $userGroup->name = 'Quản Lý';
        $userGroup->save();

        $userGroup = new Group();
        $userGroup->name = 'Giám Đốc';
        $userGroup->save();


        $userGroup = new Group();
        $userGroup->name = 'Nhân Viên';
        $userGroup->save();
    }
}
