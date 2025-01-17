<?php

use Mpdf\Tag\H1;

class seller extends Controller
{
    function index()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $Auth = new Auth;
        $data2 = $Auth->finduser();
        $type = "Product";
        $type2 = "Herb";

        $products = new products();
        $userid = Auth::userid();

        $sellers = new sellers();
        $data3 = $sellers->where('userid', $userid);

        // $payments = new productcommission();
        // if ($d_data = $payments->where2('status', 'not_completed', 'userID', $userid)) {
        //     $p_id1 = $d_data[0]->productid;
        //     $row_1 = $products->where('productid', $p_id1);
        //     if ($row_1) {
        //         $row_1 = $row_1[0];
        //         unlink($row_1->image);
        //     }
        //     $products->delete($p_id1);
        //     $payments->delete3('status', 'not_completed', 'userID', $userid);
        // }

        $data = $products->where('sellerid', $userid);

        //for the count
        if ($z1 = $products->where2('sellerid', $userid, 'category', $type)) {
            $data4 = count($z1);
        } else {
            $data4 = 0;
        }

        if ($z2 = $products->where2('sellerid', $userid, 'category', $type2)) {
            $data5 = count($z2);
        } else {
            $data5 = 0;
        }

        if ($z3 = $products->where('sellerid', $userid)) {
            $data6 = count($z3);
        } else {
            $data6 = 0;
        }
        //print_r($data5);
        //die;   

