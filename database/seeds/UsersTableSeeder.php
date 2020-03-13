<?php

  use App\Models\User;
  use Illuminate\Database\Seeder;

  class UsersTableSeeder extends Seeder
  {
    public function run()
    {
      User::truncate();

      factory(User::class, 50)->create();
    }
  }