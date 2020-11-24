<?php

use App\Candidat;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\User::insert([
            'name' => 'John Doe',
            'cin' => '12345678',
            'email' => 'john@doe.com',
            'password' => bcrypt('hLBRAegbrqk2tnPh'),
            'role' => 'ROLE_ADMIN',
        ]);

        /*  DB::table('users')->insert([
              'name' => 'John Doe',
              'cin' => '12345678',
              'email' => 'john@doe.com',
              'password' => bcrypt('hLBRAegbrqk2tnPh'),
              'role' => 'ROLE_ADMIN',
          ]);*/
        DB::table('date_cloture')->insert([
            'date_cloture' => '2019-11-28',
        ]);

        /*  \App\User::insert([
              'name' => 'Jane Doe',
              'email' => 'jane@doe.com',
              'password' => bcrypt('cPScF32ea4RhB3dK'),
              'role' => 'ROLE_CANDIDAT',
          ]);*/


        // factory(App\Modules\User\Models\User::class, 100)->create();

        factory(App\User::class, 500)->create()->each(function ($u) {
            $prepa = rand(0, 1);
            $vl = '';
            if ($prepa = 0) {
                $vl = 'yes';
            } else {
                $vl = 'no';
            }
            $candidat = $u->Candidat()->create([
                'cin' => rand(10000000, 99999999),
                'city_id' => rand(1, 24),
                'last_name' => str_random(10),
                'first_name' => str_random(10),
                'birthday' => $this->randomDate('1950-11-15 15:15:25', '2000-11-15 15:15:25'),
                'place_of_birth' => str_random(10),
                'mobile_phone' => rand(10000000, 99999999),
                // 'email' => str_random(10) . '@gmail.com',
                //  'password' => 'required',
                'confirm_password' => 'required|same:password',
                'addresse' => 'required',
                // 'city_id' => 1,
                //  'Postal_code' => 'required',
                'diplome_id' => rand(1, 51),
                // 'level_studies' => 'required',
                'preparatory_study' => $vl,
                'Bachelor_degree' => rand(1, 20),
                'last_year_degree_without_pfe' => rand(1, 20),
                // 'date_of_obtaining_a_driving_license' => '2019-11-15 15:00:47',
                'date_of_obtaining_a_driving_license' => $this->randomDate('1950-11-15 15:15:25', '2000-11-15 15:15:25'),
                'poste_id' => rand(1, 25),
                'user_id' => $u->id,
                'poste' => str_random(10),
                'code_id' => rand(1, 10),
                'status' => '1'
            ]);
            $this->calculateFirstScore($candidat->id);
        });
    }

    function randomDate($sStartDate, $sEndDate, $sFormat = 'Y-m-d H:i:s')
    {
        // Convert the supplied date to timestamp
        $fMin = strtotime($sStartDate);
        $fMax = strtotime($sEndDate);
        // Generate a random number from the start and end dates
        $fVal = mt_rand($fMin, $fMax);
        // Convert back to the specified date format
        return date($sFormat, $fVal);
    }


    public
    function calculateFirstScore($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        $score = 0;
        if ($candidat) {
            if (in_array($candidat->post()->first()->reference, ['C01/2019', 'C02/1/2019', 'C02/2/2019', 'C03/2019', 'C04/1/2019', 'C04/2/2019', 'C04/3/2019'])) {
                if ($candidat->preparatory_study == 'yes') {
                    $score = ($candidat->Bachelor_degree * 1.5) + ($candidat->last_year_degree_without_pfe * 1.1);
                } else {
                    $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
                }
            } else if (in_array($candidat->post()->first()->reference, ['C05/1/2019', 'C05/2/2019', 'C06/1/2019', 'C06/2/2019', 'C06/3/2019', 'C06/4/2019', 'C06/5/2019', 'C06/6/2019', 'C06/7/2019', 'C06/8/2019', 'C08/2019'])) {
                $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
            } else if (in_array($candidat->post()->first()->reference, ['C07/2019'])) {

                if ($candidat->diplome_id == 39) {
                    $score = $candidat->last_year_degree_without_pfe;
                } else if ($candidat->diplome_id == 29) {
                    $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
                } else {
                    $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
                }

            } else if (in_array($candidat->post()->first()->reference, ['C09/2019'])) {
                //  if ($candidat->diplome->qualification == "technicien") {
                if ($candidat->diplome_id == 32) {
                    $score = ($candidat->Bachelor_degree * 1.5) + $candidat->last_year_degree_without_pfe;
                } else {
                    $score = $candidat->last_year_degree_without_pfe;
                }
                //  }
            } else if (in_array($candidat->post()->first()->reference, ['C10/2019'])) {
                $score = $candidat->last_year_degree_without_pfe;
            } else if (in_array($candidat->post()->first()->reference, ['C11/2019'])) {
                $age = DB::select("SELECT TIMESTAMPDIFF(DAY, birthday, CURDATE()) as age from candidats where id = " . $id);
                $premis = DB::select("SELECT TIMESTAMPDIFF(DAY, date_of_obtaining_a_driving_license, CURDATE()) as permis from candidats where id = " . $id);
                $score = (($age[0]->age / 365) * 0.67) + (($premis[0]->permis / 365) * 0.33);
            } else if (in_array($candidat->post()->first()->reference, ['C12/2019', 'C13/2019'])) {
                $sql = DB::select("SELECT TIMESTAMPDIFF(DAY, birthday, CURDATE()) as age from candidats where id = " . $id);
                if ($sql['0']->age / 365 > 25) {
                    $score = $sql['0']->age / 365;
                } else {
                    $score = null;
                }
            } else {
                return response()->json(['candidat' => 'found', 'score' => 'choose a post first']);
            }
            $candidat->score_1 = $score;
            $candidat->save();
            return response()->json(['candidat' => 'found', 'score' => round($score, '2')]);
        } else {
            return response()->json(['candidat' => 'not found', 'score' => '']);
        }
    }
}
