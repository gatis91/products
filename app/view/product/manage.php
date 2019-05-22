<?php include VIEW.'header.php' ?>



<form id="massDeleteForm" action="">
        <div class="d-flex  justify-content-end mr-5">
       
        <div class="form-group row">
        </div>
            <label  class="col-form-label mr-3" for="">Choose Action:</label>
            <select class="form-control col-md-2" name="" id="chooseAction">
                <option value="nothing" selected>No Action</option>
                <option value="mass">Mass Delete</option>
            </select>
            <button id="massDelete" class="btn btn-danger mr-2"> Delete </button>
           




        </div>

<div class="jumbotron">

    
    <div class="row  d-flex justify-content-left ml-3" id="productList">
   


    </div>
</div>
</form>











<?php include VIEW.'footer.php' ?>
<script src="/assets/js/getProducts.js"></script>