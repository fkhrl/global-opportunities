<?php 
include("class/auth.php");
include("plugin/plugin.php");
$plugin=new cmsPlugin();
$table="page_data"; ?>
<?php 
if(isset($_POST['create'])){
   extract($_POST);
   if(!empty($category_id) && !empty($subcategory_id) && !empty($_FILES['photo']['name']) && !empty($details))
       {  include('class/uploadImage_Class.php'); $imgclassget=new image_class();  
   $photo=$imgclassget->upload_fiximage("upload","photo","photo_upload_".$table_name."_".time());  $insert=array('category_id'=>$category_id,'subcategory_id'=>$subcategory_id,'photo'=>$photo,'details'=>$details,'date'=>date('Y-m-d'),'status'=>1);
   if($obj->insert($table,$insert)==1)
   {
     $plugin->Success("Successfully Saved",$obj->filename());
 }
 else 
 {
     $plugin->Error("Failed",$obj->filename());
 }
}
else 
{
    $plugin->Error("Fields is Empty",$obj->filename());
}   
}
elseif(isset($_POST['update'])) 
{
   extract($_POST);if(!empty($category_id) && !empty($subcategory_id) && !empty($details))
   {$updatearray=array("id"=>$id); include('class/uploadImage_Class.php'); $imgclassget=new image_class(); 
   if(!empty($_FILES['photo']['name']))
   { 
    $photo_1=$imgclassget->upload_fiximage("upload","photo","photo_upload_".$table_name."_".time()); 
    $photo=$photo_1; 
    @unlink("upload/".$ex_photo);      
}
else
{ 
    $photo=$ex_photo; 
}$upd2=array('category_id'=>$category_id,'subcategory_id'=>$subcategory_id,'photo'=>$photo,'details'=>$details,'date'=>date('Y-m-d'),'status'=>1);
$update_merge_array=array_merge($updatearray,$upd2);
if($obj->update($table,$update_merge_array)==1)
{ 
   $plugin->Success("Successfully Updated",$obj->filename());
} 
else 
{ 
   $plugin->Error("Failed",$obj->filename()); 
}}}
elseif(isset($_GET['del'])=="delete") 
{
    $delarray=array("id"=>$_GET['id']);
    $photolink=$obj->SelectAllByVal($table,'id',$_GET['id'],'photo'); 
    @unlink("upload/".$photolink);
    if($obj->delete($table,$delarray)==1)
    { 
        $plugin->Success("Successfully Delete",$obj->filename());  
    } 
    else 
    { 
        $plugin->Error("Failed",$obj->filename()); 
    }
}
?><!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
<head><?php  
echo $plugin->softwareTitle("Page Data");
echo $plugin->TableCss();  echo $plugin->FileUploadCss();  echo $plugin->TextAreaCss();  ?></head>
<body class="">
  <?php include('include/topnav.php'); include('include/mainnav.php'); ?>





  <div id="content">
     <h1 class="content-heading bg-white border-bottom">Page Data</h1>
     <div class="innerAll bg-white border-bottom">
        <ul class="menubar">
            <li class="active"><a href="#">Create New Page Data</a></li>
            <li><a href="page_data_data.php">Page Data List</a></li>
        </ul>
    </div>
    <div class="innerAll spacing-x2">
        <?php echo $plugin->ShowMsg(); ?>
        <!-- Widget -->

        <!-- Widget -->
        <div class="widget widget-inverse" >
           <?php 
           if(isset($_GET['edit']))
           {
               ?>
               <!-- Widget heading -->
               <div class="widget-head">
                <h4 class="heading">Update/Change - Page Data</h4>
            </div>
            <!-- // Widget heading END -->

            <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
                   <style type='text/css'>
                   .radio{margin-left: 30px;}
               </style>
               <label  for="inputEmail3" class="col-sm-2 control-label"> Category ID </label>

               <div class='col-sm-9'>
                <select id='form-field-1' name='category_id' class='form-control'><option value='0'>Please Select</option><?php 
                $ex_category_id_data=$obj->SelectAllByVal($table,'id',$_GET['edit'],'category_id');
                $sqlcategory_id=$obj->FlyQuery('SELECT id,name FROM `category`');
                if(!empty($sqlcategory_id))
                {
                    foreach ($sqlcategory_id as $category_id): ?><option <?php if($category_id->id==$ex_category_id_data){ ?> selected='selected' <?php } ?> value='<?=$category_id->id?>'><?=$category_id->name?></option><?php endforeach; ?><?php } ?></select>
                </div>
            </div><div class='form-group'>
               <style type='text/css'>
               .radio{margin-left: 30px;}
           </style>
           <label  for="inputEmail3" class="col-sm-2 control-label"> SubCategory ID </label>

           <div class='col-sm-9'>
            <select id='form-field-1' name='subcategory_id' class='form-control'><option value='0'>Please Select</option><?php 
            $ex_subcategory_id_data=$obj->SelectAllByVal($table,'id',$_GET['edit'],'subcategory_id');
            $sqlsubcategory_id=$obj->FlyQuery('SELECT id,name FROM `sub_category`');
            if(!empty($sqlsubcategory_id))
            {
                foreach ($sqlsubcategory_id as $subcategory_id): ?><option <?php if($subcategory_id->id==$ex_subcategory_id_data){ ?> selected='selected' <?php } ?> value='<?=$subcategory_id->id?>'><?=$subcategory_id->name?></option><?php endforeach; ?><?php } ?></select>
            </div>
        </div><div class='form-group'>
           <style type='text/css'>
           .radio{margin-left: 30px;}
       </style>
       <label  for="inputEmail3" class="col-sm-2 control-label"> Photo </label>

       <div class='col-sm-3'>
        <?php 
        $ex_photo_data=$obj->SelectAllByVal($table, "id", $_GET['edit'], "photo");
        echo $plugin->FileUploadBox(1,$ex_photo_data,'photo');
        ?>
    </div>
</div><div class='form-group'>
   <style type='text/css'>
   .radio{margin-left: 30px;}
</style>
<label  for="inputEmail3" class="col-sm-2 control-label"> Details </label>

<div class='col-sm-9'>
    <textarea id='form-field-1' name='details' placeholder='Details' class='summernote'><?php echo $obj->SelectAllByVal($table,"id",$_GET['edit'],"details"); ?></textarea>
</div>
</div><div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button  onclick="javascript:return confirm('Do You Want change/update These Record?')"  type="submit" name="update" class="btn btn-primary">Save Change</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
</div>
</form>
</div>
<?php }else{ ?>
<!-- Widget heading -->
<div class="widget-head">
    <h4 class="heading">Create New Page Data</h4>
</div>
<!-- // Widget heading END -->

<div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
    <label  for="inputEmail3" class="col-sm-2 control-label"> Category ID </label>

    <div class='col-sm-9'>
        <select id='form-field-1' name='category_id' class='form-control'><option value='0'>Please Select</option><?php $sqlcategory_id=$obj->FlyQuery('SELECT id,name FROM `category`');
        if(!empty($sqlcategory_id))
        {
            foreach ($sqlcategory_id as $category_id): ?><option value='<?=$category_id->id?>'><?=$category_id->name?></option><?php endforeach; ?><?php } ?></select>
        </div>
    </div><div class='form-group'>
        <label  for="inputEmail3" class="col-sm-2 control-label"> SubCategory ID </label>

        <div class='col-sm-9'>
            <select id='form-field-1' name='subcategory_id' class='form-control'><option value='0'>Please Select</option><?php $sqlsubcategory_id=$obj->FlyQuery('SELECT id,name FROM `sub_category`');
            if(!empty($sqlsubcategory_id))
            {
                foreach ($sqlsubcategory_id as $subcategory_id): ?><option value='<?=$subcategory_id->id?>'><?=$subcategory_id->name?></option><?php endforeach; ?><?php } ?></select>
            </div>
        </div><div class='form-group'>
            <label  for="inputEmail3" class="col-sm-2 control-label"> Photo </label>

            <div class='col-sm-3'>
                <?php 
                echo $plugin->FileUploadBox(0,'','photo');
                ?>
            </div>
        </div><div class='form-group'>
            <label  for="inputEmail3" class="col-sm-2 control-label"> Details </label>

            <div class='col-sm-9'>
                <textarea id='form-field-1' name='details' placeholder='Details' class='summernote'></textarea>
            </div>
        </div><div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit"   onclick="javascript:return confirm('Do You Want Create/save These Record?')"  name="create" class="btn btn-info">Save</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
</div>
<?php } ?>
</div>
<!-- // Widget END -->




<!-- // Widget END -->
</div>
</div>
<!-- // Content END -->

<div class="clearfix"></div>
<!-- // Sidebar menu & content wrapper END -->
<?php include('include/footer.php'); ?>
<!-- // Footer END -->
</div>
<!-- // Main Container Fluid END -->
<!-- Global -->

<?php echo $plugin->TableJs();  echo $plugin->FileUploadJS();  echo $plugin->TextAreaJS();  ?>
<script>
    $(document).ready(function () {
        $('#category').change(function () {
            var cid = $(this).val();
            $.post("ajax/subcategory_data.php", {cid: cid}, function (cat) {
                $("#subcategory").html(cat);
            });
                //alert('data');
            });
    });


</script>
</body>
</html>