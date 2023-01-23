<div class="visible alert status-alert <?php echo $class ?>" role="alert" >
    <span id="status-msg"></span>
</div>


<script src="js/messages.js"></script>
    
    <script>

        window.addEventListener('DOMContentLoaded', (event) => {
            let statusAlert = document.querySelector('.alert');   
            if (statusAlert) {
                    let msgIndex = '<?php echo $_GET['msg'] ?>';
                    let name     = '<?php echo $_GET['name'] ?>';   
                    let messageText = Message.getMessage(name, msgIndex);
                   
                    if (messageText.toLowerCase().includes('success')) {
                        statusAlert.classList.add('alert-success')
                    } else {
                        statusAlert.classList.add('alert-danger')
                    }

                    let messageArea = document.querySelector('#status-msg');                 
                    messageArea.innerText = messageText;
            
                    setTimeout(() => { 
                        statusAlert.classList.remove('visible');
                        statusAlert.classList.add('not-visible');       
                    }, 1000)                
            } 
        });    


    </script>

