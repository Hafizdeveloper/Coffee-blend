<?php include "header/nav.php" ?>
<?php include "config/config.php" ?>

<?php
	$fetch_registered_user = "SELECT * FROM `register_user`";
	$fetch_registered_prepare = $connection->prepare($fetch_registered_user);
	$fetch_registered_prepare->execute();
	$registered_user_data = $fetch_registered_prepare->fetchAll(PDO::FETCH_ASSOC);
	// print_r($registered_user_data);

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$isEmailNotExist = false;

		if(empty($username) || empty($email) || empty($password)){
			echo "<script>alert('Kindly fill all the fields')</script>";
		}else{
			foreach($registered_user_data as $user){
				if($email === $user['user_email']){
					echo "<script>alert('Your email already in use')</script>";
					return;
				}else{
					$isEmailNotExist = true;
				}
			}
			if($isEmailNotExist){
				$hash_password = password_hash($password, PASSWORD_BCRYPT);
		
				// echo "<script>alert('hello')</script>";
		
				$register_user_querry = "INSERT INTO `register_user`(`user_name`, `user_email`, `user_password`) VALUES (:username, :email, :password)";
				$register_user_querry_prepare = $connection->prepare($register_user_querry);
				$register_user_querry_prepare->bindParam(':username', $username);
				$register_user_querry_prepare->bindParam(':email', $email);
				$register_user_querry_prepare->bindParam(':password', $hash_password);
				$register_user_querry_prepare->execute();
			}
		}
	}
?>
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Register</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Register</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate">
			<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5">
				<h3 class="mb-4 billing-heading">Register</h3>
	          	<div class="row align-items-end">
                 <div class="col-md-12">
                        <div class="form-group">
                            <label for="Username">Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                 </div>
	          	  <div class="col-md-12">
	                <div class="form-group">
	                	<label for="Email">Email</label>
	                  <input type="text" name="email" class="form-control" placeholder="Email">
	                </div>
	              </div>
                 
	              <div class="col-md-12">
	                <div class="form-group">
	                	<label for="Password">Password</label>
	                    <input type="password" name="password" class="form-control" placeholder="Password">
	                </div>

                </div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
							<div class="radio">
                                <button type="submit" name="submit" class="btn btn-primary py-3 px-4">Register</button>
						    </div>
					</div>
                </div>

	          </form><!-- END -->
          </div> <!-- .col-md-8 -->
          </div>
        </div>
      </div>
    </section> <!-- .section -->

<?php include "header/footer.php" ?>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		            // Increment
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });   
		});
	</script>  
  </body>
</html>