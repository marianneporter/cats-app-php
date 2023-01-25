window.addEventListener('DOMContentLoaded', (event) => {  

    const statusAlert = document.querySelector('.status-alert');  
 
    if (statusAlert) { 
        const urlSearchParams = new URLSearchParams(window.location.search);
        window.history.pushState({}, document.title, window.location.pathname);

        const params = Object.fromEntries(urlSearchParams.entries());  
        let msgIndex = params.msg;
        let name     = params.name;  

        let messageText
        if (params.name) {
            messageText = Message.getStatusMessage(name, msgIndex);        
        } else {
            messageText = Message.getAuthMessage(msgIndex);         
        }
        
        console.log(messageText);
        if (messageText.toLowerCase().includes('success')) {
            statusAlert.classList.add('status-success')
        } else {
            statusAlert.classList.add('status-danger')
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
