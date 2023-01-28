window.addEventListener('DOMContentLoaded', (event) => {  

    const statusAlert = document.querySelector('.status-alert');  
 
    if (statusAlert) { 
        const urlSearchParams = new URLSearchParams(window.location.search);
        const params = Object.fromEntries(urlSearchParams.entries());  
        let msgIndex = params.msg;
        let name     = params.name;  

        // remove params from url 
        window.history.pushState({}, document.title, window.location.pathname);
 
        let messageText
        if (params.name) {
            messageText = Message.getStatusMessage(name, msgIndex);        
        } else {
            messageText = Message.getAuthMessage(msgIndex);         
        }
 
        if (messageText.toLowerCase().includes('success')) {
            statusAlert.classList.add('status-success')
        } else {
            statusAlert.classList.add('status-danger')
        }

        let messageArea = document.querySelector('#status-msg');                 
        messageArea.innerText = messageText;

        setTimeout(() => { 
            statusAlert.classList.remove('visible');
            statusAlert.classList.add('not-visible');       
        }, 6000)                
    } 
});    
