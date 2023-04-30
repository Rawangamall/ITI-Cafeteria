<?php

//for displaying errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("/opt/lampp/htdocs/cafeteria/App/models/user_model.php");

    $user=new User();
    $allusers= $user->selectAll();
    $usersamount= $user->totalamount();

    if (isset($_POST['userId']) && $_POST['userId'] != "") {
        $userId = $_POST['userId'];
        $Usertotal= $user->Usertotalamount($userId);
        echo '
        <tr>
          <td>
            <button name="plus" class="btn"><i class="fa fa-plus"></i></button>
            <span class="btn-text">' . $Usertotal[0]['name'] . '</span>
          </td>
          <td>  <span class="btn-text">' .$Usertotal[0]['total_amount']. '</span></td>
        </tr>
      ';
    }
    
    if (isset($_POST['BtnuserId']) && $_POST['BtnuserId'] != "") {
        $userId = $_POST['BtnuserId'];
        $userOrders= $user->selectUserOrders($userId);
        header('Content-Type: application/json');
        echo json_encode($userOrders);  
      }
?>