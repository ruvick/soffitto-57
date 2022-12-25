// Валидация формы
function form_validation(form) {
    let valid_form = true

    let all_form_input = form.querySelectorAll("input:required")

    for (let i = 0; i < all_form_input.length; i++) {
        if (all_form_input[i].value == "") {
            valid_form = false
            all_form_input[i].classList.add("_error")
            all_form_input[i].addEventListener("focus", (e) => {
                all_form_input[i].classList.remove("_error")
            })
        }
    }

    return valid_form;
}

// создание списка полей

function get_form_comment(form) {
    let fieeld_name = {
        "all": []
    }

    let all_form_input = form.querySelectorAll("input")

    for (let i = 0; i < all_form_input.length; i++) {
        let tm = { "fild": all_form_input[i].name, "val": all_form_input[i].dataset.valuem };
        fieeld_name.all.push(tm)
    }

    return fieeld_name;
}

document.addEventListener("DOMContentLoaded", () => {
    let all_send_btn = document.querySelectorAll(".new_send_btn")

    for (let i = 0; i < all_send_btn.length; i++) {
        all_send_btn[i].addEventListener("click", function (e) {
            e.preventDefault()
            let form_id = all_send_btn[i].dataset.formid;
            var form = document.getElementById(form_id);
            var data = new FormData(form);

            if (form_validation(form)) {
                // let comment = JSON.stringify(get_form_comment(form))
                // console.log(comment)  

                let all_form_input = form.querySelectorAll("input")

                for (let i = 0; i < all_form_input.length; i++) {
                    data.append('fildname[]', all_form_input[i].name);
                    data.append('fildval[]', all_form_input[i].dataset.valuem);
                }

                data.append('action', "newsendr");
                data.append('nonce', allAjax.nonce);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", allAjax.ajaxurl, true);

                xhr.onload = function () {
                    form.getElementsByClassName("headen_form_blk")[0].style.display = "none";
                    form.getElementsByClassName("SendetMsg")[0].style.display = "block";
                    console.log("SEND!")
                    console.log(xhr.response)
                };

                xhr.send(data);

            }


        })
    }
})