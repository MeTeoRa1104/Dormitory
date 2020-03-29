<?php

namespace App\Http\Controllers;

use App\Room;
use App\Student;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
 use DateTime;
 use DateTimeZone;
 use Auth;
 use Validator;

class RoomController extends Controller
{
   public function index(){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="admin"){
                $result = Room::select('*')
                    ->get();
                return view('welcome', ['result' => $result]);
            }
            else{
                return view('noPermission');
            }
        }
    }


    public function searchroom(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="admin"){
            $dormitory=$_POST['dormitory_for_search'];
            $floor=$_POST['floor_for_search'];
            $free=$_POST['free_for_search'];
            if($dormitory!="Все" && $floor!="Все" && $free!="Все"){
                $result = Room::select('*')
                    ->whereRaw("room_dormitory='$dormitory' and room_floor='$floor' and room_free_place='$free'")
                    ->get();
            }
        elseif($dormitory=="Все" && $floor=="Все" && $free=="Все"){
            $result = Room::select('*')
                ->get();
        }
        elseif($dormitory!="Все" && $floor=="Все" && $free=="Все"){
            $result = Room::select('*')
                ->where('room_dormitory','=',$dormitory)
                ->get();
        }
        elseif($dormitory!="Все" && $floor!="Все" && $free=="Все"){
            $result = Room::select('*')
                ->whereRaw("room_dormitory='$dormitory' and room_floor='$floor'")
                ->get();
        }
        elseif($dormitory!="Все" && $floor=="Все" && $free!="Все"){
            $result = Room::select('*')
                ->whereRaw("room_dormitory='$dormitory' and room_free_place='$free'")
                ->get();
        }
        elseif($dormitory=="Все" && $floor!="Все"){
            return("Ошибка входных данных");
        }
        if(count($result)>0){
            foreach($result as $res){
                echo "<tr>";
                    echo "<td>
                            <form action='aboutroom' method='POST'>".csrf_field()."<input type='submit' value='перейти'><label id='first_name' class='lab'>{$res->student_first_name}</label>
                            <input name='dormitory' id='dormitory' type='hidden' value='$res->room_dormitory'>
                            <input name='room' id='room' type='hidden' value='$res->room_number'>
                            <label class='lab'>{$res->room_number}</label>
                            </form>
                           </td>";
                    echo "<td><label class='lab'>{$res->room_square}</label></td>";
                    echo "<td><label class='lab'>{$res->room_emount_people}</label></td>";
                    echo "<td><label class='lab'>{$res->room_floor}</label></td>";
                    echo "<td><label class='lab'>{$res->room_dormitory}</label></td>";
                    echo "<td><label class='lab'>{$res->room_living_people}</label></td>";
                    echo "<td><label class='lab'>{$res->room_free_place}</label></td>";
                echo "</tr>";
            }
        }
        else{
            echo "Комнат по указанным требования не было найдено";
        }
    }
    else{
        return view('noPermission');
    }
    }
    }


    public function aboutroom(Request $request){
        if(auth()->guest()){
            return view('noPermission');
        }
        else{
            if (Auth::user()->type=="admin"){
                $dormitory=$request['dormitory'];
                $room=$request['room'];
                $result = Room::select('*')
                    ->whereraw("room_dormitory = '$dormitory' and room_number =
                    '$room'")
                    ->get();
                $livers=Student::select('*')
                    ->whereraw("student_dormitory ='$dormitory' and student_room ='$room' ")
                    ->get();
                return view('aboutroom', ['result' => $result],['livers' => $livers]);
            }
            else{
                return view('noPermission');
            }
        }
    }
}
