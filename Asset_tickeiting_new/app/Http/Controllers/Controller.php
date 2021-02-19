<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use DB;
use Session;
use View;
use Mail;
use Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    
    public function segment_insert(Request $req)
    {
        
        $seg_name = $req->input('segment');
        
        $data = array(
            'seg_name'=>$seg_name,
        );
        DB::table('segment_info')->insert($data);
        return Redirect::to('segment_mgmt')->withMessage('Inserted succesfully');
    }
    
    public function company_insert(Request $req)
    {
        
        $c_name = $req->input('company');
        $priority = $req->input('priority');
        
        $data = array(
            'comp_name'=>$c_name,
            'priority'=>$priority,
        );
        DB::table('company_info')->insert($data);
        return Redirect::to('company_name_mgmt')->withMessage('Inserted succesfully');
    }
    
    public function reg_insert(Request $req)
    {
        
        $reg_name = $req->input('region');
        
        $data = array(
            'region_name'=>$reg_name,
        );
        DB::table('region_info')->insert($data);
        return Redirect::to('region_mgmt')->withMessage('Inserted succesfully');
    }
    
    public function loc_insert(Request $req)
    {
        
        $loc_name = $req->input('location');
        
        $data = array(
            'location_name'=>$loc_name,
        );
        DB::table('location_info')->insert($data);
        return Redirect::to('location_mgmt')->withMessage('Inserted succesfully');
    }
    
    public function issuecat_insert(Request $req)
    {
        
        $issuecat_name = $req->input('issuecategory');
        
        $data = array(
            'issuecat_name'=>$issuecat_name,
        );
        DB::table('issuecategory_info')->insert($data);
        return Redirect::to('issue_cat_mgmt')->withMessage('Inserted succesfully');
    }
    
    public function ticket_type_insert(Request $req)
    {
        
        $ticket_type = $req->input('ticketype');
        
        $data = array(
            'ticket_typename'=>$ticket_type,
        );
        DB::table('ticket_type_info')->insert($data);
        return Redirect::to('ticket_type_mgmt')->withMessage('Inserted succesfully');
    }
    
    public function comp_del($id)
    {
        
        DB::table('company_info')
        ->where('comp_id', '=', $id)
        ->delete();
        
        return Redirect::to('company_name_mgmt')->withMessage('Deleted succesfully');
    }
    
    public function seg_del($id)
    {
        
        DB::table('segment_info')
        ->where('seg_id', '=', $id)
        ->delete();
        
        return Redirect::to('segment_mgmt')->withMessage('Deleted succesfully');
    }
    
    public function reg_del($id)
    {
        
        DB::table('region_info')
        ->where('reg_id', '=', $id)
        ->delete();
        
        return Redirect::to('region_mgmt')->withMessage('Deleted succesfully');
    }
    
    public function loc_del($id)
    {
        
        DB::table('location_info')
        ->where('loc_id', '=', $id)
        ->delete();
        
        return Redirect::to('location_mgmt')->withMessage('Deleted succesfully');
    }
    
    public function iss_del($id)
    {
        
        DB::table('issuecategory_info')
        ->where('iss_id', '=', $id)
        ->delete();
        
        return Redirect::to('issue_cat_mgmt')->withMessage('Deleted succesfully');
    }
    
    public function ticty_del($id)
    {
        
        DB::table('ticket_type_info')
        ->where('tic_id', '=', $id)
        ->delete();
        
        return Redirect::to('ticket_type_mgmt')->withMessage('Deleted succesfully');
    }
    
    
    
    
    
    public function crate_tic_pub(Request $req)
    {
        $cname = $req->input('cname');
        $mobile = $req->input('mobile');
        $email = $req->input('email');
        $segment = $req->input('segment');
        $company_name = $req->input('company_name');
        $region = $req->input('region');
        $location = $req->input('location');
        $issue_cat = $req->input('issue_cat');
        $t_type = $req->input('t_type');
        
        $remarks = $req->input('remarks');
        
        $u_images=array();
        if($files=$req->file('userfile')){
            foreach($files as $file){
                $name1=$file->getClientOriginalName();
                $destinationPath = public_path('/tickets_attachment');
                $file->move($destinationPath,$name1);
                $u_images[]=$name1;
            }
        }
        else
        {
            //$name1='';
            $u_images[]='';
        }
        
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d h:i:s");
        
        include 'conn.php';
        $sql1 = "SELECT count(*) FROM tickets";
        $result1 = $conn->prepare($sql1);
        $result1->execute();
        $nr1 = $result1->fetchColumn();
        $nr2 = 1+$nr1;
        if($nr1 < 9)
        {
            $ticket_id = "000$nr2";
        }
        else
        {
            $ticket_id = "00$nr2";
        }
        
       // $created_by = Auth::user()->email;
        
        $data1 = array(
            'cname'=>$cname,
            'mobile'=>$mobile,
            'email'=>$email,
            'segment'=>$segment,
            'company_name'=>$company_name,
            'region'=>$region,
            'location'=>$location,
            'issue_cat'=>$issue_cat,
            't_type'=>$t_type,
            'remarks'=>$remarks,
            'path'=>implode("|",$u_images),
            'created_date'=>$date,
            'ticket_id'=>$ticket_id,
         //   'created_by'=>$created_by,
        );
        DB::table('tickets')->insert($data1);
        
        
        /* 
        $body2 = "Dear $cname, <br>";
        $body2 .= "<br>";
        $body2 .= "We have received your request, responsible team will get back you immediately.<br>";
        $body2 .= "Please find your Ticket details below.<br>";
        $body2 .= "<html><body><table border='1px' width='400px'>";
        $body2 .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
        $body2 .= "<tr><td><b>Created Date & Time</b></td><td>$date</td></tr>";
        $body2 .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
        $body2 .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
        $body2 .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
        $body2 .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
        $body2 .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
        $body2 .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
        $body2 .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
        $body2 .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
        $body2 .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
        $body2 .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
        $body2 .= "</table></body></html>";
        $body2 .= "<br>";
        $body2 .= "\r\nSincerely,\r\n";
        $body2 .= "*Please note: This is a system generated email and was sent from an address that cannot accept incoming e-mail.\r\n";
        Mail::raw($body2, function($message) use ($email, $body2)
        {
            $message->to($email)->subject('IT Ticket');
            $message->setBody($body2, 'text/html');
        });
        
        $email_admin = "raj@convergentwireless.com";
        $body3 = "Dear IT Admin, <br>";
        $body3 .= "<br>";
        $body3 .= "New IT Ticket, Please find the details below.<br>";
        $body3 .= "<html><body><table border='1px' width='400px'>";
        $body3 .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
        $body3 .= "<tr><td><b>Created Date & Time</b></td><td>$date</td></tr>";
        $body3 .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
        $body3 .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
        $body3 .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
        $body3 .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
        $body3 .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
        $body3 .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
        $body3 .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
        $body3 .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
        $body3 .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
        $body3 .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
        $body3 .= "</table></body></html>";
        $body3 .= "<br>";
        $body3 .= "\r\nSincerely,\r\n";
        $body3 .= "*Please note: This is a system generated email and was sent from an address that cannot accept incoming e-mail.\r\n";
        Mail::raw($body3, function($message) use ($email_admin, $body3)
        {
            $message->to($email_admin)->subject('IT Ticket');
            $message->setBody($body3, 'text/html');
        });
         */
        return Redirect::to('create_ticket_public')->withMessage("We have received your request, responsible team will get back you immediately, Plesae not your Ticket ID: $ticket_id ");
        
        
    }
    
    
    
    public function view_ticket(Request $req)
    {
        $ticket_id = $req->input('ticket_id');
        $mobile = $req->input('mobile');
        $email = $req->input('email');
        
        return view('ticket_result', compact('ticket_id','mobile','email'));
    }
    
    
    public function ticketreq($id)
    {
        return view('ticketreq_comp_view', compact('id'));
    }
    
     public function ticketreq_com($id)
    {
         //echo"$id";
        return view('ticketreq_view', compact('id'));
    } 
    
    public function ticket_fullview($id)
    {
        return view('ticket_full_detailview', compact('id'));
    }
    
    
    
    public function upd_ticket(Request $req)
    {
        $ticket_id = $req->input('ticket_id');
        
        $assign_to = $req->input('assign_to');
        $solution = $req->input('solution');
        $Close = $req->input('Close');
        $Update = $req->input('Update');
        
        //echo"$ticket_id,$assign_to,$solution,$Close.$Update";

        $u_images=array();
        if($files=$req->file('userfile')){
            foreach($files as $file){
                $name1=$file->getClientOriginalName();
                $destinationPath = public_path('/tickets_attachment');
                $file->move($destinationPath,$name1);
                $u_images[]=$name1;
            }
        }
        else
        {
            //$name1='';
            $u_images[]='';
        }
        
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d h:i:s");
        
        include 'conn.php';
        $query8="SELECT upath,solution,created_by FROM tickets where ticket_id='$ticket_id'";
        $stmt8= $conn->query($query8);
        while($row8 = $stmt8->fetch())
        {
            $upath = $row8['upath'];
            $solution_old = $row8['solution'];
            //$created_by = $row8['created_by'];
        }
        
        $upath_merge = "$upath|$name1";
        $solution_merge = "$solution_old|$solution";
        
        if($Update == 'Update')
        {
            $status = "open";
            $user_empid = Auth::user()->email;
            
        DB::table('tickets')
        ->where('ticket_id',$req->ticket_id)
        ->update([
            'solution' => $solution_merge,
            'status' => $status,
            'assign_to' => $assign_to,
            'upath' => $upath_merge,
            'update_date' => $date,
            'update_by' => $user_empid,
        ]);
        
        /*
         $body2 = "Dear $cname, <br>";
         $body2 .= "<br>";
         $body2 .= "We have received your request, responsible team will get back you immediately.<br>";
         $body2 .= "Please find your Ticket details below.<br>";
         $body2 .= "<html><body><table border='1px' width='400px'>";
         $body2 .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
         $body2 .= "<tr><td><b>Created Date & Time</b></td><td>$date</td></tr>";
         $body2 .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
         $body2 .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
         $body2 .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
         $body2 .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
         $body2 .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
         $body2 .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
         $body2 .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
         $body2 .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
         $body2 .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
         $body2 .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
         $body2 .= "</table></body></html>";
         $body2 .= "<br>";
         $body2 .= "\r\nSincerely,\r\n";
         $body2 .= "*Please note: This is a system generated email and was sent from an address that cannot accept incoming e-mail.\r\n";
         Mail::raw($body2, function($message) use ($email, $body2)
         {
         $message->to($email)->subject('IT Ticket');
         $message->setBody($body2, 'text/html');
         });
         
         $email_admin = "raj@convergentwireless.com";
         $body3 = "Dear IT Admin, <br>";
         $body3 .= "<br>";
         $body3 .= "New IT Ticket, Please find the details below.<br>";
         $body3 .= "<html><body><table border='1px' width='400px'>";
         $body3 .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
         $body3 .= "<tr><td><b>Created Date & Time</b></td><td>$date</td></tr>";
         $body3 .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
         $body3 .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
         $body3 .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
         $body3 .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
         $body3 .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
         $body3 .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
         $body3 .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
         $body3 .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
         $body3 .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
         $body3 .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
         $body3 .= "</table></body></html>";
         $body3 .= "<br>";
         $body3 .= "\r\nSincerely,\r\n";
         $body3 .= "*Please note: This is a system generated email and was sent from an address that cannot accept incoming e-mail.\r\n";
         Mail::raw($body3, function($message) use ($email_admin, $body3)
         {
         $message->to($email_admin)->subject('IT Ticket');
         $message->setBody($body3, 'text/html');
         });
         */
        
        
        }
        
        if($Close == 'Close')
        {
            $status = "close";
            $user_empid = Auth::user()->email;
            
            DB::table('tickets')
            ->where('ticket_id',$req->ticket_id)
            ->update([
                'solution' => $solution_merge,
                'status' => $status,
                'assign_to' => $assign_to,
                'upath' => $upath_merge,
                'closed_date' => $date,
                'closed_by' => $user_empid,
            ]);
            
            /*
             $body2 = "Dear $cname, <br>";
             $body2 .= "<br>";
             $body2 .= "We have received your request, responsible team will get back you immediately.<br>";
             $body2 .= "Please find your Ticket details below.<br>";
             $body2 .= "<html><body><table border='1px' width='400px'>";
             $body2 .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
             $body2 .= "<tr><td><b>Created Date & Time</b></td><td>$date</td></tr>";
             $body2 .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
             $body2 .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
             $body2 .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
             $body2 .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
             $body2 .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
             $body2 .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
             $body2 .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
             $body2 .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
             $body2 .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
             $body2 .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
             $body2 .= "</table></body></html>";
             $body2 .= "<br>";
             $body2 .= "\r\nSincerely,\r\n";
             $body2 .= "*Please note: This is a system generated email and was sent from an address that cannot accept incoming e-mail.\r\n";
             Mail::raw($body2, function($message) use ($email, $body2)
             {
             $message->to($email)->subject('IT Ticket');
             $message->setBody($body2, 'text/html');
             });
             
             $email_admin = "raj@convergentwireless.com";
             $body3 = "Dear IT Admin, <br>";
             $body3 .= "<br>";
             $body3 .= "New IT Ticket, Please find the details below.<br>";
             $body3 .= "<html><body><table border='1px' width='400px'>";
             $body3 .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
             $body3 .= "<tr><td><b>Created Date & Time</b></td><td>$date</td></tr>";
             $body3 .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
             $body3 .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
             $body3 .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
             $body3 .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
             $body3 .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
             $body3 .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
             $body3 .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
             $body3 .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
             $body3 .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
             $body3 .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
             $body3 .= "</table></body></html>";
             $body3 .= "<br>";
             $body3 .= "\r\nSincerely,\r\n";
             $body3 .= "*Please note: This is a system generated email and was sent from an address that cannot accept incoming e-mail.\r\n";
             Mail::raw($body3, function($message) use ($email_admin, $body3)
             {
             $message->to($email_admin)->subject('IT Ticket');
             $message->setBody($body3, 'text/html');
             });
             */
            
            
        }
        
        if($Update == 'Update')
        {
        return Redirect::to('home')->withMessage("Ticket Updated Successfully");
        }
        
        if($Close == 'Close')
        {
        return Redirect::to('home')->withMessage("Ticket Closed Successfully");
        }
        
        
    }
    
  
    
    
    public function ticket_full_view_colse_contr($id)
    {
        return view('ticket_full_view_colse', compact('id'));
    }
    
    
    
    

    public function reopen_ticket(Request $req)
    {
        $ticket_id = $req->input('ticket_id');
        
        $assign_to = $req->input('assign_to');
        $solution = $req->input('solution');
        
        //echo"$ticket_id,$assign_to,$solution,$Close.$Update";
        
        $u_images=array();
        if($files=$req->file('userfile')){
            foreach($files as $file){
                $name1=$file->getClientOriginalName();
                $destinationPath = public_path('/tickets_attachment');
                $file->move($destinationPath,$name1);
                $u_images[]=$name1;
            }
        }
        else
        {
            //$name1='';
            $u_images[]='';
        }
        
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d h:i:s");
        
        include 'conn.php';
        $query8="SELECT upath,solution,created_by FROM tickets where ticket_id='$ticket_id'";
        $stmt8= $conn->query($query8);
        while($row8 = $stmt8->fetch())
        {
            $upath = $row8['upath'];
            $solution_old = $row8['solution'];
            //$created_by = $row8['created_by'];
        }
        
        $upath_merge = "$upath|$name1";
        $solution_merge = "$solution_old|$solution";
        
        
            $status = "open";
            $user_empid = Auth::user()->email;
            
            DB::table('tickets')
            ->where('ticket_id',$req->ticket_id)
            ->update([
                'solution' => $solution_merge,
                'status' => $status,
                'assign_to' => $assign_to,
                'upath' => $upath_merge,
                'update_date' => $date,
                'update_by' => $user_empid,
            ]);
            
            /*
             $body2 = "Dear $cname, <br>";
             $body2 .= "<br>";
             $body2 .= "We have received your request, responsible team will get back you immediately.<br>";
             $body2 .= "Please find your Ticket details below.<br>";
             $body2 .= "<html><body><table border='1px' width='400px'>";
             $body2 .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
             $body2 .= "<tr><td><b>Created Date & Time</b></td><td>$date</td></tr>";
             $body2 .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
             $body2 .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
             $body2 .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
             $body2 .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
             $body2 .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
             $body2 .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
             $body2 .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
             $body2 .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
             $body2 .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
             $body2 .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
             $body2 .= "</table></body></html>";
             $body2 .= "<br>";
             $body2 .= "\r\nSincerely,\r\n";
             $body2 .= "*Please note: This is a system generated email and was sent from an address that cannot accept incoming e-mail.\r\n";
             Mail::raw($body2, function($message) use ($email, $body2)
             {
             $message->to($email)->subject('IT Ticket');
             $message->setBody($body2, 'text/html');
             });
             
             $email_admin = "raj@convergentwireless.com";
             $body3 = "Dear IT Admin, <br>";
             $body3 .= "<br>";
             $body3 .= "New IT Ticket, Please find the details below.<br>";
             $body3 .= "<html><body><table border='1px' width='400px'>";
             $body3 .= "<tr><td><b>Ticket ID</b></td><td>$ticket_id</td></tr>";
             $body3 .= "<tr><td><b>Created Date & Time</b></td><td>$date</td></tr>";
             $body3 .= "<tr><td><b>Name</b></td><td>$cname</td></tr>";
             $body3 .= "<tr><td><b>Mobile</b></td><td>$mobile</td></tr>";
             $body3 .= "<tr><td><b>Email</b></td><td>$email</td></tr>";
             $body3 .= "<tr><td><b>Segment</b></td><td>$segment</td></tr>";
             $body3 .= "<tr><td><b>Company Name</b></td><td>$company_name</td></tr>";
             $body3 .= "<tr><td><b>Region</b></td><td>$region</td></tr>";
             $body3 .= "<tr><td><b>Location</b></td><td>$location</td></tr>";
             $body3 .= "<tr><td><b>Issue Category</b></td><td>$issue_cat</td></tr>";
             $body3 .= "<tr><td><b>Ticket Type</b></td><td>$t_type</td></tr>";
             $body3 .= "<tr><td><b>Remarks</b></td><td>$remarks</td></tr>";
             $body3 .= "</table></body></html>";
             $body3 .= "<br>";
             $body3 .= "\r\nSincerely,\r\n";
             $body3 .= "*Please note: This is a system generated email and was sent from an address that cannot accept incoming e-mail.\r\n";
             Mail::raw($body3, function($message) use ($email_admin, $body3)
             {
             $message->to($email_admin)->subject('IT Ticket');
             $message->setBody($body3, 'text/html');
             });
             */
            return Redirect::to('home')->withMessage("Ticket Re-Opened Successfully");
            
        
    }
    
    
    
    public function user_insert(Request $req)
    {
        date_default_timezone_set ("Asia/Calcutta");
        
        $u_name = $req->input('name');
        $u_email = $req->input('email');
        $u_passwrd = $req->input('password');
        $u_confpasswrd = $req->input('password_confirmation');
        $u_dept = $req->input('department');
        $u_location = $req->input('location');
        $u_contact = $req->input('contactno');
        $u_seg = $req->input('segment');
        $date = date("Y-m-d h:i:s");
        
        $data = array(
            'name'=>$u_name,
            'email'=>$u_email,
            'created_at'=>$date,
            //  'password'=>$u_passwrd, created_at
            //  'confpwd'=>$u_confpasswrd,   'password' => Hash::make($data['password']),
            'password' => Hash::make($u_passwrd),
            'location'=>$u_location,
            'department'=>$u_dept,
            'contactno'=>$u_contact,
            'confpwd'=>$u_confpasswrd,
            'segment_name'=>$u_seg,
        );
        DB::table('users')->insert($data);
        return Redirect::to('user_mgmt')->withMessage('Inserted succesfully');
    }
    
    
    public function usr_del($id)
    {
        DB::table('users')
        ->where('id', '=', $id)
        ->delete();
        return Redirect::to('user_mgmt')->withMessage('Deleted successfully');
    }
    

    
    public function report_select(Request $req)
    {
        include 'conn.php';
        
        $from_date1 = $req->input('str_dt');
        $to_date1 = $req->input('end_dt');
        
        $from_date=$from_date1.' 00:00:00';
        $to_date=$to_date1.' 00:00:00';
        
        //    $from_date = $req->input('fromdate');
        //    $to_date = $req->input('todate');
        $emp_id = $req->input('comp_name');
        $name = $req->input('seg');
        /* $typeofleave = $req->input('typeofleave'); */
        header("Content-Type: application/vnd.ms-excel");
        header("Content-disposition: attachment; filename=ticket_data.xls");
        
        echo 'Ticket ID'."\t".'Created Date'."\t".'Name'."\t".'Email'."\t".'Mobile'."\t".'Company'."\t".'Segment'."\t".'Region'."\t".'Location'."\t".'Issue Category'."\t".'Ticket Type'."\t".'Remarks'."\t".'Status'."\t".'Closed Date'."\t".'Time Taken'."\t".'SLA'."\t".'Level'."\t".'Solution'."\t".'Assigned To'."\t".'Closed By'."\t".'Update Date'."\t".'Updated By'."\n";
        if($from_date != "" && $to_date != "" && $emp_id == "" && $name == "")
        {
            $query = "select * from tickets where created_date BETWEEN '$from_date' AND '$to_date'";
        }
        else if($from_date != "" && $to_date != "" && $emp_id != "" && $name == "")
        {
            $query = "select * from tickets where created_date BETWEEN '$from_date' AND '$to_date' AND company_name='$emp_id'";
        }
        else if($from_date != "" && $to_date != "" && $emp_id == "" && $name != "")
        {
            $query = "select * from tickets where created_date BETWEEN '$from_date' AND '$to_date' AND segment='$name'";
        }
        else if($from_date != "" && $to_date != "" && $emp_id != "" && $name != "")
        {
            $query = "select * from tickets where created_date BETWEEN '$from_date' AND '$to_date'  AND company_name='$emp_id' AND segment='$name'";
        }
        $stmt = $conn->query($query);
        while($row = $stmt->fetch())
        {
            
            $val1 = $row['ticket_id'];
            $val2=$row['created_date'];
            $val3=$row['cname'];
            $val4=$row['email'];
            $val5=$row['mobile'];
            $val6=$row['company_name'];
            $val7=$row['segment'];
            $val8=$row['region'];
            $val9=$row['location'];
            $val10=$row['issue_cat'];
            $val11=$row['t_type'];
            $val12=$row['remarks'];
            $val13=$row['status'];
            $val14=$row['closed_date'];
            $val15=$row['time_taken'];
            $val16=$row['sla'];
            $val17=$row['level'];
            $val18=$row['solution'];
            $val19=$row['assign_to'];
            $val20=$row['closed_by'];
            $val21=$row['update_date'];
            $val22=$row['update_by'];
            
            echo $val1."\t".$val2."\t".$val3."\t".$val4."\t".$val5."\t".$val6."\t".$val7."\t".$val8."\t".$val9."\t".$val10."\t".$val11."\t".$val12."\t".$val13."\t".$val14."\t".$val15."\t".$val16."\t".$val17."\t".$val18."\t".$val19."\t".$val20."\t".$val21."\t".$val22."\t"."\n";
            //      echo $name."\t".$uploaded_by."\t".$designation."\t".$dob."\t".$civil_code."\t".$home_town."\t".$Present_place_posting."\t".$date_present_statio."\t".$due_for_trans."\t".$req_for_trans."\t".$Station1."\t".$Station2."\t".$Station3."\t".$Station4."\t".$Station5."\t".$reason1."\t".$reason2."\t".$reason3."\t".$reason4."\t".$reason5."\t".$remarks_if_any."\t".$station_last."\t".$date_select."\n";
        }
        
    }
    
    
    public function asset_assing_upl(Request $req)
    {
        $type = $req->input('type1');
        $asset_tag = $req->input('asset_tag');
        $licence = $req->input('licence');
        $accessname = $req->input('accessname');
        $modelno = $req->input('modelno');
        $manufacturer = $req->input('manufacturer');
        $Consumable_name = $req->input('Consumable_name');
        $Consumable_modelno = $req->input('Consumable_modelno');
        $Component_name = $req->input('Component_name');
        $serialno = $req->input('serialno');
        $assign_to = $req->input('assign_to');
        $adate = $req->input('adate');
        $quantity = $req->input('quantity');
        $remarks = $req->input('remarks');
        
        $reqdate = date('Y-m-d');
        
        $data = array('type'=>$type,'asset_tag'=>$asset_tag,'licence'=>$licence,'accessory_name'=>$accessname,'model_no1'=>$modelno,'manufacturer'=>$manufacturer,'consumable_name'=>$Consumable_name,'model_no2'=>$Consumable_modelno,'component_name'=>$Component_name,'component_serial_no'=>$serialno,'assigned_to'=>$assign_to,'assigned_dt'=>$adate,'quantity'=>$quantity,'remarks'=>$remarks,'request_dt'=>$reqdate,'asset_retieved_dt'=>$reqdate);
        //$data = array('managermail'=>$memail, 'coordinatormail'=>$cemail, 'costcenter'=>$center, 'dates'=>$sdate, 'vname'=>$vname, 'fcurrency'=>$fcurrency, 'amtfcurrency'=>$amtfcurrency);
        DB::table('asset_assign')->insert($data);
        
        //return view('insertForm')->with('message', 'Login Failed');
        return Redirect::to('Asset_assign')->withMessage('Uploaded successfully');
        //echo"create controller";
    }
    
    
    public function invoice_upload(Request $req)
    {
        $atag = $req->input('atag');
        $model = $req->input('model');
        $status = $req->input('status');
        $serial = $req->input('serial');
        $assetname = $req->input('assetname');
        $purchase_date = $req->input('purchase_date');
        $supplier = $req->input('supplier');
        $order_number = $req->input('order_number');
        $purchase_cost = $req->input('purchase_cost');
        $warrenty = $req->input('warrenty');
        $notes = $req->input('notes');
        $dlocation = $req->input('dlocation');
        $requesttable = $req->input('requesttable');
        
        
        //$imageName = time().'.'.$req->userfile->getClientOriginalExtension();
        //$req->input_img->move(public_path('fotoupload'), $imageName);
        
        if ($req->hasFile('userfile')) {
            $image = $req->file('userfile');
            //$name = time().'.'.$image->getClientOriginalExtension();
            $name = $req->userfile->getClientOriginalName();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
        }
        else
        {
            $name='';
        }
        
        //$ = $req->input('');
        
        //$products_all = implode(',', $req->input('products'));
        $status = "pending";
        $createddate = date('Y-m-d');
        
        $data = array('Asset_Tag'=>$atag,'Model'=>$model,'Status'=>$status,'serial'=>$serial,'Asset_name'=>$assetname,'Purchase_dt'=>$purchase_date,'Supplier'=>$supplier,'Order_no'=>$order_number,'Purchase_cost'=>$purchase_cost,'Warranty'=>$warrenty,'Remarks'=>$notes,'Location'=>$dlocation,'Requestable'=>$requesttable,'Asset_Image_link'=>$name,);
        //$data = array('managermail'=>$memail, 'coordinatormail'=>$cemail, 'costcenter'=>$center, 'dates'=>$sdate, 'vname'=>$vname, 'fcurrency'=>$fcurrency, 'amtfcurrency'=>$amtfcurrency);
        DB::table('assets')->insert($data);
        
        //return view('insertForm')->with('message', 'Login Failed');
        return Redirect::to('Asset')->withMessage('Uploaded successfully');
        //echo"create controller";
    }
    
    
    
    
    public function component_upload(Request $req)
    {
        $cname = $req->input('cname');
        $category = $req->input('category');
        $quantity = $req->input('quantity');
        $minquantity = $req->input('minquantity');
        $serial = $req->input('serial');
        $company = $req->input('company');
        $location = $req->input('location');
        $ordernumber = $req->input('ordernumber');
        $pdate = $req->input('pdate');
        $pcost = $req->input('pcost');
        
        
        //$imageName = time().'.'.$req->userfile->getClientOriginalExtension();
        //$req->input_img->move(public_path('fotoupload'), $imageName);
        
        if ($req->hasFile('userfile')) {
            $image = $req->file('userfile');
            //$name = time().'.'.$image->getClientOriginalExtension();
            $name = $req->userfile->getClientOriginalName();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
        }
        else
        {
            $name='';
        }
        
        //$ = $req->input('');
        
        //$products_all = implode(',', $req->input('products'));
        $status = "pending";
        $createddate = date('Y-m-d');
        
        $data = array('Component_name'=>$cname,'Component_category'=>$category,'Component_Quantity'=>$quantity,'Component_min_Quantity'=>$minquantity,'Component_serial'=>$serial,'Company'=>$company,'Component_location'=>$location,'Component_order_no'=>$ordernumber,'Component_purchase_dt'=>$pdate,'Component_purchase_cost'=>$pcost,'Component_image_link'=>$name);
        //$data = array('managermail'=>$memail, 'coordinatormail'=>$cemail, 'costcenter'=>$center, 'dates'=>$sdate, 'vname'=>$vname, 'fcurrency'=>$fcurrency, 'amtfcurrency'=>$amtfcurrency);
        DB::table('component')->insert($data);
        
        //return view('insertForm')->with('message', 'Login Failed');
        return Redirect::to('Component_Create')->withMessage('Uploaded successfully');
        //echo"create controller";
    }
    
    
    
    
    
    public function accesory_upload(Request $req)
    {
        $company = $req->input('company');
        $aname = $req->input('aname');
        $category = $req->input('category');
        $Supplier = $req->input('Supplier');
        $Manufacturer = $req->input('Manufacturer');
        $location = $req->input('location');
        $modelno = $req->input('modelno');
        $ordernumber = $req->input('ordernumber');
        $pdate = $req->input('pdate');
        $quantity = $req->input('quantity');
        $minquantity = $req->input('minquantity');
        
        
        
        //$imageName = time().'.'.$req->userfile->getClientOriginalExtension();
        //$req->input_img->move(public_path('fotoupload'), $imageName);
        
        if ($req->hasFile('userfile')) {
            $image = $req->file('userfile');
            //$name = time().'.'.$image->getClientOriginalExtension();
            $name = $req->userfile->getClientOriginalName();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
        }
        else
        {
            $name='';
        }
        
        //$ = $req->input('');
        
        //$products_all = implode(',', $req->input('products'));
        $status = "pending";
        $createddate = date('Y-m-d');
        
        $data = array('Accessary_company'=>$company,'Accessary_name'=>$aname,'Accessory_Category'=>$category,'Accessory_Supplier'=>$Supplier,'Accessory_Manufacturer'=>$Manufacturer,'Accessory_Location'=>$location,'Accessory_Model_no'=>$modelno,'Accessory_Order_no'=>$ordernumber,'Accessory_Purchase_dt'=>$pdate,'Accessory_Quantity'=>$quantity,'Accessory_min_Quantity'=>$minquantity,'Acc_Image_link'=>$name);
        //$data = array('managermail'=>$memail, 'coordinatormail'=>$cemail, 'costcenter'=>$center, 'dates'=>$sdate, 'vname'=>$vname, 'fcurrency'=>$fcurrency, 'amtfcurrency'=>$amtfcurrency);
        DB::table('accessories')->insert($data);
        
        //return view('insertForm')->with('message', 'Login Failed');
        return Redirect::to('Create_Accessory')->withMessage('Uploaded successfully');
        //echo"create controller";
    }
    
    public function consume_upload(Request $req)
    {
        $company = $req->input('company');
        $cons_name = $req->input('cons_name');
        $category = $req->input('category');
        $Manufacturer = $req->input('Manufacturer');
        $location = $req->input('location');
        $modelnumber = $req->input('modelnumber');
        $itemnumber = $req->input('itemnumber');
        $ordernumber = $req->input('ordernumber');
        $pdate = $req->input('pdate');
        $pcost = $req->input('pcost');
        $quantity = $req->input('quantity');
        $minquantity = $req->input('minquantity');
        
        
        
        //$imageName = time().'.'.$req->userfile->getClientOriginalExtension();
        //$req->input_img->move(public_path('fotoupload'), $imageName);
        
        if ($req->hasFile('userfile')) {
            $image = $req->file('userfile');
            //$name = time().'.'.$image->getClientOriginalExtension();
            $name = $req->userfile->getClientOriginalName();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
        }
        else
        {
            $name='';
        }
        
        //$ = $req->input('');
        
        //$products_all = implode(',', $req->input('products'));
        $status = "pending";
        $createddate = date('Y-m-d');
        
        $data = array('company'=>$company,'Consumable_name'=>$cons_name,'consumable_category'=>$category,'consumable_Manufacturer'=>$Manufacturer,'Consumable_Location'=>$location,'Consumable_Model_No'=>$modelnumber,'Consumable_item_no'=>$itemnumber,'Consumable_order_no'=>$ordernumber,'Consumable_Purchase_dt'=>$pdate,'Consumable_Purchase_cost'=>$pcost,'Consumable_Quantity'=>$quantity,'minquantity'=>$minquantity,'Consumable_image_link'=>$name);
        //$data = array('managermail'=>$memail, 'coordinatormail'=>$cemail, 'costcenter'=>$center, 'dates'=>$sdate, 'vname'=>$vname, 'fcurrency'=>$fcurrency, 'amtfcurrency'=>$amtfcurrency);
        DB::table('consumable')->insert($data);
        
        //return view('insertForm')->with('message', 'Login Failed');
        return Redirect::to('Create_Consumable')->withMessage('Uploaded successfully');
        //echo"create controller";
    }
    
    
    
    public function licence_upload(Request $req)
    {
        $software_name = $req->input('software_name');
        $cname = $req->input('cname');
        $productkey = $req->input('productkey');
        $seats = $req->input('seats');
        $company = $req->input('company');
        $manufacturer = $req->input('manufacturer');
        $lemail = $req->input('lemail');
        $reassi = $req->input('reassi');
        $suplier = $req->input('supplier');
        $ordernumber = $req->input('ordernumber');
        $pcost = $req->input('pcost');
        $pdate = $req->input('pdate');
        $edate = $req->input('edate');
        $tdate = $req->input('tdate');
        $pordernumber = $req->input('pordernumber');
        $deprication = $req->input('deprication');
        
        
        
        
        $data = array('Software_name'=>$software_name,'Category_name'=>$cname,'Product_key'=>$productkey,'seats'=>$seats,'company'=>$company,'Manufacturer'=>$manufacturer,'License_email'=>$lemail,'Reassignable'=>$reassi,'Supplier'=>$suplier,'Order_no'=>$ordernumber,'Purchase_cost'=>$pcost,'Purchase_dt'=>$pdate,'Expiration_dt'=>$edate,'Termination_dt'=>$tdate,'Purchase_order_no'=>$pordernumber,'Depreciation'=>$deprication);
        //$data = array('managermail'=>$memail, 'coordinatormail'=>$cemail, 'costcenter'=>$center, 'dates'=>$sdate, 'vname'=>$vname, 'fcurrency'=>$fcurrency, 'amtfcurrency'=>$amtfcurrency);
        DB::table('licences')->insert($data);
        
        //return view('insertForm')->with('message', 'Login Failed');
        return Redirect::to('Create_License')->withMessage('Uploaded successfully');
        //echo"create controller";
    }
    
    function compget() {
        
        $cat['cat'] = DB::table('categories')->get();
        $comp['comp'] = DB::table('manufacturer')->get();
        $defaultloc['defaultloc'] = DB::table('users')->get();
        return view('Component_Create', $cat, $comp, $defaultloc);
        //return view('Asset', $supp, $defaultloc);
    }
    
    
    function acessget() {
        
        $cat['cat'] = DB::table('categories')->get();
        $sup['sup'] = DB::table('supplier')->get();
        $man['man'] = DB::table('manufacturer')->get();
        $defaultloc['defaultloc'] = DB::table('users')->get();
        return view('Create_Accessory', $cat, $sup, $man, $defaultloc);
        //return view('Asset', $supp, $defaultloc);
    }
    
    
    function consuget() {
        
        $cat['cat'] = DB::table('categories')->get();
        
        $man['man'] = DB::table('manufacturer')->get();
        $defaultloc['defaultloc'] = DB::table('users')->get();
        return view('Create_Consumable', $cat, $man, $defaultloc);
        //return view('Asset', $supp, $defaultloc);
    }
    
    
    function licenget() {
        
        $cat['cat'] = DB::table('categories')->get();
        
        $man['man'] = DB::table('manufacturer')->get();
        $defaultloc['defaultloc'] = DB::table('users')->get();
        return view('Create_License', $cat, $man, $defaultloc);
        //return view('Asset', $supp, $defaultloc);
    }
    
    function get_asset() {
        
        
        $asset['asset'] = DB::table('asset_assign')->get();
        return view('Admin-Dashboard', $asset);
        //return view('Asset', $supp, $defaultloc);
    } 
    
    
    function ad_pending() {
        
        /* $model['model'] = DB::table('models')->get();
         $status['status'] = DB::table('status')->get();
         $supp22['supp'] = DB::table('supplier')->get();
         $defaultloc['defaultloc'] = DB::table('users')->get();
         return view('Asset', $model, $status, $supp22, $defaultloc); */
        
        
        $model = DB::table('models')->get();
        $status = DB::table('status')->get();
        $supor = DB::table('supplier')->get();
        $dloccc = DB::table('users')->get();
        
        return view('Asset', compact(['model', 'status', 'supor', 'dloccc']));
        //return view('Asset', $model, $status, $supp22, $defaultloc);
        
        
    }
    
    
    
    public function view_asset_assign_f($id)
    {
        
        return view('Asset_assign_full_view', compact('id'));
    }
    
    /* public function asset_del_view_v($id)
    {
           return view('Asset_assign_full_view', compact('id'));
    }
     */
    public function asset_update($id)
    {
        //echo"this is working $id";
        $udate['udate'] = DB::table('asset_assign')->where('assign_id', '=', $id)->get();
        return view('Asset_assign_update', $udate);
    } 
    
    
    public function asset_assign_modify(Request $req)
    {
        //echo"hello";
        // $statsu = "completed";
        
        DB::table('asset_assign')
        ->where('assign_id',$req->id)
        ->update([
            'type' => $req->type1,
            'asset_tag' => $req->asset_tag,
            'licence' => $req->licence,
            'accessory_name' => $req->accessname,
            'model_no1' => $req->modelno,
            'manufacturer' => $req->manufacturer,
            'consumable_name' => $req->Consumable_name,
            'model_no2' => $req->Consumable_modelno,
            'component_name' => $req->Component_name,
            'component_serial_no' => $req->serialno,
            'assigned_to' => $req->assign_to,
            'assigned_dt' => $req->adate,
            'quantity' => $req->quantity,
            'remarks' => $req->remarks,
            
        ]);
        
        
        return Redirect::to('home')->withMessage('Updated succesfully');
        //return redirect()->back();
        
    }
    
    
	    //function ad_pending()
