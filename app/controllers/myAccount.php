<?php
class myAccount extends Controller
{
    function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $Auth = new Auth;
        $data = $Auth->finduser();

        $sellers = new sellers();
        $doctor = new doctors();
        $patient = new patients();
        $commonUser = new common_user();
        $userid = Auth::userid();
        $data1 = $sellers->where('userid', $userid);
        $data2 = $doctor->where('userid', $userid);
        $data3 = $patient->where('userid', $userid);
        $data4 = $commonUser->where('userid', $userid);

        if ($data1) {
            $data1 = $data1[0];
        }
        if ($data2) {
            $data2 = $data2[0];
        }
        if ($data3) {
            $data3 = $data3[0];
        }
        if ($data4) {
            $data4 = $data4[0];
        }


        $this->view('profile/myAccount', [
            'row' => $data,
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
        ]);
    }
    function get_destination($destination)
    {
        global $des;
        $des = $destination;
        return $des;
    }


    function editCommonUser()
    {
        $commonUser = new common_user();
        $userid = Auth::userid();
        $data4 = $commonUser->where('userid', $userid);
        if ($data4) {
            $data4 = $data4[0];
        }
        $dest = $data4->image;
        $userName = Auth::username();

        $errors = array();

        if (count($_POST) > 0) {
            if ($commonUser->validate2($_POST, $_FILES, $userName, $userid, $dest)) {
                global $des;
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['username'] = htmlspecialchars($_POST['username']);
                $arr['gender'] = htmlspecialchars($_POST['gender']);
                $arr['email'] = htmlspecialchars($_POST['email']);
                $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
                $arr['image'] = $des;

                // $arr['date'] = date("Y-m-d H:i:s");
                $commonUser->update($userid, $arr);
                $this->redirect('myAccount');
            } else {
                //errors
                $errors = $commonUser->errors;
            }
        }
        $this->view('profile/editCommonUser', [
            'errors' => $errors,
            'row' => $data4
        ]);
    }
    function deleteCommonUser($userid = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }
        $errors = array();
        $commonUser = new common_user();
        // $userid = Auth::userid();

        if (count($_POST) > 0) {
            $commonUser->delete($userid);
            $this->redirect('logout');
        }
        //print_r($data);
        $row = $commonUser->where('userid', $userid);
        if ($row) {
            $row = $row[0];
            if (file_exists($row->image)) {
                unlink($row->image);
            }
            
            $this->view('profile/deleteCommonUser', [
                'row' => $row,
            ]);
        }
    }
}
