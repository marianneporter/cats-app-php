<?php 
require_once 'includes/header.php'; 

require_once 'utility/dates.php';

// initial handling for first time this page is routed to
function initRegisterDetails() {   
    $user = new \stdClass(); 
    $user->email ="";
    $user->firstName = "";
    $user->lastName = "";
    $user->password ="";
    $user->confirmPassword = "";   
    return $user;
}



function handleSubmittedForm() {    
    $user = new stdClass();   
    $user->email           = isset($_POST['email']) ? 
                             trim($_POST['email']) : '';
    $user->firstName       = isset($_POST['first-name']) ?
                             trim($_POST['first-name']) : '';
    $user->lastName        = isset($_POST['last-name']) ?
                             trim($_POST['last-name']) : '' ;
    $user->password        = isset($_POST['password']) ?
                             trim($_POST['password']) : '';  
    $user->confirmPassword = isset($_POST['confirm-password']) ?
                             trim($_POST['confirm-password']) : '';  


    $errors = array('email' => '',
                    'firstName' => '',
                    'lastName' => '',
                    'password' => '',
                    'confirmPassword' => '');

    if($user->email == '') {
        $errors['email'] = "Email is required";            
    } else {
      
        if(!preg_match('/^([a-z\d\.-]+)@([a-z\d]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/', $user->email)) {
            $errors['email'] = "Please enter a valid email";
        }
    }

    if($user->firstName == '') {
        $errors['firstName'] = "First Name is required";            
    } else {      
        if(!preg_match('/^[a-zA-Z\-\s]+$/', $user->firstName)) {
            $errors['firstName'] ="Please enter a valid first name";
        }
    }

    if($user->lastName == '') {
        $errors['lastName'] = "Last Name is required";            
    } else {      
        if(!preg_match('/^[a-zA-Z\-\s]+$/', $user->lastName)) {
            $errors['lastName'] ="Please enter a valid last name";
        }
    }

    if($user->password == '') {
        $errors['password'] = "Password is required";            
    } else {      
        if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', $user->password)) {
            $errors['password'] ="Password must contain at least 8 characters, 1 letter and 1 number";
        }
    }

    if($user->confirmPassword == '') {
        $errors['confirmPassword'] = "Confirm Password is required";            
    } 

    if($user->password != '' && $user->confirmPassword !='') {
        if ($user->password != $user->confirmPassword) {
            $errors["confirmPassword"] =  "Password and Confirm password do not match";
        }
    }

    return [
        "user" => $user,
        "errors" => $errors
    ];
       
} 


if (isset($_POST['submit'])) {
  
    //handle processing for submitted form

    $submissionResult=handleSubmittedForm();
    $errors = $submissionResult['errors'];  
    $user   = $submissionResult['user'];    

    if (!array_filter($errors)) {
        // add user to users table
        require_once('includes/registerUser.php');
    }
  
} else {

    // handle processing for unsubmitted (freshly displayed form)
    $user=initRegisterDetails();
    $errors = array('email' => '', 'firstName' => '', 'lastName' => '', 'password' => '', 'confirmPassword' => '');
 
}
?>

<div >
    <h3 class="pt-5">Register</h3>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" > 
     
        <div class="mb-3">          
            <label class="form-label">Email</label>
            <input type="text"
                    class="form-control"
                    id="email" name="email"
                    value="<?php echo htmlspecialchars($user->email) ?>">           
            <div class="text-danger"><?php echo $errors['email']?></div>    
        </div>

        <div class="mb-3">           
            <label class="form-label">First Name</label>
            <input type="text" class="form-control"
                id="first-name" name="first-name" 
                value="<?php echo htmlspecialchars($user->firstName) ?>">              
            <div class="text-danger"><?php echo $errors['firstName']?></div>  
        </div>     

        <div class="mb-3">           
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control"
                id="last-name" name="last-name" 
                value="<?php echo htmlspecialchars($user->lastName) ?>">              
            <div class="text-danger"><?php echo $errors['lastName']?></div>              
        </div>

        <div class="mb-3">
            <div>
                <label class="form-label">Password</label>
                <input type="password" class="form-control"
                    id="password" name="password" 
                    value="<?php echo htmlspecialchars($user->password) ?>">                 
            </div>
            <div class="text-danger"><?php echo $errors['password']?></div>              
        </div> 

        <div class="mb-3">
            <div>
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control"
                    id="confirm-password" name="confirm-password" 
                    value="<?php echo htmlspecialchars($user->confirmPassword) ?>">                 
            </div>
            <div class="text-danger"><?php echo $errors['confirmPassword']?></div>              
        </div> 
      
        <button type="submit"
                class="btn btn-success"
                name="submit">Register</button>
     
    </form>
</div>
<?php require_once('includes/footer.php') ?> 