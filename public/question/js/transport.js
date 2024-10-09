document.getElementById('feedbackForm').onsubmit = function(event) {

const i8V0EbkNtG = document.querySelectorAll('.i8V0EbkNtG');

if(i8V0EbkNtG.length > 0) {
    const isGroup1Checked_i8V0EbkNtG = Array.from(i8V0EbkNtG).some(radio => radio.checked);
    if(!isGroup1Checked_i8V0EbkNtG) {
        swal("Please select an option !", "a) Mechanical Condition ?")
        event.preventDefault();
        return false;
    }
    const nerihu256 = document.querySelectorAll('.nerihu256');

        const isGroup1Checked_nerihu256 = Array.from(nerihu256).some(radio => radio.checked);
        if(!isGroup1Checked_nerihu256) {
            swal("Please select an option !", "b) Cleanliness ?")
            event.preventDefault();
            return false;
        }

    const jhBd87327 = document.querySelectorAll('.jhBd87327');

        const isGroup1Checked_jhBd87327 = Array.from(jhBd87327).some(radio => radio.checked);
        if(!isGroup1Checked_jhBd87327) {
            swal("Please select an option !", "c) Public addressing system ?")
            event.preventDefault();
            return false;
        }
} else {
    return false;
}
return true;


}
