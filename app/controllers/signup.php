<?php
class signup extends Controller
{
    function index($page = '',$title = '',$subpage = '')//we can take the values in the url in by this way
    {
        //$db = new database();
        //$data['results'] = $db->read("Select * from images");
        $data['page_title'] = "Ceylon Nurture SignUp";

        //$image_class = $this->loadModel("image_class");//load the relevant model
        //utilize the above loaded model here
        $this->view("signup",$data); //in here put the relevent page name and the path
    }
}
?>
