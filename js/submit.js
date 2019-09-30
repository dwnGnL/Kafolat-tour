function checkIsSubmitted() {
    return window.location.href.indexOf('submited=1') !== -1;
};

function showMessage(text) {
    alert(text);
};

window.addEventListener("load", function() {
    let isSubmitted = checkIsSubmitted();
    // console.log("submitted", isSubmitted);
    if(isSubmitted) {
        showSuccessMessage('Отправлено');
    };
});
