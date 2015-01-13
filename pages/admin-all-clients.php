<?php

$wp_list_table = new ct\CTListTable();

?>
<div class="wrap">
    <h2>
    All Clients
        <a href="<?php print admin_url('admin.php?page=ct-add-new'); ?>" class="add-new-h2">Add New</a>
    </h2>
   
<?php
$wp_list_table->display();
?>

</div>