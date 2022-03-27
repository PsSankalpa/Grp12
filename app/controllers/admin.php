<?php
class admin extends Controller
{
    function index($adminid=null)
    {
        if(!Auth::logged_in_admin())  
        {
          $this->redirect('login/login');
        }
        else
        {   
            $admin = new admin();

          // $data2=$admin->where('adminid',$adminid);
       
        //$data = $common_user->findAll();
        //$db=new Database();

        //$data= $db->query("select * from common_user");
       //$this->load_model('common_user');
        //$data=$common_user->findAll();

       // $data=$common_user->where('fname','cham');
    
        //$common_user->insert($data);
        //$common_user->update(id,$data);
        //$common_user->delete(id);

        //$this->view("admin/admin");//,['rows'=>$data]); //in here put the relevent page name and the path
        $common_user = new common_user();
        //userid=null
        //$userid=1;
        $data=$common_user->findAll();//where('userid',$userid);

        $appointments= new appointments();
        
        $data1=$appointments->findAll();

        $products = new products();
        $data2=$products->findAll();

        
        
        $this->view("admin/admin",[
            'rows'=>$data,
            'rows1'=>$data1,
            'rows2'=>$data2,
        ]);
        
        }
        

        //$Auth = new Auth;
        //$userid=Auth::userid();

        //$data = $Auth->finduser();
        //$Auth = new Auth;
          //  $data = $Auth->findRank();
            
            
       // $this->view("admin/admin",['data'=>$data]);


        
    }

    function channeling(){

        $appointments= new appointments();
        
        $data=$appointments->findAll();

        $this->view("admin/adminChanneling",[
            'row'=>$data,
        ]);


    }

    function payments(){

        $admin = new admin();
        $this->view("admin/adminpayments",[
        ]);


    }

    function adminPayment(){

        if(!Auth::logged_in_admin())  
        {
          $this->redirect('login/login');
        }
        else
        {

        $adminid=Auth::userid();

        if(count($_POST) > 0){

        $arr['type'] = $_POST['type'];
        $arr['amount'] = $_POST['amount'];
        $arr['date'] = date("Y-m-d H:i:s");

        $adminpayment = new adminPayment();
        $adminpayment->insert($arr); 
        $this->redirect('admin/payments');
 
        }

        $this->view("admin/adminpayment");
    }

    }



    function feedbacks(){

        $patientrate = new patientrate();
        $row=$patientrate->findAll();
        $this->view("admin/adminFeedbacks",[
            'row'=>$row,
        ]
        );


    }

    function reports(){
        $products=new products;

        $data=$products->findAll();
        $this->view("admin/adminReports",[
            'rows'=>$data,
        ]
        );


    }

    function products(){
        $products=new products;

        $data=$products->findAll();//where('userid',$userid);
        $this->view("admin/adminProducts",[
            'rows'=>$data,
        ]);

    }

    function users($userid=null){
        $common_user = new common_user();
        //userid=null
        //$userid=1;
        $data=$common_user->findAll();//where('userid',$userid);
        
        
        $row=$common_user->where('userid',$userid);
        if($row)
        {
            $row=$row[0];
        }

        $this->view("admin/adminUsers",[
            'rows'=>$data,
            'row'=>$row,
        ]);

    }

    function add()
    {
        $errors = array();
        if(count($_POST) > 0)
        {
            //show($POST);

            $common_user = new common_user();
            if($common_user->validate($_POST))
            {
                
                 
               // $arr['date'] = date("Y-m-d H:i:s");

               
                $common_user->insert($_POST);
                $this->redirect('admin/users');
            }else
            {
                //errors
               $errors = $common_user->errors;
            }
        }
        
        $this->view('admin/adminAddUser',[
           'errors'=>$errors,
        ]);

    }

    function update($userid=null){
        $common_user = new common_user();
        $userid=trim($userid=='') ? Auth::getUser_id() : $userid;

        $errors = array();
        if(count($_POST) > 0)
        {
            //if(trim($_POST['password']) == "")
            //{
            //    unset($_POST['password']);
            //    unset($_POST['password2']);

            //}

            if($common_user->validate($_POST,$userid))
            {
                
                 
               // $arr['date'] = date("Y-m-d H:i:s");

               
                $common_user->update($userid,$_POST);
                $this->redirect('admin/users');
            }else
            {
                //errors
               $errors = $common_user->errors;
            }
        }
        $row=$common_user->where('userid',$userid);
        if($row)
        {
            $row=$row[0];
        }
        $this->view('admin/adminUpdateUser',[
			'row'=>$row,
            'errors'=>$errors,
		]);
    }

    function delete($userid=null)
    {
        $common_user = new common_user();
        $userid=trim($userid=='') ? Auth::getUser_id() : $userid;


        if(count($_POST) > 0)
        {

                $common_user->delete($userid);
                $this->redirect('admin/users');
        }

        $row=$common_user->where('userid',$userid);
        if($row)
        {
            $row=$row[0];
        }

        $this->view('admin/adminDeleteUser',[
            'row'=>$row,

        ]);
       
    }








   /* function findUser($userid=null)
    {
        $common_user = new common_user();
        $userid=1;
        $data=$common_user->where('userid',$userid);
        
        $this->view("admin/admin",['rows'=>$data]);
    }*/

     /*public function findRank()
    {
        foreach ($rows as $row):

        $seller = new sellers();
        $doctor = new doctors();
        $patient = new patients();

        $userid = $row->userid;

        //sellerid
        if(!empty($row = $seller->where('userid',$userid) ))
        {
           $row = $row[0];
           $sellerid = $row->userid;
        }
        else{
           $sellerid = "";
        }

        //dotctorid
        if(!empty($row2 = $doctor->where('userid',$userid) ))
        {
           $row2 = $row2[0];
           $doctorid = $row2->userid;
        }
        else{
           $doctorid = "";
        }

        //patientid
        if(!empty($row3 = $patient->where('userid',$userid) ))
        {
           $row3 = $row3[0];
           $patientid = $row3->userid;
        }
        else{
           $patientid = "";
        }
        
        $userid = $_SESSION['COMMON_USER']->userid;

        
        $data="none";

        if(isset($_SESSION['COMMON_USER']))
        {
            if($sellerid == $userid )
            {
                $data = "seller";
            }
            if($doctorid == $userid)
            {
                $data = "doctor";
            }
            if($patientid == $userid)
            {
                $data = "patient";
            }
            if( ($doctorid == $userid) &&($sellerid == $userid ))
            {
                $data = "doctorAndSeller";
            }
            if( ($doctorid == $userid )&& ($patientid == $userid ))
            {
                $data = "doctorAndPatient";
            }
            if( ($sellerid == $userid) && ($patientid == $userid ))
            {
                $data = "sellerAndPatient";
            }
            if(($sellerid == $userid)&& ($patientid == $userid)&& ($doctorid == $userid))
            {
                $data = "allUser";
            }
            
            return $data;
        }
        endforeach;

    }*/
}
