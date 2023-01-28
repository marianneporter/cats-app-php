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

let originalData = null;

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

function formChanged(event) {
    
    let formState = $('form').serialize();   
    if (formState == originalData) {
        createStatusMessageElement();
        return false;
    } else {
        return true;
    }   
}

window.addEventListener('DOMContentLoaded', (event) => { 
    originalData = $('form').serialize();   
});

const createStatusMessageElement = async () => {

    const submitBtn = document.querySelector('.btn.btn-success');
    submitBtn.disabled = true;

    let test = Message.test;
    console.log(test);
    let test2 = Message.getClientMessage('emptyAddUpdateForm');
    console.log(test2);
   
    const errorDiv = document.createElement('div'); 
    errorDiv.id='error-div';    
    errorDiv.innerText= Message.getClientMessage('emptyAddUpdateForm');

    //add status message div and classes to dom
    let messageArea =  document.querySelector('.message-area');
    messageArea.appendChild(errorDiv);   
    messageArea.classList.add('not-visible', 'status-alert', 'status-warning');
  
    // transition message in and out
    await sleep(500);
    doAnimation(messageArea, 'not-visible', 'visible');  
    await sleep(6000);
    doAnimation(messageArea, 'visible', 'not-visible');   
    await sleep(5000);

    messageArea.removeChild(errorDiv);
    submitBtn.disabled = false;
 
}

const doAnimation =  (messageArea, removeClass, addClass) => { 
        messageArea.classList.remove(removeClass);
        messageArea.classList.add(addClass);     
}

const sleep = async (timeDelay) => {
    return new Promise((resolve) => {
        let timeoutId = setTimeout(() => resolve(true), timeDelay);       
    })
}

