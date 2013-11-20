<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        # DB::table('users')->truncate();

        $users = [
            [
                'username' => 'msurguy',
                'email'    => 'msurguy@gmail.com',
                'password' => Hash::make('1234'),
                'is_admin' => '1'
            ],
            [
                'username' => 'stidges',
                'email'    => 'stijntrank@gmail.com',
                'password' => Hash::make('1234'),
                'is_admin' => '1'
            ]
        ];

        DB::table('users')->insert($users);
    }

}
