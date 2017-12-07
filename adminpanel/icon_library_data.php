<?php
$table="icon_library"; ?><?php 
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
        	<h1 class="content-heading bg-white border-bottom">Icon Library Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="icon_library.php">Create New Icon Library</a></li>
                    <li class="active"><a href="#">Icon Library Data List</a></li>
                    <li><span><a href="#modal-credit-card" data-toggle="modal" class="btn btn-success"> <i class="fa fa-fw fa-credit-card"></i> Font Awesome Icons</a></span></li>
                     <!-- Modal -->
                        <div class="modal fade" id="modal-credit-card" style="width: 100%">

                            <div class="modal-dialog">
                                <div class="modal-content" style="width: 960px; margin-left: -20%; height: 700px;">

                                    <!-- Modal heading -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h3 class="modal-title">Font Awesome Icons</h3>
                                    </div>
                                    <!-- // Modal heading END -->

                                    <!-- Modal body -->
                                    <div class="modal-body">

                                        <div class="innerAll">
                                            <iframe src="http://fontawesome.io/3.2.1/icons/" style="width: 100%; height: 500px;"></iframe> 
                                        </div>

                                    </div>
                                    <!-- // Modal body END -->

                                </div>
                            </div>

                        </div>
                        <!-- // Modal END -->
                </ul>
            </div>
          <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="icon_library_6"></div>
            </div>
        </div>
        <!-- // Icon Library END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Icon Library wrapper END -->
        
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_icon_library" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-edit" href="icon_library.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
            </script>
    <script id="delete_icon_library" type="text/x-kendo-template">
                    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
            </script>        
    <script type="text/javascript">
                function deleteClick(icon_library_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./controller/icon_library_controller.php",
                            data: {id: icon_library_id,table:"icon_library",acst:3},
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
                                url: "./controller/icon_library_controller.php",
                                type: "POST",
								data:
								{
									"acst":1, //action status sending to json file
									"table":"icon_library",
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
                                    id: {nullable: true},name: {type: "string"},
									date: {type: "string"}
                                }
                            }
                        }
                    });
                    jQuery("#icon_library_6").kendoGrid({
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
                        columns: [{field: "id", title: "#"},{field: "name", title: "Name"},
							{field: "date", title: "Record Added", width: "150px"},
							{
                                title: "Edit",
                                template: kendo.template($("#edit_icon_library").html())
                            },
							{
                                title: "Delete",
                                template: kendo.template($("#delete_icon_library").html())
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