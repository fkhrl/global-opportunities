<?php
include("../class/auth.php");
$q=$_POST['cid'];
echo $q;
if(!empty($q)){
   $sql_subcategory = $obj->FlyQuery("Select * from sub_category WHERE category_name='$q'");
   ?>
    <option value="">Select A SubCategory</option>
    <?php
     if (!empty($sql_subcategory)) {
            foreach ($sql_subcategory as $subcategory):
                ?>
                <option value="<?php echo $subcategory->id ?>"><?php echo $subcategory->name ?></option>

                <?php
            endforeach;
        }
        else {
            ?>
            <option value="">Select A Category</option>
            <?php
        }
        ?>

<?php
}
?>



        
       