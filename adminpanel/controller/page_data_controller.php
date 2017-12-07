<?php
include("../class/auth.php");
header("Content-type: application/json");
$status=$_POST['acst'];
if ($status == 1) {
    extract($_POST);
    $page = $obj->FlyQuery("SELECT 
                pd.id,
                c.name as category_id,
                sc.name as subcategory_id,
                pd.`photo`,
                pd.`details`,
                pd.`date`
                FROM page_data as pd
                left join category as c on c.id = pd.`category_id`
                left join sub_category as sc on sc.id = pd.`subcategory_id`");
                $var=array("data"=>$page);
                echo json_encode($var);
}elseif ($status == 3) {
    extract($_POST);
    if ($obj->TotalRows($table) == 1) {
        $arrayBanner=$obj->delete($table, array("id"=>$id));
        echo 1;
    }else {
        $arrayBanner=$obj->delete($table, array("id"=>$id));
        echo 2;
    }
}
?>