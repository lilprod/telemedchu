<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Department;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function patient()
    {
        $departments = Department::all();

        return view('stats.patient',compact('departments'));
    }

    public function doctor()
    {
        $departments = Department::all();

        return view('stats.doctor',compact('departments'));
    }

    public function getSearch()
    {
        return view('stats.index');
    }

    public function search_patient(Request $request){
        // check if ajax request is coming or not
    if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('patients')
                ->where('department_id', '=', $query)
                ->get();
         
      }
      /* else
      {
       $data = DB::table('clients')
         ->orderBy('id', 'desc')
         ->limit(10)
         ->get();  

         $data = [];

        
      } */ 
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->firstname.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->phone_number.'</td>
         <td>'.$row->address.'</td>
         <td><a href="'.route('doctors.show', $row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Fiche patiente</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Pas de patient trouvé</td>
        <td><a href="'.route('patients.create').'" class="btn btn-primary btn-xs"><i class="fa fa-smile-o"></i> Nouveau patient </a></td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    
    }

    public function search_doctor(Request $request){
        // check if ajax request is coming or not
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('doctors')
                ->where('department_id', '=', $query)
                ->get();
      }
      /* else
      {
       $data = DB::table('clients')
         ->orderBy('id', 'desc')
         ->limit(10)
         ->get();  

         $data = [];

        
      } */ 
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->firstname.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->phone_number.'</td>
         <td>'.$row->address.'</td>
         <td><a href="'.route('doctors.show', $row->id).'" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Voir Docteur</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Docteur non trouvé</td>
        <td><a href="'.route('doctors.create').'" class="btn btn-success btn-xs"><i class="fa fa-smile-o"></i> Nouveau médecin </a></td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function postSearch(Request $request)
    {
        $this->validate($request, [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ]);

        $date_debut = $request->input('date_debut');
        $date_fin = $request->input('date_fin');
        $date = Carbon::now()->toDateString();
        $total=0;

        if (($date_debut != '') && ($date_fin != '')) {
            $deposits = Deposit::select('deposits.*')
                                    ->whereBetween('created_at', [$date_debut, $date_fin])
                                    ->get();
            
            foreach($deposits as $deposit){
                $total += $deposit->deposit_amount;
            }

                return view('stats.index', compact('deposits', 'total'));
        }
    }

    public function consultation()
    {
        return view('stats.consultation');
    }

    public function examination()
    {
        return view('stats.examination');
    }

    public function fetch_consultation(Request $request)
    {
        /* $this->validate($request, [
            'customer_id' => 'required',
            'from_date' => 'required',
            'date_fin' => 'required',
        ]); */

        if($request->ajax())
        {
            if($request->from_date != '' && $request->to_date != '')
            {
                $data = DB::table('consultations')
                            ->whereBetween('created_at', array($request->from_date, $request->to_date))
                            ->get();
            }
            else
            {
                $data = DB::table('consultations')->orderBy('created_at', 'desc')->get();
            }
            echo json_encode($data);
        }
    }

    public function fetch_examination(Request $request)
    {
        /* $this->validate($request, [
            'customer_id' => 'required',
            'from_date' => 'required',
            'date_fin' => 'required',
        ]); */

        if($request->ajax())
        {
            if($request->from_date != '' && $request->to_date != '')
            {
                $data = DB::table('examinations')
                            ->whereBetween('created_at', array($request->from_date, $request->to_date))
                            ->get();
            }
            else
            {
                $data = DB::table('examinations')->orderBy('created_at', 'desc')->get();
            }
            echo json_encode($data);
        }
    }
    
}
