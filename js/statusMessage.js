window.addEventListener('DOMContentLoaded', (event) => {  

    const statusAlert = document.querySelector('.alert');  
 
    if (statusAlert) {
        const urlSearchParams = new URLSearchParams(window.location.search);
        window.history.pushState({}, document.title, window.location.pathname);

        const params = Object.fromEntries(urlSearchParams.entries());  
        let msgIndex = params.msg;
        let name     = params.name;  

        let messageText
        if (params.name) {
            messageText = Message.getStatusMessage(name, msgIndex);
            console.log('going for normal status message')
 
        } else {
            messageText = Message.getAuthMessage(msgIndex);
            console.log('going forauth status message');
       
        }
        
        console.log(messageText);
        if (messageText.toLowerCase().includes('success')) {
            statusAlert.classList.add('alert-success')
        } else {
            statusAlert.classList.add('alert-danger')
        }

        let messageArea = document.querySelector('#status-msg');                 
        messageArea.innerText = messageText;

        setTimeout(() => { 
            console.log('setting visiblesand invisibles');
            statusAlert.classList.remove('visible');
            statusAlert.classList.add('not-visible');       
        }, 8000)                
    } 
});    
