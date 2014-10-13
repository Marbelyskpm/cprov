<?php 

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(
        	array(
        		'nombre' => 'Marbelys',
        		'apellido' => 'Pérez',
        		'username' => 'mperez',
        		'tipo' => 'administrador',
        		'password' => Hash::make('12345'),
        		)
        	);
        User::create(
        	array(
        		'nombre' => 'Alexis',
        		'apellido' => 'Montenegro',
        		'username' => 'AlexanderZon',
        		'tipo' => 'operador',
        		'password' => Hash::make('54321'),
        		)
        	);

    }

}