<?php
class upload extends Controller
{
    function index()
    {
        $data['page_title'] = "Ceylon Nurture product upload";
        header("Location:". ROOT ."upload/image");//redirect
        die;
    }

    function image()
    {
        //check the user before upload
        $user = $this->loadModel("user");
        $data['page_title'] = "Ceylon Nurture product upload";
        $this->view("upload",$data); 

        if(isset($_POST['title']) && isset($_FILES['file']))
        {
            $uploader = $this->loadModel("upload_file");
            $uploader->upload($_POST,$_FILES);
        }
        
    }
}
//3.13