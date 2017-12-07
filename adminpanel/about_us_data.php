<?php
$table="about_us"; ?><?php 
include('class/auth.php');
include('plugin/plugin.php');
$plugin=new cmsPlugin(); 
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
    <head>
		<?php 
		echo $plugin->softwareTitle();
		echo $plugin->TableCss();
		echo $plugin->KendoCss();
		 ?>
    </head>
    <body class="">
		<?php 
		include('include/topnav.php'); 
		include('include/mainnav.php'); 
		?>
        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">About Us Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="about_us.php">Create New About Us</a></li>
                    <li class="active"><a href="#">About Us Data List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="about_us_10"></div>
            </div>
        </div>
        <!-- // About Us END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & About Us wrapper END -->
        
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_about_us" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-edit" href="about_us.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
            </script>
    <script id="delete_about_us" type="text/x-kendo-template">
                    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
            </script>        
    <script type="text/javascript">
                function deleteClick(about_us_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./controller/about_us_controller.php",
                            data: {id: about_us_id,table:"about_us",acst:3},
                            success: function (result) {
							if(result==1)
							{
								location.reload();
							}
							else
							{
								$(".k-i-refresh").click();
							}
                            }
                        });
                    }
                }

            </script>
            <script type="text/javascript">
                jQuery(document).ready(function () {
					var postarray={"id":1};
                    var dataSource = new kendo.data.DataSource({
                        pageSize: 5,
                        transport: {
                            read: {
                                url: "./controller/about_us_controller.php",
                                type: "POST",
								data:
								{
									"acst":1, //action status sending to json file
									"table":"about_us",
									"cond":0,
									"multi":postarray
									
								}
                            }
                        },
                        autoSync: false,
                        schema: {
                            data: "data",
                            total: "data.length",
                            model: {
                                id: "id",
                                fields: {
                                    id: {nullable: true},photo: {type: "string"},details: {type: "string"},
									date: {type: "string"}
                                }
                            }
                        }
                    });
                    jQuery("#about_us_10").kendoGrid({
                        dataSource: dataSource,
                        filterable: true,
                        pageable: {
                            refresh: true,
                            input: true,
                            numeric: false,
                            pageSizes: true,
                            pageSizes: [5, 10, 20, 50],
                        },
                        sortable: true,
                        groupable: true,
                        columns: [{field: "id", title: "#"},{field: "photo", title: "Photo"},{field: "details", title: "Details"},
							{field: "date", title: "Record Added", width: "150px"},
							{
                                title: "Edit",
                                template: kendo.template($("#edit_about_us").html())
                            },
							{
                                title: "Delete",
                                template: kendo.template($("#delete_about_us").html())
                            }
                        ]
                    });
                });

            </script>    
    <?php 
	echo $plugin->TableJs(); 
	echo $plugin->KendoJS(); 
	?>
    
</body>
</html>