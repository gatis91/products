
$(document).ready(function(){   
    // event listeners, generate form depending on select type
/*-------------------------------------------
                FORM MAKING                 |
____________________________________________|
*/
    $('.form-check-input').change(function(){
    //    remove old form
        $(".removeForm").remove(); 
    // generate new form  
        generateForm[$(this).val()].forEach(function(element) {
            return $('#formblock').append(makeForm(element))
        });
    
    });

        // values for Forms for different types
var generateForm={
    furniture: [["height", "Enter height"], ["width", "Enter width"],["lenght", "Enter lenght"]],
    dvd: [["dvd", "Enter DVD size"]],
    book:[["book", "Enter book weight" ]],
}
    // function for generate form 
function makeForm(element){
    var inpValue=element[0];
    var labelValue=element[1];
    var $Form=$(`<div class="form-group removeForm" id='${inpValue}'> </div>`)
    $Form.append(`<label for="${inpValue}">${labelValue}:</label>`)
    $Form.append(`<input type="text" class="form-control" id="${inpValue}"  name="${inpValue}" placeholder="${labelValue}">`);
    return $Form;
}




/*-------------------------------------------
                Uploading Form              |
____________________________________________|
*/   
    $('#btnSubmit').on("click", function(event){
        event.preventDefault();
        // getting data from Form
        var datatopost=$("#formUp").serializeArray();
        // preparing data for uploading
        preparingdata[datatopost[3]["value"]].prepareData(datatopost);
              
        // uploading data
        $.ajax({
            
            url: "/product/save",
            type: "POST",
            data: datatopost,
            
            success: function(data){
                // reseting form 
                $('#formUp').trigger("reset");

                if(data){
                    // display success message
                    $("#message").html(`<div class='alert alert-success'>${data}</div>`);
                    
                    
                }            
            },
            // display error message
            error: function(){
                $("#eroor").html("<div class='alert alert-danger'>There was a error with the AJAX call. Please try again later</div>");
            }
            
        })
    });

});

// preparing data for upload
preparingdata={
    dvd:{
        prepareData: function(data){
            
            data[2]["value"]=Number(data[2]["value"]).toFixed(2);
            data[4]["value"]=Number(data[4]["value"]).toFixed(3);
            data[4]["name"]="size"
            return data;

        }
    },
    book:{
        prepareData: function(data){
            data[2]["value"]=Number(data[2]["value"]).toFixed(2);
            data[4]["value"]=Number(data[4]["value"]).toFixed(3);
            data[4]["name"]="size"
            return data;
        }
    },
    furniture:{
        prepareData: function(data){
            data[2]["value"]=Number(data[2]["value"]).toFixed(2);
            data[4]["value"]=Number(data[4]["value"]).toFixed(2);
            data[5]["value"]=Number(data[5]["value"]).toFixed(2);
            data[6]["value"]=Number(data[6]["value"]).toFixed(2);
            size=data[4]["value"]+"x"+ data[5]["value"]+"x"+data[6]["value"]
            data[4]["name"]="size"
            data[4]["value"]=size
            data.pop()
            data.pop()
            return data;
        }
    },
}
    