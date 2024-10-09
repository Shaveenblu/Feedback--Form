document.getElementById('feedbackForm').onsubmit = function(event) {

const dfgY6785 = document.querySelectorAll('.dfgY6785');
if(dfgY6785.length > 0) {
    const isGroup1Checked_dfgY6785 = Array.from(dfgY6785).some(radio => radio.checked);
    if(!isGroup1Checked_dfgY6785) {
        swal("Please select an option !", "a) Driving and safety ?")
        event.preventDefault();
        return false;
    }
    const irHg4397 = document.querySelectorAll('.irHg4397');

        const isGroup1Checked_irHg4397 = Array.from(irHg4397).some(radio => radio.checked);
        if(!isGroup1Checked_irHg4397) {
            swal("Please select an option !", "b) Punctuality ?")
            event.preventDefault();
            return false;
        }

    const geyU2344 = document.querySelectorAll('.geyU2344');

        const isGroup1Checked_geyU2344 = Array.from(geyU2344).some(radio => radio.checked);
        if(!isGroup1Checked_geyU2344) {
            swal("Please select an option !", "c) Courtesy and friendliness ?")
            event.preventDefault();
            return false;
        }
} else {
    return false;
}
return true;

}
