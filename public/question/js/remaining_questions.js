document.getElementById('feedbackForm').onsubmit = function(event) {

    const iusr8922 = document.querySelectorAll('.iusr8922');
    if(iusr8922.length > 0) {
        const isGroup1Checked_iusr8922 = Array.from(iusr8922).some(radio => radio.checked);
        if(!isGroup1Checked_iusr8922) {
            swal("Please select an option !", "7. HOW DO YOU RATE YOUR OVERALL HOLIDAY ?")
            event.preventDefault();
            return false;
        }
    }
    return true;

}
