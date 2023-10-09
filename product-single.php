<?php include "header/nav.php" ?>
<?php include "config/config.php" ?>
<?php
	// FOR SINGLE PRODUCT
	
	$prodId = $_GET['prodId'];
	$single_product_query = "SELECT * FROM `products` WHERE prod_id = :prodId";
	$single_product_prepare = $connection->prepare($single_product_query);
	$single_product_prepare->bindParam(':prodId', $prodId);
	$single_product_prepare->execute();
	$single_product = $single_product_prepare->fetch(PDO::FETCH_ASSOC);
	// print_r($single_product);

	// FOR RELATED PRODUCT
	$related_products_query = "SELECT * FROM `products` WHERE prod_id != :prodId and prod_categories = :category";
	$related_products_prepare = $connection->prepare($related_products_query);
	$related_products_prepare->bindParam(':prodId', $prodId);
	$related_products_prepare->bindParam(':category', $single_product['prod_categories']);
	$related_products_prepare->execute();
	$related_products = $related_products_prepare->fetchAll(PDO::FETCH_ASSOC);
	print_r($related_products);
?>

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Product Detail</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> 
				<span>Product Detail</span></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/menu-2.jpg" class="image-popup"><img src="images/<?php echo $single_product['prod_image'] ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $single_product['prod_name'] ?></h3>
    				<p class="price"><span>$<?php echo $single_product['prod_price'] ?></span></p>
    				<p><?php echo $single_product['prod_description'] ?></p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="size" class="form-control">
	                  	<option value="Small">Small</option>
	                    <option value="Medium">Medium</option>
	                    <option value="Large">Large</option>
	                    <option value="eLarge">Extra Large</option>
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="icon-minus"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="icon-plus"></i>
	                 </button>
	             	</span>
	          	</div>
          	</div>
          	<p><a href="cart.html" class="btn btn-primary py-3 px-5">Add to Cart</a></p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Related products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
			<?php foreach($related_products as $products){ ?>
        	<div class="col-md-3">
        		<div class="menu-entry">
					<a href="#" class="img" style="background-image: url(images/<?php echo $products['prod_image'] ?>);"></a>
    					<div class="text text-center pt-4">
    						<h3><a href="#"><?php echo $products['prod_name'] ?></a></h3>
    						<p><?php echo $products['prod_description'] ?></p>
    						<p class="price"><span>$<?php echo $products['prod_price'] ?></span></p>
    						<p><a href="product-single.php?prodId=<?php echo $products['prod_id'] ?>" class="btn btn-primary btn-outline-primary">show</a></p>
    					</div>
				</div>		
        	</div>
			<?php } ?>
		</div>
        </div>
    	</div>
    </section>

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

		const size = document.getElementById('size');
		size.addEventListener('change', ()=>{
			console.log(size.value);
		})
	</script>

    
  </body>
</html>