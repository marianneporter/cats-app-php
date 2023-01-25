class Message {
    static longStatusMessages = {
        addSuccess:    "has been successfully added",
        addFailure:    "cannot be added at this time",
        updateSuccess: "has been successfully updated", 
        updateFailure: "cannot be updated at this time",
        deleteSuccess: "has been successfully deleted",
        deleteFailure: "cannot be deleted at this time",

    }
    static shortStatusMessages = {
        addSuccess:    "add success",
        addFailure:    "add failed",
        updateSuccess: "update success", 
        updateFailure: "update failed",
        deleteSuccess: "delete success",
        deleteFailure: "delete failed",
 
    }

    static authMessages = {
        regSuccess: "Register Success - Please Login"     
    }

    static getStatusMessage = (name, message) => {
        const screenSize = window.screen.width;
        if (screenSize < 768) {
            return `${name}: ${this.shortStatusMessages[message]}`
        } else {
            return `${name} ${this.longStatusMessages[message]}`
        }
    }

    static getAuthMessage = (message) => {
        return this.authMessages[message];
    }
}