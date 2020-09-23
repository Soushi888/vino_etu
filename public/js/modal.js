function modal() {
    let modal = document.getElementById("my_modal");
    let btn = document.querySelectorAll("#btn_modal_window");
    let span = document.getElementsByClassName("close_modal_window")[0];

    for (let i = 0; i < btn.length; ++i) {
        btn[i].onclick = function () {
            modal.style.display = "block";
        }
    }

    span.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}