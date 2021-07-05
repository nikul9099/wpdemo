<?php
/**
* Template Name: Custom Demo Form
*/
get_header(); 
?>
<form class="customform" id="customform" method="post" >
    <h2>Add Detail</h2>
    <div class="form-control">
    	<label for="">Name</label>
    	<input type="text" placeholder="First Name" name="fname" id="fname">
	</div>
	 <div class="form-control">
    	<label for="">Last Name</label>
        <input type="text" placeholder="Last Name" name="lname" id="lname">
    </div>
    <div class="form-control">
        <label for="">Email</label>
    	<input type="text" placeholder="Email" name="email" id="email">
	</div>
 	<div class="form-control">
		<label for="">Phone No</label>
        <input type="text" placeholder="Phone" name="phone" id="phone">
	</div>
 	<div class="form-control">
    	<label for="">Comment</label>
    	<textarea name="message" id="message" cols="30" rows="5" id="message" style="width: auto;"></textarea>
	</div>
 	<div class="form-control">
    	<input type="submit" value="submit" name="submit" id="btnsave">
	</div>
</form>
<?php echo do_shortcode('[greeting]'); ?>
<script type="text/javascript">
jQuery('#customform').on('submit', function(e){
	e.preventDefault();
var fname = jQuery('#fname').val();
var lname = jQuery('#lname').val();
var email = jQuery('#email').val();
var phone = jQuery('#phone').val();
var message = jQuery('#message').val();
// calling ajax
$.ajax({
    type: 'POST',
    dataType: 'json',
 	url: "<?php echo admin_url('admin-ajax.php'); ?>", 
    data: { 
        'action' : 'custom_demo_frm',
        'fname': fname,
        'lname': lname,
        'email': email,
        'phone': phone,
        'message': message,  
    },
    success: function(data){
    	//console.log(data);
    	
        if (data.res == true){
            alert(data.message);    // success message
        }else{
            alert(data.message);    // fail
        }
    }
});
});
</script>

<?php get_footer(); ?>