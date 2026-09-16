<?php

namespace App\Controllers;

class Student extends BaseController
{
    private string $apiURL;

    public function __construct()
    {
        $config = config('Python');

        $this->apiURL = $config->apiURL;
    }

    // Show students
    public function index()
    {
        $client = \Config\Services::curlrequest();

        $response = $client->get(
            $this->apiURL . '/students/'
        );

        $students = json_decode(
            $response->getBody(),
            true
        );

        return view('students', [
            'students' => $students
        ]);
    }


    // Add student
    public function create()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $course = $this->request->getPost('course');

        $client = \Config\Services::curlrequest();

        $client->post(
            $this->apiURL . '/students/',
            [
                'json' => [
                    'name' => $name,
                    'email' => $email,
                    'course' => $course
                ]
            ]
        );

        return redirect()->to('/students');
    }
}