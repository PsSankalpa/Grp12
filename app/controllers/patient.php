<?php
class patient extends Controller
{
    function index()
    {
      
       $patient = new patient();
        //$data = $common_user->findAll();

       // $this->view("patient/patient",['rows'=>$data]); //in here put the relevent page name and the path
    } 

    
    //get the file destination
    function get_destination($destination)
    {
        global $des;
        $des =$destination;
        return $des;
    }

    function registration()
    {
        $errors = array();
        $userName = Auth::username();

        if(count($_POST)>0)
        {
            
            $patients = new patients();//create the instance of the patient in model
            
            if($patients->validate($_POST,$_FILES,$userName))
            {
                global $des;
                $arr['userid'] = Auth::userid();
                $arr['nic'] = htmlspecialchars($_POST['nic']);
                $arr['image'] = $des;
             
               
                $patients->insert($arr);
                $this->redirect('home/home');
            }
            else{
                $errors = $patients->errors;
            }
        } 
        $this->view('patient/patientregi',[
			'errors'=>$errors,
		]);
    }

    function patientUpdate()
    {
        $errors = array();
        $userName = Auth::username();
        $patient = new patients();
        $userid = Auth::userid();
        $data = $patient->where('userid',$userid);
        if($data)
        {
            $data = $data[0];
        }

        if(count($_POST)>0)
        {
            
            $patients = new patients();//create the instance of the patient in model
            
            if($patients->validate($_POST,$_FILES,$userName))
            {
                global $des;
                $arr['nic'] = htmlspecialchars($_POST['nic']);
                $arr['image'] = $des;
             
               
                $patients->update($userid,$arr);
                $this->redirect('myAccount');
            }
            else{
                $errors = $patients->errors;
            }
        } 
        $this->view('profile/editPatient',[
			'errors'=>$errors,
            'row'=>$data,
		]);
    }
    function deleteAccount($userid = null)
    {
        if (!Auth::logged_in())
        {
            $this->redirect('login/login');
        }
        $errors = array();
        $patients = new patients();


        if (count($_POST) > 0) 
        {
            //print_r($data);
            //die;
            $patients->delete($userid);
            $this->redirect('myAccount');
        }
        $row = $patients->where('userid', $userid);
        //$data2 = $doctors->findAll();
        if ($row) 
        {
            $row = $row[0];
            unlink($row->image);
        }
        $doctorid = Auth::userid();
        $patient = new patient();
        $data = $patients->where('userid', $userid);
        $this->view('profile/deletePatient', [
            'row' => $row,
            'data' => $data,
        ]);
    }






}
