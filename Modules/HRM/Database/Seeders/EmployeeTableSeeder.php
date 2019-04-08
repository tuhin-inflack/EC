<?php

namespace Modules\HRM\Database\Seeders;

use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\HRM\Repositories\EmployeeRepository;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        $employeeRepository = new EmployeeRepository();
        $userService = new UserService(new UserRepository());

//        $employeeData = [
//            [
//                "first_name" => "মহিউদ্দিন",
//                "last_name" => "জাহাঙ্গীর",
//                "employee_id" => "10001",
//                "department_id" => "1",
//                "designation_id" => "1",
//                "gender" => "male",
//                "status" => "present",
//                "email" => "employee1@bard.com",
//                "tel_office" => "01254487444",
//                "tel_home" => "01254487444",
//                "mobile_one" => "01254487444",
//                "mobile_two" => "01254487444",
//                "id" => null,
//                "photo" => "default-profile-picture.png",
//            ],
//            [
//                "first_name" => "হামিদুর",
//                "last_name" => "রহমান",
//                "employee_id" => "20001",
//                "department_id" => "2",
//                "designation_id" => "1",
//                "gender" => "male",
//                "status" => "present",
//                "email" => "employee2@bard.com",
//                "tel_office" => "01254487445",
//                "tel_home" => "01254487445",
//                "mobile_one" => "01254487445",
//                "mobile_two" => "01254487445",
//                "id" => null,
//                "photo" => "default-profile-picture.png",
//            ],
//            [
//                "first_name" => "মতিউর",
//                "last_name" => "আমিন",
//                "employee_id" => "30001",
//                "department_id" => "3",
//                "designation_id" => "1",
//                "gender" => "male",
//                "status" => "present",
//                "email" => "employee3@bard.com",
//                "tel_office" => "01254487446",
//                "tel_home" => "01254487446",
//                "mobile_one" => "01254487446",
//                "mobile_two" => "01254487446",
//                "id" => null,
//                "photo" => "default-profile-picture.png",
//            ]
//        ];
//
//        foreach ($employeeData as $data) {
//            $employeeRepository->save($data);
//            $userService->store([
//                'name' => $data['first_name'] . ' ' . $data['last_name'],
//                'username' => $data['employee_id'],
//                'email' => $data['email'],
//                'mobile' => $data['mobile_one'],
//                'user_type' => config('user.types.EMPLOYEE'),
//                'password' => config('user.defaultPassword')
//            ]);
//        }
    }
}
