<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    DB::insert('insert into students(name, date_of_birth, gpa, advisor) values("Nurdaulet", "2002-03-12", 2.03, "Kurmangazy")');
});

Route::get('/insert2', function () {
    $student = new Student;

    $student->name='Olzhas';
    $student->date_of_birth='2002-07-15';
    $student->gpa=2.89;
    $student->advisor='Marzhan';

    $student->save();
});
//INSERT-ADD
Route::get('/insert3', function() {
    DB::insert('insert into students(name, date_of_birth, gpa, advisor) values(?, ?, ?, ?)', ['Nurdaulet', '2002-04-17', 3.09, 'Marzhan']);
});
//SELECT 
Route::get('/select', function() {
    $results=DB::select('select * from students where id = ?', [2]);
    foreach($results as $students)
{
    echo "Name is: ".$students->name;
    echo"<br>";
    echo "Date of birth: ".$students->date_of_birth;
    echo"<br>";
    echo "GPA: ".$students->gpa;
    echo"<br>";
    echo "Advisor: ".$students->advisor;
}
});
//UPDATING GPA
Route::get('/update', function() {
    $updated=DB::update('update students set gpa=3.72 where id=?', [4]);
    return $updated;
});
Route::get('/delete', function() {
    $deleted=DB::delete('delete from students where id=?', [4]);
    return $deleted;
});
//SELECT 
Route::get('/read', function() {
    $students=Student::all();
    foreach($students as $students) {
        echo $students->name;
        echo "<br>";
    }
});
//INSERT ADD
Route::get('/insert4', function() {
    $students= new Student;
    $students->name='Medet';
    $students->date_of_birth='2002-06-23';
    $students->gpa=3.21;
    $students->advisor='Kurmangazy';
    $students->save();
});
//UPDATING
Route::get('/update2', function() {
    $students=Student::find(2);
    $students->name='Olzhing';
    $students->date_of_birth='2005-01-12';
    $students->gpa=1.99;
    $students->advisor='Kurmangazy';
    $students->save();
});
//DELETING
Route::get('/destroy', function() {
    Student::destroy([5,6]);
});