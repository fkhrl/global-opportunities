<?php 
		include("class/auth.php");
		include("plugin/plugin.php");
		$plugin=new cmsPlugin();
		$table="footer_info"; ?>
		<?php 
		if(isset($_POST['create'])){
			extract($_POST);
			if(!empty($_FILES['footer_logo']['name']) && !empty($details) && !empty($_FILES['barcode']['name']))
			{  include('class/uploadImage_Class.php'); $imgclassget=new image_class();  
                                          $footer_logo=$imgclassget->upload_fiximage("upload","footer_logo","footer_logo_upload_".$table_name."_".time());  
                                          $barcode=$imgclassget->upload_fiximage("upload","barcode","barcode_upload_".$table_name."_".time());  $insert=array('footer_logo'=>$footer_logo,'details'=>$details,'barcode'=>$barcode,'date'=>date('Y-m-d'),'status'=>1);
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
			extract($_POST);if(!empty($details))
			{$updatearray=array("id"=>$id); include('class/uploadImage_Class.php'); $imgclassget=new image_class(); 
                                                    if(!empty($_FILES['footer_logo']['name']))
                                                    { 
                                                            $footer_logo_1=$imgclassget->upload_fiximage("upload","footer_logo","footer_logo_upload_".$table_name."_".time()); 
                                                            $footer_logo=$footer_logo_1; 
                                                            @unlink("upload/".$ex_footer_logo);      
                                                    }
                                                    else
                                                    { 
                                                            $footer_logo=$ex_footer_logo; 
                                                    }
                                                    if(!empty($_FILES['barcode']['name']))
                                                    { 
                                                            $barcode_1=$imgclassget->upload_fiximage("upload","barcode","barcode_upload_".$table_name."_".time()); 
                                                            $barcode=$barcode_1; 
                                                            @unlink("upload/".$ex_barcode);      
                                                    }
                                                    else
                                                    { 
                                                            $barcode=$ex_barcode; 
                                                    }$upd2=array('footer_logo'=>$footer_logo,'details'=>$details,'barcode'=>$barcode,'date'=>date('Y-m-d'),'status'=>1);
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
			$delarray=array("id"=>$_GET['id']);$photolink=$obj->SelectAllByVal($table,'id',$_GET['id'],'barcode'); @unlink("upload/".$photolink);if($obj->delete($table,$delarray)==1)
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
    echo $plugin->softwareTitle("Footer Info");
    echo $plugin->TableCss();  echo $plugin->FileUploadCss();  echo $plugin->TextAreaCss();  ?></head>
    <body class="">
		<?php include('include/topnav.php'); include('include/mainnav.php'); ?>
        




        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Footer Info</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li class="active"><a href="#">Create New Footer Info</a></li>
                    <li><a href="footer_info_data.php">Footer Info List</a></li>
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
                                <h4 class="heading">Update/Change - Footer Info</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form">
								<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>"><div class='form-group'>
							<style type='text/css'>
                                    .radio{margin-left: 30px;}
                                </style>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Footer Logo </label>

                            <div class='col-sm-3'>
                                    <?php 
                    $ex_footer_logo_data=$obj->SelectAllByVal($table, "id", $_GET['edit'], "footer_logo");
                    echo $plugin->FileUploadBox(1,$ex_footer_logo_data,'footer_logo');
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
                    </div><div class='form-group'>
							<style type='text/css'>
                                    .radio{margin-left: 30px;}
                                </style>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Barcode </label>

                            <div class='col-sm-3'>
                                    <?php 
                    $ex_barcode_data=$obj->SelectAllByVal($table, "id", $_GET['edit'], "barcode");
                    echo $plugin->FileUploadBox(1,$ex_barcode_data,'barcode');
                    ?>
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
                                <h4 class="heading">Create New Footer Info</h4>
                            </div>
                            <!-- // Widget heading END -->
							
                            <div class="widget-body"><form enctype='multipart/form-data' class="form-horizontal" method="post" action="" role="form"><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Footer Logo </label>

                            <div class='col-sm-3'>
                                    <?php 
                    echo $plugin->FileUploadBox(0,'','footer_logo');
                    ?>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Details </label>

                            <div class='col-sm-9'>
                                    <textarea id='form-field-1' name='details' placeholder='Details' class='summernote'></textarea>
                            </div>
                    </div><div class='form-group'>
                            <label  for="inputEmail3" class="col-sm-2 control-label"> Barcode </label>

                            <div class='col-sm-3'>
                                    <?php 
                    echo $plugin->FileUploadBox(0,'','barcode');
                    ?>
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
    
    <?php echo $plugin->TableJs();  echo $plugin->FileUploadJS();  echo $plugin->TextAreaJS();  ?> <script type='text/javascript'>
				jQuery(function($) {
					$('#id-input-file-1').ace_file_input({
                                            no_file:'No File ...',
                                            btn_choose:'Choose',
                                            btn_change:'Change',
                                            droppable:true,
                                            onchange:null,
                                            thumbnail:true
					});
	
				})
			</script></body>
</html>