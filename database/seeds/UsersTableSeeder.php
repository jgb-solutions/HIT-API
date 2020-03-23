<?php

  use App\Models\User;
  use Illuminate\Database\Seeder;

  class UsersTableSeeder extends Seeder
  {
    public function run()
    {
      User::truncate();

      $users = [
        [
          'name' => 'Jean Gérard',
          'email' => 'jgbneatdesign@gmail.com',
          'password' => bcrypt('asdf,,,'),
        ],
        [
          'name' => 'BeauChamps',
          'email' => 'beauchamps@gmail.com',
          'password' => bcrypt('password'),
        ],
      ];

      foreach ($users as $user) {

        User::create($user);
      }
    }
  }