function query_builder_par() 
		{
        $model = DB::table('models')->get();
        $status = DB::table('status')->get();
        //$supor = DB::table('supplier')->get();
        $dloccc = DB::table('users')->get();
        
        return view('query_builder', compact(['model', 'status', 'dloccc']));
        //return view('Asset', $model, $status, $supp22, $defaultloc);
    }
	
    public function query_builder_submit_back(Request $req)
{
    $fdate = $req->input('fdate');
	$todate = $req->input('todate');
	$model = $req->input('model');
	$serialno = $req->input('serialno');
	$order_number = $req->input('order_number');
	$dlocation = $req->input('dlocation');
	$assetname = $req->input('assetname');
	$status = $req->input('status');
	
	$results = DB::table('assets')->where(function($query) use ($fdate, $todate, $model, $serialno, $order_number, $dlocation, $assetname, $status) {
        if ( ! empty($fdate)) {
            $query->whereBetween('created_date', [$fdate, $todate]);
        }
        if ( ! empty($model)) {
            $query->where('Model', '=', $model);
        }
        if ( ! empty($serialno)) {
            $query->where('serial', '=', $serialno);
        }
        if ( ! empty($order_number)) {
            $query->where('Order_no', '=', $order_number);
        }
        if ( ! empty($dlocation)) {
            $query->where('Location', '=', $dlocation);
        }
        if ( ! empty($assetname)) {
            $query->where('Asset_name', '=', $assetname);
        }
		if ( ! empty($status)) {
            $query->where('Status', '=', $status);
        }
    })->get();
    
    return view('query_builder_report_view', compact(['results']));
	
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
