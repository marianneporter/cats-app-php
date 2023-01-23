$( function() {             
    $( "#dob" ).datepicker({
        dateFormat: "d M yy",
        changeMonth: true,
        changeYear: true,
        maxDate: new Date,
        yearRange: "-40:+0"
    });
} );

const catColour = document.querySelector('#colourSelect').dataset.colour; 

const colOptions = document.querySelectorAll('.colour-select option');    

for (let i=1; i<colOptions.length; i++) {

    if (colOptions[i].value === catColour) {
        colOptions[i].selected=true;              
    } else {
        colOptions[i].selected=false;
    }
}

const favFood = document.querySelector('#favFood').dataset.food;   

const foodOptions = document.querySelectorAll('.fav-food-select option');  
 
for (let i=1; i < foodOptions.length; i++) {

    if (foodOptions[i].value === favFood) {
        foodOptions[i].selected=true;              
    } else {
        foodOptions[i].selected=false;
    }
}
