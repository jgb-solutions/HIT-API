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
          'email' => 'wendersonbeauchamps@gmail.com',
          'password' => bcrypt('wolsybeauchamps509haiti'),
        ],
      ];

      foreach ($users as $user) {

        User::create($user);
      }
    }
  }