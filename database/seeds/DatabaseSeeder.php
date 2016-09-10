<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $this->call(CountryTableSeeder::class);


        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserRoleSeeder::class);

        


        // | activities | -< | companies |
        $this->call(ActivityTableSeeder::class);
        $this->call(CompanyTableSeeder::class);


        // |suppliers| >-< |currencies|
        $this->call(CurrencyTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        $this->call(CurrencySupplierTableSeeder::class);

        // |suppliers| >-< |pay_metods|
        $this->call(PayMetodTableSeeder::class);
        $this->call(PaySuppliersTableSeeder::class);


        // | levels | -< | positions |
        $this->call(LevelTableSeeder::class);
        $this->call(PositionTableSeeder::class);

        // | Users | >-< | positions |
        $this->call(PositionUser_TableSeeder::class);



        $this->call(purchasesTableSeeder::class);


        // |state_assignments| >-< |assignments|
        $this->call(StateAssetTableSeeder::class);
        $this->call(AssetTableSeeder::class);


        $this->call(StateAssignmentTableSeeder::class);
        $this->call(AssignmentTableSeeder::class);
        $this->call(StateAssignment_AssignmentTableSeeder::class);

        $this->call(OfficesTableSeeder::class);

        $this->call(DepartmentTableSeeder::class);

        $this->call(Department_usersTableSeeder::class);

        Model::reguard();
    }
}
