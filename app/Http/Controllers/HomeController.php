<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class HomeController extends Controller
{
    public function index()
    {
        $employee = Employee::inRandomOrder()->first(); // Récupère un employé aléatoire
        return view('home', compact('employee'));
    }
    public function getRandomEmployee()
    {
        $employee = Employee::inRandomOrder()->first();
        return response()->json($employee);
    }
}
