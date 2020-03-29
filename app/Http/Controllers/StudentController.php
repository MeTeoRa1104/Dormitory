<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use DateTime;
use DateTimeZone;
use Auth;
use Validator;
use App\User;

class StudentController extends Controller
{

    public function index(){
    	if(auth()->guest()){
        	return view('noPermission');
    	}
    	else{
   			if (Auth::user()->type=="admin"){
        		$result = Student::select('*')
            	->get();
        	   return view('students', ['result' => $result]);
    		}
    		else{
        		return view('noPermission');
    		}
		}
    }


    public function searchstudent(Request $request)
    {
        if (auth()->guest()) {
            return view('noPermission');
        } else {
            if (Auth::user()->type == "admin") {
                $first_name = $_POST['first_name'];
                $result = Student::select('*')
                    ->whereraw("student_first_name like '$first_name%'")
                    ->get();
                if (count($result) > 0) {
                    foreach ($result as $res) {
                        echo "<tr >";
                        echo "<td><form action='aboutstudent' method='POST'>" . csrf_field() . "<input type='submit' value='перейти'><label id='first_name' class='lab'>{$res->student_first_name}</label>
                            <input name='idob' id='idob' type='hidden' value=$res->student_id>
                        </form></td>";
                        echo "<td><label class='lab'>{$res->student_second_name}</label></td>";
                        echo "<td><label class='lab'>{$res->student_last_name}</label></td>";
                        echo "<td><label class='lab'>{$res->student_phone}</label></td>";
                        echo "<td><label class='lab'>{$res->student_study_place}</label></td>";
                        echo "<td><label class='lab'>{$res->student_dormitory}</label></td>";
                        echo "<td><label class='lab'>{$res->student_room}</label></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Студентов по указанным требования не было найдено";
                }
            } else {
                return view('noPermission');
            }
        }
    }


    public function aboutstudent(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="admin" or Auth::user()->type=="Facultys"){
                $id=$request['idob'];
                $result = Student::select('*')
                    ->where('student_id','=',$id)
                    ->get();
                return view('aboutstudent', ['result' => $result]);
            }
            else{
                return view('noPermission');
            }
        }
    }


    public function studentsByFaculties(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="Facultys"){
                $email=Auth::user()->email;
                $faculty = DB::select("SELECT name from Facultys where Facultys.email='$email'");
                foreach ($faculty as $key) {
                    $result = Student::select('*')
                        ->where('student_faculty','=',$key->name)
                        ->get();
                }
                return view('studentsByFaculties', ['result' => $result]);
            }
            else{
                return view('noPermission');
            }
        }
    }


    public function studentrequests(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else {
            if (Auth::user()->type == "Facultys") {
                $email = Auth::user()->email;
                $faculty = DB::select("SELECT name from Facultys where Facultys.email='$email'");
                foreach ($faculty as $key) {
                    $result = Student::select('*')
                        ->where('student_faculty', '=', $key->name)
                        ->where('student_status', '=', 'Ожидание')
                        ->get();
                }
                return view('request', ['result' => $result]);
            } else {
                return view('noPermission');
            }
        }
    }


    public function declaimstudent(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="Facultys"){
                $id=$request['idob'];
                DB::table('Students')
                    ->where('student_id', $id)
                    ->update(['student_status' => 'Отказано']);
                return view('main');
            }
            else{
                return view('noPermission');
            }
        }
    }



    public function acceptStudent(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="Facultys"){
                $id=$request['idob'];
                $now=new DateTime("now",new DateTimeZone('+0600'));
                $now1=new DateTime("now",new DateTimeZone('+0600'));
                $year=$now1->format("Y");
                $dEnd=new DateTime("now",new DateTimeZone('+0600'));
                $dEnd->setDate($year,07,1);
                $dDiff=$dEnd->diff($now);
                DB::table('Students')
                    ->where('student_id', $id)
                    ->update(['student_status' => 'Подтверждено','student_debt'=>($dDiff->format("%m")*700)*-1]);

                return view('main');
            }
            else{
                return view('noPermission');
            }
        }
    }

    public function domakeinvoices(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="Students"){
                $id=Auth::user()->id;
                $now=new DateTime("now",new DateTimeZone('+0600'));
                $datetek = $now->format('Y-m-d-H-i-s');
                if(!empty($request->file('image'))){
                $myfile = $request->file('image');
                $myfile_type = $myfile->clientExtension();
                $myfile_name = $id.'.'.$datetek.'.'.$myfile_type;
                $myfile->move(public_path() . '/img/Invoices/',$myfile_name);
                }
                else{
                    $myfile_name="NULL";
                }
                DB::table('Invoices')->insert([
                    'invoice_photo'=>$myfile_name,'invoice_student'=>$id, 'invoice_date'=>$now
                ]);
               return redirect('/');
            }
            else{
                return view('noPermission');
            }
        }
    }


    public function aboutuser(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="Students"){
                $email=Auth::user()->email;
                $result = Student::select('*')
                    ->where('student_email','=',$email)
                    ->get();
                return view('aboutuser', ['result' => $result]);
            }
            else{
                return view('noPermission');
            }
        }
    }


    public function makestudentrequest(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="Students"){
                $email=Auth::user()->email;
                $requesttext=$request['requesttext'];
                $result = Student::select('*')
                    ->where('student_email','=',$email)
                    ->get();
                foreach ($result as $res) {
                    $id=$res->student_id;
                }
                DB::table("Requests")->insert([
                    ['student_id' => $id, 'request_text'=>$requesttext]
                ]);
                return view('aboutuser', ['result' => $result]);
            }
            else{
                return view('noPermission');
            }
        }
    }

    public function viewinvoices(){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="Managers"){

                $result = DB::Select("SELECT * from Invoices");
                return view('invoices', ['result' => $result]);
            }
            else{
                return view('noPermission');
            }
        }
    }

}
