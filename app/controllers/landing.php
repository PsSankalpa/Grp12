<?php
class landing extends Controller
{
  function index()
  {

    //if(!Auth::logged_in())
    //{
    //  $this->redirect();

    // }
    if (Auth::logged_in()) {
      $Auth = new Auth;
      $data = $Auth->finduser();

      //to get the latest articles
      $article = new article();
      $data2 = $article->findrange(7);
      if ($data2 == null || count($data2) < 4) {
        $query1 = "select * from articles where status = 1 order by articleid desc limit 6";
        $data2 = $article->query($query1);
      }
      $contactus = new contactus();
      
      if(isset($_POST['submit']))
      {  
        // $arr['date'] = date("Y-m-d H:i:s");
        $arr['fullname'] = htmlspecialchars($_POST['fullname']);
        $arr['email'] = htmlspecialchars($_POST['email']);
        $arr['message'] = htmlspecialchars($_POST['message']);
        //print_r($arr);
        //die;
        $contactus->insert($_POST);
        //print_r($_POST);
       
        $this->redirect('home');
      }
      $this->view('home', [
        'data' => $data,
        'rows' => $data2,
      ]);
    } else {
      $article = new article();
      //$data2 = $article->findAll();
       //to get the latest articles
       $article = new article();
       $data2 = $article->findrange(7);
       if ($data2 == null || count($data2) < 4) {
         $query1 = "select * from articles where status = 1 order by articleid desc limit 6";
         $data2 = $article->query($query1);
       }
       $contactus = new contactus();
      
       if(isset($_POST['submit']))
       {  
         // $arr['date'] = date("Y-m-d H:i:s");
         $arr['fullname'] = htmlspecialchars($_POST['fullname']);
         $arr['email'] = htmlspecialchars($_POST['email']);
         $arr['message'] = htmlspecialchars($_POST['message']);
         //print_r($arr);
         //die;
         $contactus->insert($_POST);
         //print_r($_POST);
        
         $this->redirect('home');
       }
      $this->view('home', [
        'rows' => $data2,
      ]);
    }
  }

  /*function home()
    {
      
        if(!Auth::logged_in())
        {
         $this->redirect('login/login');
        }

            $Auth = new Auth;
            $data = $Auth->finduser();
            
            $this->view('home',[
			    'data'=>$data,
            
		    ]); //in here put the relevent page name and the path
        }

        function findUser()
        {

        }*/
}
