<?php 
require_once 'includes/header.php'; 

require_once 'utility/dates.php';

// initial handling for first time this page is routed to
function initRegisterDetails() {   
    $user = new stdClass; 
    $user->email ="";
    $user->firstName = "";
    $user->lastName = "";
    $user->password ="";
    $user->confirmPassword = "";
   
    return $user;
}



function handleSubmittedForm($id=0) {    
    // $cat = new stdClass();
    // $cat->id      = isset($_POST['id'])   ?  $_POST['id'] : 0;  
    // $cat->name    = isset($_POST['name']) ? $_POST['name'] : '';
    // $cat->dob     = isset($_POST['dob']) && $_POST['dob'] != '' ? DateFunctions::displayToDBFormat($_POST['dob']) : '';
    // $cat->colour  = isset($_POST['colour']) ? $_POST['colour'] : '' ;
    // $cat->favFood = isset($_POST['favFood']) ? $_POST['favFood'] : '';    
    // $errors = array('name' => '', 'dob' => '', 'colour' => '', 'favFood' => '');
 
    // if($cat->name == '') {
    //     $errors['name'] = "Cat's name is required";            
    // } else {
      
    //     if(!preg_match('/^[a-zA-Z\s]+$/', $cat->name)) {
    //         $errors['name'] = "Name must contain only letters and spaces";
    //     }
    // }

    // if($cat->dob=='') {
    //     $errors['dob'] = "Cat's date of birth is required";
    // }  

    // if($cat->colour=='') {        
    //     $errors['colour'] = "Cat's colour is required";
    // } 

    // if($cat->favFood=='') {        
    //     $errors['favFood'] = "Cat's favourite food is required";
    // }  

    // return [
    //     "cat" => $cat,
    //     "errors" => $errors
    // ];
       
} 


if (isset($_POST['submit'])) {
    //handle processing for submitted form

    // $submissionResult=handleSubmittedForm();
    // $errors = $submissionResult['errors'];  
    // $cat    = $submissionResult['cat'];    
    // if (!array_filter($errors)) {
    //     // do add or update for valid cat
    //     require_once('includes/updateDB.php');
    // } 
        echo 'form submitted';
} else {

    // handle processing for unsubmitted (freshly displayed form)
    $user=initRegisterDetails();
    $errors = array('email' => '', 'firstName' => '', 'lastName' => '', 'password' => '', 'repeatPassword' => '');
 
}
?>

<div class="add-update">
    <h3 class="mt-5">Register</h3>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" > 
     
        <div class="mb-3">
            <div>
                <label class="form-label">Email</label>
                <input type="text"
                       class="form-control"
                       id="email" name="email"
                       value="<?php echo htmlspecialchars($user->email) ?>">  
            </div>
            <div class="text-danger"><?php echo $errors['email']?></div>    
        </div>

        <div class="mb-3">
            <div>
                <label class="form-label">First Name</label>
                <input type="text" class="form-control"
                    id="first-name" name="first-name" 
                    value="<?php echo htmlspecialchars($user->firstName) ?>">                 
            </div>
            <div class="text-danger"><?php echo $errors['firstName']?></div>  
        </div>     

        <div class="mb-3">
            <div>
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control"
                    id="last-name" name="last-name" 
                    value="<?php echo htmlspecialchars($user->lastName) ?>">                 
            </div>
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
                    value="<?php echo htmlspecialchars($user->lastName) ?>">                 
            </div>
            <div class="text-danger"><?php echo $errors['lastName']?></div>              
        </div> 
      
        <button type="submit"
                class="btn btn-success"
                name="submit">Register</button>
     
    </form>
</div>
<?php require_once('includes/footer.php') ?> 