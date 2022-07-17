<?php 
  	require ("../includes/db.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("main_header.php") ?>
	<link rel="stylesheet" type="text/css" href="../dist/css/kanban.css">
</head>
<body>
	<?php include ("nav_bar.php"); ?>
	<div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
            	<div class="kanban">
            		<div class="kanban_column">
            			<div class="kanban_column_title">
            				Not Started
            			</div>
            			<div class="kanban_items">
            				<div contenteditable="true" class="kanban_item_input">Create a startup</div>
            				<div class="kanban_drop_zone"></div>
            			</div>
            			<button class="kanban_add_item" type="button"> + Add</button>
            		</div>
            	</div>
            </div>
        </div>
    </div>
    <script type="module" src="../dist/js/kanban.js"></script>
</body>
</html>