        $this->view('seller/seller', [
            'rows' => $data,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'data6' => $data6,
        ]);
    }

    //get the file destination
    function get_destination($destination)
    {
        global $des;
        $des = $destination;
        return $des;
    }

    //function for registration
    function registration()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $commonUser = new common_user();
        $userid = Auth::userid();
        $data4 = $commonUser->where('userid', $userid);
        if ($data4) {
            $data4 = $data4[0];
        }

        $errors = array();

        $userName = Auth::username();
        if (count($_POST) > 0) {

            $sellers = new sellers(); //create the instance of the seller in model


            if ($sellers->validate($_POST, $_FILES, $userName)) {
                global $des;
                $arr['userid'] = Auth::userid();
                $arr['nameWithInitials'] = $data4->nameWithInitials;
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['tpNumber'] = $data4->tpNumber;
                //$arr['tpNumber2'] = Auth::tpNumber();
                $arr['nic'] = htmlspecialchars($_POST['nic']);
                $arr['address'] = htmlspecialchars($_POST['address']);
                $arr['image'] = $des;

                $sellers->insert($arr);
                $this->redirect('home/home');
            } else {
                $errors = $sellers->errors;
            }
        }
        $this->view('seller/sellerregi', [
            'errors' => $errors,
        ]);
    }

     //function to delete account
     function deleteSeller($userid = null)
     {
         if (!Auth::logged_in()) {
             $this->redirect('login/login');
         }
         $sellers = new sellers();
 
 
         if (count($_POST) > 0) {
            $row = $sellers->where('userid', $userid);
            if ($row) {
                $row = $row[0];
                if(file_exists($row->image)){
                    unlink($row->image);
                    }
            }
             //print_r($data);
             //die;
             $sellers->delete($userid);
             $this->redirect('myAccount');
         }
         $row = $sellers->where('userid', $userid);

         $sellerid = Auth::userid();
         $sellers = new sellers();
         $data = $sellers->where('userid', $sellerid);
         $this->view('profile/deleteSeller', [
             'row' => $data,
         ]);
     }

    //function for seller registration
    function editSeller()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $sellers = new sellers();

        $commonUser = new common_user();
        $userid = Auth::userid();

        $errors = array();
        $sellers = new sellers(); //create the instance of the seller in model
        $data1 = $sellers->where('userid', $userid);
        if ($data1) {
            $data1 = $data1[0];
        }

        $dest = $data1->image;

        $userName = Auth::username();
        if (count($_POST) > 0) {

            if ($sellers->validate2($_POST, $_FILES, $userName,$userid,$dest)) {
                global $des;
                $arr['nameWithInitials'] = htmlspecialchars($_POST['nameWithInitials']);
                $arr['registrationNumber'] = htmlspecialchars($_POST['registrationNumber']);
                $arr['tpNumber'] = htmlspecialchars($_POST['tpNumber']);
                $arr['nic'] = htmlspecialchars($_POST['nic']);
                $arr['address'] = htmlspecialchars($_POST['address']);
                $arr['image'] = $des;

                $sellers->update($userid, $arr);
                $this->redirect('myAccount');
                
            } else {
                $errors = $sellers->errors;
            }
        }
        
        $this->view('profile/editSeller', [
            'errors' => $errors,
            'row' => $data1,
        ]);
    }

    //for upload products

    //--------------------------upload products----------------------------------------------------
    function uploadProduct()
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();

        if (count($_POST) > 0) {
            $products = new products();
            $seller = new sellers();
            $userid = Auth::userid();
            if (!empty($row = $seller->where('userid', $userid))) {
                $row = $row[0];
                $nameWithInitials = $row->nameWithInitials;
                $address = $row->address;
            } else {
                $nameWithInitials = "";
                $address = "";
            }

            $userName = Auth::username();

            // print_r($_POST);
            // die;
            if ($products->validate($_POST, $_FILES, $userName)) {
                global $des;
                $arr['productName'] = htmlspecialchars($_POST['productName']);
                $arr['productPrice'] = htmlspecialchars($_POST['productPrice']);
                $arr['description'] = htmlspecialchars($_POST['description']);
                $arr['image'] = $des;
                $arr['category'] = htmlspecialchars($_POST['category']);
                $arr['sellerName'] = $nameWithInitials;
                $arr['address'] = $address;
                $arr['tpNumber'] = Auth::tpNumber();
                $arr['sellerid'] = Auth::userid();
                // $arr['uses'] = htmlspecialchars($_POST['uses']);

            //     print_r($arr);
            // die;
                $products->insert($arr);

                //to get the last entry of the user
                $query1 = "select * from products where sellerid = :userid order by productid desc limit 1";
                $arr1['userid'] = $userid;
                $dataid = $products->query($query1, $arr1);
                // print_r($dataid);
                // die;

                //to send to commission table
                if ($dataid != null) {
                    $dataid = $dataid[0];
                    $productId = $dataid->productid;
                    $productName = $dataid->productName;

                    $payments = new productcommission();

                    $arr4['date'] = date("Y/m/d");
                    $arr4['amount'] = 0;
                    $arr4['productid'] = $productId;
                    $arr4['userID'] = Auth::userid();
                    $arr4['status'] = "not_completed";
                    $arr4['productName'] = $productName;

                    $payments->insert($arr4);
                }



                //commision for the product
                $pcommission = $arr['productPrice'] * (30 / 100);
                $this->redirect('seller/commissionPayment/' . $pcommission);
            } else {
                $errors = $products->errors2;
            }
        }


        $this->view('seller/uploadProduct', [
            'errors' => $errors,
        ]);
    }
    //-------------------------------upload products---------------------------------------------------------

    //for payments of the products
    function commissionPayment($commission = "")
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        //need to make a redirection if there is no item

        $commonUser = new common_user();

        $products = new products();
        $userid = Auth::userid();

        //to get the last entry of the user
        $query1 = "select * from products where sellerid = :userid order by productid desc limit 1";
        $arr1['userid'] = $userid;
        $dataid = $products->query($query1, $arr1);
        // print_r($dataid);
        // die;
        if ($dataid != null) {
            $dataid = $dataid[0];
            $productId = $dataid->productid;
        }

        $data = $commonUser->where('userid', $userid);
        if ($data) {
            $data = $data[0];
        }

        $this->view('seller/productCommission', [
            'data' => $data,
            'data2' => $commission,
            'dataid' => $productId,
        ]);
    }

    function productCommission()
    {

        //-------------------------------for payment details-----------------------------------------------------

        $merchant_id         = $_POST['merchant_id'];
        $order_id             = $_POST['order_id']; //productid 
        $payhere_amount     = $_POST['payhere_amount'];
        $payhere_currency    = $_POST['payhere_currency'];
        $status_code         = $_POST['status_code'];
        $md5sig                = $_POST['md5sig'];


        $arr['date'] = date("Y/m/d");
        $arr['amount'] = $payhere_amount;
        $arr['productid'] = $order_id;
        $arr['status'] = "completed";

        //---------to get the post data to txt file for debuging----------------------------
        $today = date("Y-m-d");
        //file_put_contents("POST_logs/" . $today . ".txt", $arr, FILE_APPEND);
        //---------------------------------------------------------------------------------

        $merchant_secret = '4p6oM65yLel8lzSHKYzqtQ4TwgRmoRLvF49dAyBUptlC'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

        $local_md5sig = strtoupper(md5($merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret))));

        if (($local_md5sig === $md5sig) and ($status_code == 2)) {
            //TODO: Update your database as payment success

            $payments = new productcommission();
            $payments->update2($order_id, $arr);
        } else {
            $products = new products();

            //to get the last entry of the user
            $data = $products->where('productid', $order_id);

            if ($data != null) {
                $data = $data[0];
                unlink($data->image);

                $products->delete($order_id);
            }
        }
        //------------------------end of the payment part---------------------------------------------------------------
    }

    //for edit products
    function editProduct($productid = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $userid = Auth::userid();
        $errors = array();
        $products = new products();

        $userName = Auth::username();
        $data1 = $products->where('productid', $productid);
        if ($data1) {
            $data1 = $data1[0];
        }
        $dest = $data1->image;

        if (count($_POST) > 0) {

            if ($products->validate2($_POST, $_FILES, $userName,$productid,$dest)) {
                global $des;
                $arr['productName'] = $_POST['productName'];
                $arr['description'] = $_POST['description'];
                $arr['image'] = $des;
                $arr['category'] = $_POST['category'];


                $products->update($productid, $arr);
                $this->redirect('seller');
            } else {
                $errors = $products->errors2;
            }
        }
        $row = $products->where('productid', $productid); //in here row is an array

        if ($row) {
            $row = $row[0];
        }
        $this->view('seller/editProduct', [
            'errors' => $errors,
            'row' => $row,
        ]);
    }

    //for delete products
    function deleteProduct($productId = null)
    {
        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $errors = array();
        $products = new products();

        if (count($_POST) > 0) {

            $row = $products->where('productid', $productId);
            if ($row) {
                $row = $row[0];
                unlink($row->image);
            }

            $products->delete($productId);
            $this->redirect('seller');
        }
        $row = $products->where('productid', $productId); //in here row is an array
        $data = $products->where('productid', $productId);
        if ($row) {
            $row = $row[0];
        }
        $this->view('seller/deleteProduct', [
            'row' => $row,
            'rows' => $data,
        ]);
    }

    //for product details--------------------------------------------------
    function productDetails($productId = null)
    {

        $products = new products();
        $data = $products->where('productId', $productId);


        $this->view('seller/productDetails', ['rows' => $data]);
    }



    //for payment details
    function productPaymentDetails()
    {

        if (!Auth::logged_in()) {
            $this->redirect('login/login');
        }

        $userid = Auth::userid();
        $products = new products();
        $payments = new productcommission();

        $status = "completed";
        $data1 = $payments->where2('status', $status,'userid',$userid);


        $this->view('seller/paymentTable', [
            // 'row' => $row,
            'rows' => $data1,
        ]);
    }

    //for generate pdf---------------------------------------------------------------------
    public function generatepdf($id)
    {
        $userid = Auth::userid();
        require_once __DIR__ . '/../models/mpdf/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        $html = file_get_contents(ROOT . '/seller/paymentpdf/' . $id . '/' . $userid);
        // print_r($html);
        // die;
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }

    function paymentpdf($id, $userid)
    {

        $payments = new productcommission();
        $seller = new sellers();

        $data1 = $payments->where('productid', $id);
        $data2 = $seller->where('userid', $userid);

        if ($data1 != null) {
            $data1 = $data1[0];
        }

        if ($data2 != null) {
            $data2 = $data2[0];
        }

?>
        <style>
            th,
            td {
                text-align: left;
                padding: 16px;
            }

            .title2 {
                width: 95%;
                text-align: center;
            }
        </style>

        <div class="title1" style="width: 95%;">
            <div class="logo" style="width: 100%;text-align: center;"><img src="<?= ASSETS ?>img/logo.png" style="width: 30%;align-items: center;"></div>
            <div class="mtitle" style="width: 100%;text-align: center;">
                <h1>Ceylon Nuture</h1>
            </div>
        </div>
        <hr>
        <div class="title2">
            <h2>Payment Detials</h2>
        </div>
        <table style="border-collapse: collapse;border-spacing: 0;width: 85%;border: 1px solid #ddd;margin: 5% auto;">
            <tr>
                <td>Name With initials</td>
                <td>:</td>
                <td><?= $data2->nameWithInitials ?></td>
            </tr>
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td><?= $data1->productName ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td>:</td>
                <td><?= $data1->date ?></td>
            </tr>
            <tr>
                <td>Amount</td>
                <td>:</td>
                <td>Rs:<?= $data1->amount ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?= $data1->status ?></td>
            </tr>
        </table>

<?php

    }
}
