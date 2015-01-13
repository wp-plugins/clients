<?php
$post_types = get_post_types( '', 'names' ); 
?>

<div class="wrap">
    <h2>
        Clients - Settings
    </h2>
    
    <div id="message" class="updated below-h2 ct-msg ct_success_msg">
        <p>Settings have been saved.</p>
    </div>
    <div id="message" class="error below-h2 ct-msg ct_error_msg">
        <p>Oops something went wrong! Settings couldn't been saved.</p>
    </div>
    <div class="tbox">
        <div class="tbox-heading">
            <h3>Clientele </h3>
            <a href="http://labs.think201.com/clients" target="_blank" class="pull-right">Need help?</a>
        </div>
        <div class="tbox-body">
            <form name="ct_add_form" id="ct_add_form" action="#" method="post">             
                    <input type="hidden" name="action" value="page_add_new">
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">
                                <label for="name">Name:</label>
                        </td>
                        <td>
                            <input type="text" id="name" name="name" placeholder="Client Name" class="regular-text">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                               <label for="description">Description:</label>
                        </td>
                        <td>
                                <textarea rows="4" cols="50" id="description" name="description" placeholder="Client Description"></textarea>
                        </td>
                    </tr>                   
                    <tr valign="top">
                        <th scope="row">
                                <label for="url">URL:</label>
                        </td>
                        <td>
                            <input type="text" id="url" name="url" placeholder="URL of Client's website" value="" class="regular-text">                         
                        </td>
                    </tr>                   
                    <tr valign="top">
                        <th scope="row">
                                <label for="logo">Logo:</label>
                        </td>
                        <td>
                            <input type="text" id="logo" name="logo" placeholder="Client Logo" class="regular-text">                                
                                <input id="upload_logo" class="button" type="button" value="Upload Logo" />                             
                        </td>
                    </tr>                   
                    <tr valign="top">
                        <th scope="row">
                                <label for="category">Category:</label>
                        </td>
                        <td>
                                 <select name="category">
                                    <option value="">Select a Post Type</option>
                                    <?php
                                    foreach ( $post_types as $post_type ) 
                                    {
                                    ?>
                                        <option value="<?php echo $post_type;?>"><?php echo $post_type;?></option>
                                    <?php
                                    }   
                                    ?>                           
                                    
                                </select>
                        </td>
                    </tr>                   
                    <tr valign="top">
                        <th scope="row">
                                <label for="url">Featured:</label>
                        </td>
                        <td>
                                <input type="checkbox" name="isfeatured" id="isfeatured" value="1">Is Featured?<br>
                        </td>
                    </tr>                   
                </table>
                <p class="submit">      
                <button onClick="CTForm.post('#ct_add_form')" class="button button-primary" type="button">Add Client</button>
                </p>
            </form>
        </div>

        <div class="tbox-footer">
          Add client details. Make sure your cross check the details provided.
        </div>
    </div>
</div>
