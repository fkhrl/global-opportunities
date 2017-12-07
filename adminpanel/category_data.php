<?php
$table="category"; ?><?php 
include('class/auth.php');
include('plugin/plugin.php');
$plugin=new cmsPlugin(); 
if (isset($_GET['del'])) {
    // print_r($_GET['del']);
    // exit();
    $delarray = array("id" => $_GET['del']);
    $photolink = $obj->SelectAllByVal($table, 'id', $_GET['id'], 'photo');
    @unlink("upload/" . $photolink);
    if ($obj->delete($table, $delarray) == 1) {
        $plugin->Success("Successfully Delete", $obj->filename());
    } else {
        $plugin->Error("Failed", $obj->filename());
    }
}
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
         <link rel="stylesheet" href="editor/draw-table/tablednd.css" type="text/css"/>
    </head>
    <body class="">
		<?php 
		include('include/topnav.php'); 
		include('include/mainnav.php'); 
		?>
        <div id="content">
        	<h1 class="content-heading bg-white border-bottom">Category Data</h1>
            <div class="innerAll bg-white border-bottom">
                <ul class="menubar">
                    <li><a href="category.php">Create New Category</a></li>
                    <li class="active"><a href="#">Category Data List</a></li>
                </ul>
            </div>
          <div class="innerAll spacing-x2">
                <!-- <div class="col-sm-12" id="category_3"></div> -->
                <?php echo $plugin->ShowMsg(); ?>
<style type="text/css" media="screen">
 #DataTables_Table_0_wrapper{width: 100%} 
</style>
<table  class="display nowrap example" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                            $category = $obj->FlyQuery("SELECT * FROM `category` order by `priority`");

                            if(!empty($category)){
                                foreach ($category as $pro) {
                          ?>
                        <tr id="pr_<?=$pro->id?>">
                        
                          <td><?= $pro->id;?></td>
                          <td><?= $pro->name;?></td>
                          <td><?= $pro->date;?></td>
                          <td>
                             <a class="k-button k-button-icontext k-grid-edit" href="category.php?edit=<?= $pro->id; ?>"><span class="k-icon k-edit"></span>Edit</a>
                              <a class="k-button k-button-icontext k-grid-delete" href="scategory_data.php?del=<?= $pro->id; ?>" ><span class="k-icon k-delete"></span>Delete</a>
                          </td>
                          
                        </tr>
                        <?php
                                }
                            }    
                          ?>
            
        </tbody>
    </table>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <style type="text/css">
        tr{

        }
        div.dataTables_wrapper {
        width: 1000px;
        margin: 0 auto;
    }
    th,td{
          max-width:110px !important;
word-wrap: break-word
          }
          tr{
            cursor: move;
          }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
    $('.example').DataTable( {
        "scrollX": true,
        "order":false,
        "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
    "pageLength": 25
    } );
} );
    </script>
<script src='https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js' type="text/javascript"></script>

<script language = "Javascript">
$(document).ready(function(){

    $(function() {

        $('table').sortable({
            items: 'tr',
            opacity: 0.6,
            axis: 'y',
            stop: function (event, ui) {
                var data = $(this).sortable('serialize');
                //alert(data);
                $.ajax({
                 data: data,
                 type: 'POST',
                 url: 'ajax/category_drag_table.php'
                 });
            }
        });
    });

});


</script>
            </div>
        </div>
        <!-- // Category END -->

        <div class="clearfix"></div>
        <!-- // Sidebar menu & Category wrapper END -->
        
        <?php include('include/footer.php'); ?>
        <!-- // Footer END -->
    </div>
    <!-- // Main Container Fluid END -->
    <!-- Global -->
    <script id="edit_category" type="text/x-kendo-template">
             <a class="k-button k-button-icontext k-grid-edit" href="category.php?edit=#= id#"><span class="k-icon k-edit"></span>Edit</a>
            </script>
    <script id="delete_category" type="text/x-kendo-template">
                    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteClick(#= id #);" ><span class="k-icon k-delete"></span>Delete</a>
            </script>        
    <script type="text/javascript">
                function deleteClick(category_id) {
                    var c = confirm("Do you want to delete?");
                    if (c === true) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "./controller/category_controller.php",
                            data: {id: category_id,table:"category",acst:3},
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
                                url: "./controller/category_controller.php",
                                type: "POST",
								data:
								{
									"acst":1, //action status sending to json file
									"table":"category",
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
                    jQuery("#category_3").kendoGrid({
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
                                template: kendo.template($("#edit_category").html())
                            },
							{
                                title: "Delete",
                                template: kendo.template($("#delete_category").html())
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