class Message {
    static longMessages = {
        addSuccess:    "has been successfully added",
        addFailure:    "cannot be added at this time",
        updateSuccess: "has been successfully updated", 
        updateFailure: "cannot be updated at this time",
        deleteSuccess: "has been successfully deleted",
        deleteFailure: "cannot be deleted at this time",
        regSuccess:    "Congratulations! You have registered successfully",
        regFailure:    "Sorry! registration is not currently available" 
    }
    static shortMessages = {
        addSuccess:    "add success",
        addFailure:    "add failed",
        updateSuccess: "update success", 
        updateFailure: "update failed",
        deleteSuccess: "delete success",
        deleteFailure: "delete failed",
        regSuccess:    "register success",
        regFailure:    "register failed" 
    }

    static getMessage = (name, message) => {
        const screenSize = window.screen.width;
        if (screenSize < 768) {
            return `${name}: ${this.shortMessages[message]}`
        } else {
            return `${name} ${this.longMessages[message]}`
        }
    }
}