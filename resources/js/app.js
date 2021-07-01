import './form';
if(document.querySelector(".alert-system") != null) {
    document.querySelectorAll(".alert-system").forEach(item => {
        setTimeout(function() {
            item.classList.add('d-none');
        }, 5000)
    })
}
