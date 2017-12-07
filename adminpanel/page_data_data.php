<?php
$table="page_data"; ?><?php 
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
        	<h1 class="content-heading bg-white border-bottom">Page Data Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="page_data.php">Create New Page Data</a></li>
                    <li class="active"><a href="#">Page Data Data List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
                <div class="col-sm-12" id="page_data_17"></div>
            </div>
        </div>
        <!-- // Page Data END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Page Data wrapper END -->
        
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_page_data" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-edit" href="page_data.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
            </script>
    <script id="delete_page_data" type="text/x-kendo-template">
                    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
            </script>        
    <script type="text/javascript">
                function deleteClick(page_data_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./controller/page_data_controller.php",
                            data: {id: page_data_id,table:"page_data",acst:3},
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
            <script type="text/javascript" id="ob-template">
                jQuery(document).ready(function () {
					var postarray={"id":1};
                    var dataSource = new kendo.data.DataSource({
                        pageSize: 5,
                        transport: {
                            read: {
                                url: "./controller/page_data_controller.php",
                                type: "POST",
								data:
								{
									"acst":1, //action status sending to json file
									"table":"page_data",
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
                                    id: {nullable: true},category_id: {type: "string"},subcategory_id: {type: "string"},photo: {type: "string"},details: {type: "string"},
									date: {type: "string"}
                                }
                            }
                        }
                    });
                    jQuery("#page_data_17").kendoGrid({
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
                        columns: [{field: "id", title: "#", width: "50px"},
                        {field: "category_id", title: "Category ID", width: "100px"},
                        {field: "subcategory_id", title: "SubCategory ID", width: "100px"},
                        {field: "photo", title: "Photo", width: "100px"},
                        {field: "details", title: "Details",  width: "250px"},
							{field: "date", title: "Record Added", width: "100px"},
							{
                                title: "Edit", width: "100px",
                                template: kendo.template($("#edit_page_data").html())
                            },
							{
                                title: "Delete", width: "100px",
                                template: kendo.template($("#delete_page_data").html())
                            }
                        ]
                    });
                });
//encoded: false,
            </script>    
    <?php 
	echo $plugin->TableJs(); 
	echo $plugin->KendoJS(); 
	?>
    <style>
      td{
        max-width: 100px;
        max-height: 100px !important;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
      }

    </style>
</body>
</html>