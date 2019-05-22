<?php include VIEW.'header.php' ?>
    

    <div  class="container formContainer">
        <h1 class="pt-3 text-center">Add Product </h1>
        <div id="eroor"></div>
        <div id="message" class="aler alert-success"></div>
        <form method="POST"  action=""   id="formUp">            
            <div class="form-group ">
                    <label for="sku" class=" col-form-label">Product SKU</label>               
                    <input  type="text" class="form-control" id="sku"  name="sku" placeholder="Enter SKU Number">                
            </div>
            <div class="form-group ">
                    <label for="name" class=" col-form-label">Poduct Name</label>               
                    <input  type="text" class="form-control" id="name"  name="name" placeholder="Enter Product Name">                
                </div>
            <div class="form-group ">
                <label for="price" class=" col-form-label">Product Price</label>               
                <input  type="number" step=0.01 class="form-control" id="price"  name="price" placeholder="Enter Price">                
            </div>


            <!-- radio buttons -->
            <div>
                <h4>Choose Product type:</h4>

                <div class="form-check ">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="dvd">
                    <label class="form-check-label" for="inlineRadio1">Size (in MB) for DVD-disc</label>
                </div>
                <div class="form-check ">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="book">
                    <label class="form-check-label" for="inlineRadio2">Weight (in Kg) for Book </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="furniture" >
                    <label class="form-check-label" for="inlineRadio3">Dimensions (HxWxL in mm) for furniture</label>
                </div>
            </div>
            <!-- into this div will going choosed form -->
            <div id="formblock" class="pt-2">
                


            </div>
            <div class="form-group pb-5">
                <button type="submit" name="submit1"  id="btnSubmit" value="submit1223" class="btn btn-primary">Add Product</button>
            </div>
            
        </form> 
    </div >
    

    <?php include VIEW.'footer.php' ?>