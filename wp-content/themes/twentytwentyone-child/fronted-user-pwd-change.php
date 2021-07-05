<?php
/**
 * Template Name: Fronted Password Change
 *
*/

global $current_user;

$changepass_status = get_user_meta($current_user->ID, 'user_front_changepass_status', true);

if (!is_super_admin() && $changepass_status != 1) {
    wp_redirect(home_url());
}
get_header();
?>

<article class="change-password-content">          
    <div class = "change-password-messages">
        <p>You must change your password before you can access any part of our website.</p>
    </div>
    <div class = "change-password-form">
        <label for="password"><?php _e('New Password'); ?></label><br />
        <input type="password" class="form-control password1" id="password"/>
       
        <label for="password2"><?php _e('Re-enter New Password'); ?></label><br />
        <input type="password" class="form-control password2" id="password2"/>
        <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
        <input type="submit" name="change-password" value="<?php _e('Change Password'); ?>" class="btn-change-pass" />  
    </div>
</article>
<script type="text/javascript">


jQuery(document).ready(function() {
    
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
 
    jQuery('body').on('click', '.btn-change-pass', function(e) {
        e.preventDefault()
        
        var pwd2 = jQuery('.change-password-form .password2').val();
        if (jQuery('.change-password-form .password1').val() === '') {
            jQuery('.password1').html('<p>Please Enter the Password</p>');
        } else if (jQuery('.change-password-form .password2').val() === '') {
            jQuery('.password2').html('<p>Please Enter the Password</p>');
        } else if (jQuery('.change-password-form .password2').val() !== jQuery('.change-password-form .password1').val()) {
            jQuery(".change-password-messages").html('<p><span></span>&nbsp; Passwords do not match</p>');
        } else {

            jQuery(".change-password-messages").html('<p><img src = "/wpdemo/wp-admin/images/wpspin_light-2x.gif" /></p>');
           
            var data = {
                'action': 'user_fronted_change_password',
                'new_password': pwd2
            };
           
            $.post(ajaxurl, data, function(response) {
                if(response === 'success') {
                    $(".change-password-messages").html('<p class = "bg-success">Password Successfully Changed <br /><a href = "<?php echo home_url(); ?>">Click here to continue</a></p>');
                    $('.change-password-form').hide(); 
                } else if (response === 'error') {
                    $(".change-password-messages").html('<p class = "bg-danger"><span></span>&nbsp; Error Changing Password</p>');
                    $('.change-password-form').show(); 
                }
            });
        }
    });
});
</script>

<?php get_footer(); ?>