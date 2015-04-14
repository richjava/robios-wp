<?php
    if(isset($_POST['css_settings']) && $_POST['css_settings'] == "Save CSS Settings")
    {
        update_option('custome_css', $_POST['cssOption']);
        $css = "\n".$_POST['cssOption'];
        
        $css_file = 'custom.css';
        
        WP_Filesystem();
        global $wp_filesystem;
        if(!$wp_filesystem->put_contents(get_template_directory().'/RMS/Framework/assets/css/selfCreated/'.$css_file, $_POST['cssOption'], FS_CHMOD_FILE)) {
            echo 'Generating CSS error!';
        }
        
        $url = admin_url().'themes.php?page=rms_theme_option&CPart=css_option';
        echo "<script>window.location= '".$url."'</script>";
    }
    
    if(isset($_GET['reset']) && $_GET['reset'] == 'reset_css')
    {
        delete_option('custome_css');
        $css = "\n ";
         
        $css_file = 'custom.css';
        
        WP_Filesystem();
        global $wp_filesystem;
        if(!$wp_filesystem->put_contents(get_template_directory().'/RMS/Framework/assets/css/selfCreated/'.$css_file, $_POST['cssOption'], FS_CHMOD_FILE)) {
            echo 'Generating CSS error!';
        }
        
        $url = admin_url().'themes.php?page=rms_theme_option&CPart=css_option';
        echo "<script>window.location= '".$url."'</script>";
    }
?>
<form method="post" name="general" enctype="multipart/form-data" action="">
<table class="wp-list-table widefat fixed posts" cellspacing="0">
    <tr>
        <th>
            CSS Settings
        </th>
    </tr>
    <tr>
        <td>
            <p class="rmsnotic"><i class="up_icon fa fa-indent"></i> Write your Custom CSS here.</p>
            <textarea style="height: 200px" id="code" name="cssOption"><?php echo get_option('custome_css', false); ?></textarea>
        </td>
    </tr>
</table>
<div class="submit_area">
    <a href="<?php echo admin_url().'themes.php?page=rms_theme_option&CPart=css_option&reset=reset_css'; ?>">Default Options</a>
    <input type="submit" value="Save CSS Settings" name="css_settings"/>
</div>
</form>