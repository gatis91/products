$(document).ready(function(){   

   // Getting  data for displaying
    $.get( "/product/getProducts", function( data ) {
        // preparing data
        data1=JSON.parse(data) 
        // display data 
        data1.forEach(element => {        
          return $('#productList').append(makeCard(element, cardOptions[element["type"]]))
      });
      });


    // function for making cards
    function makeCard(data, options){
        var SKU=data["SKU"];
        var name=data["name"];
        var price=data["price"];
        var size=data["size"];
        var id=data["id"]
        var $Card=$(`<div class="card border m-1 rounded"  style="width: 250px;"></div>`)
        $Card.append(`<div>
        <input class="m-1 hidechk checkbox1" id="${id}" name="${name}" value="${id}"  type="checkbox">
        </div>`)
        var $cardBody=$(` <div class="card-body text-dark"></div>`)
        $cardBody.append(`<h5 class="text-center">${SKU}</h5>`)
        $cardBody.append(`<h5 class="card-title text-center">${name}</h5>`)
        $cardBody.append(`<p class="card-text text-center">${price} $</p>`)
        $cardBody.append(`<p class="card-text text-center">${options.type} ${size } ${options.unit}</p>`)
        $Card.append($cardBody);
        return $Card
    }

    // optiions for size 
    cardOptions={
        dvd:{
            type: "Size: ",
            unit: "MB"
        },
        book:{
            type: "Weight : ",
            unit: "kg"
        },
        furniture:{
            type: "Dimension : ",
            unit: ""
        },
    }




    // on loading page make default value for option form
    $('#chooseAction').val("nothing")
    // on loading page hide delete button and checkboxes from product cads  
      $("#massDelete, .checkbox1").hide();

    // on option form toggle checkboxes and delete button
    $('#chooseAction').change(function(){        
        actionOptions[$(this).val()].btnopt()
    });

    // toogling checkboxes and delete button
    actionOptions={
        mass:{
            btnopt:function(){
                return $("#massDelete, .checkbox1").show();
            }
        },
        nothing:{
            btnopt:function(){
                return $("#massDelete, .checkbox1").hide();
            }
        }
    }


    // DELELETE DATA
      $('#massDelete').on("click", function(event){
        event.preventDefault();
        // Gett choosed products for delete
        var datatopost=$("#massDeleteForm").serializeArray();
        // making array where store product id
        id_array=[];
        // making object for sending data
        dataToSend={}
        // pushing choosed id's into array
        datatopost.forEach(element => {
            id_array.push(element["value"])
        });
        // making array for sending data
        arrayToSend=[];
        // puttind id and name to object
        dataToSend["name"]="id";
        dataToSend["value"]=id_array;
        // putting object in array for sending data
        arrayToSend.push(dataToSend)
       
              
        $.ajax({            
            url: "/product/massDelete",
            type: "POST",
            data: arrayToSend,            
            success: function(data){                
                if(data){
                    // reload page
                  location.reload();                 
                         
                    
                }            
            },
            error: function(){
                $("#eroor").html("<div class='alert alert-danger'>There was a error with the AJAX call. Please try again later</div>");
            }
            
        })
    });




});
























// function making card for products


