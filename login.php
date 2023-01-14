<?php 
require_once 'includes/header.php'; 

require_once 'utility/dates.php';

// initial handling for first time this page is routed to
function initLoginDetails() {   
    $loginCreds = new \stdClass(); 
    $loginCreds->email ="";
    $loginCreds->password ="";
    
    return $loginCreds;
}

function handleSubmittedForm() {    
    $loginCreds = new stdClass();   
    $loginCreds->email           = isset($_POST['email']) ? 
                             trim($_POST['email']) : ''; 
    $loginCreds->password        = isset($_POST['password']) ?
                             trim($_POST['password']) : '';  
 


    $errors = array('email' => '',                
                    'password' => '',
    );

    if($loginCreds->email == '') {
        $errors['email'] = "Please enter email";            
    } else {
      
        if(!preg_match('/^([a-z\d\.-]+)@([a-z\d]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $loginCreds->email)) {
            $errors['email'] = "Please enter a valid email";
        }
    }

    if($loginCreds->password == '') {
        $errors['password'] = "Password is required";            
    } 
 
    return [
        "user" => $loginCreds,
        "errors" => $errors
    ];
       
} 


if (isset($_POST['submit'])) {
  
    //handle processing for submitted form

    $submissionResult=handleSubmittedForm();
    $errors = $submissionResult['errors'];  
    $loginCreds   = $submissionResult['user'];    

    if (!array_filter($errors)) {
        // add complete login on db
        require_once('includes/loginUser.php');
    }
  
} else {

    // handle processing for unsubmitted (freshly displayed form)
    $loginCreds=initLoginDetails();
    $errors = array('email' => '', 'password' => ''); 
}
?>

<div class="content pt-5">
    <h3>Login</h3>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" > 
        
        <div class="mb-3">
            <div>
                <label class="form-label">Email</label>
                <input type="text"
                        class="form-control"
                        id="email" name="email"
                        value="<?php echo htmlspecialchars($loginCreds->email) ?>">  
            </div>
            <div class="text-danger"><?php echo $errors['email']?></div>    
        </div>


        <div class="mb-3">
            <div>
                <label class="form-label">Password</label>
                <input type="password" class="form-control"
                    id="password" name="password" 
                    value="<?php echo htmlspecialchars($loginCreds->password) ?>">                 
            </div>
            <div class="text-danger"><?php echo $errors['password']?></div>              
        </div> 
        
        <button type="submit"
                class="btn btn-success"
                name="submit">Login</button>
        
    </form>
</div>




<?php require_once('includes/footer.php') ?> 