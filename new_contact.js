window.onload = function () {
    var save = document.querySelector("#button");

    save.addEventListener("click", process);

    function process(e) {
        alpha = /^[A-Za-z]+$/;
        numbers = /^[0-9]+$/;
        emailcheck = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let valid = 0;
        e.preventDefault();
        var title = document.querySelector("#title").value;
        var fname = document.querySelector("#fname").value.trim();
        var lname = document.querySelector("#lname").value.trim();
        var email = document.querySelector("#email").value.trim();
        var phone = document.querySelector("#phone").value.trim();
        var company = document.querySelector("#company").value.trim();
        var type = document.querySelector("#type").value;
        var assignedto = document.querySelector("#assignedto").value;

        console.log(title, fname, lname, email, phone, company, type, assignedto);

        if (!fname.match(alpha)) {
            document.querySelector("#fname").style.borderColor = "red";
            return;
        } else {
            console.log("First name worked");
            valid = valid + 1;
            document.querySelector("#fname").style.borderColor = "black";
        }

        if (!lname.match(alpha)) {
            document.querySelector("#lname").style.borderColor = "red";
            return;
        } else {
            console.log("Last name worked");
            valid = valid + 1;
            document.querySelector("#lname").style.borderColor = "black";
        }

        if (!email.match(emailcheck)) {
            document.querySelector("#email").style.borderColor = "red";
            return;
        } else {
            console.log("Email worked");
            valid = valid + 1;
            document.querySelector("#email").style.borderColor = "black";
        }

        if (!phone.match(numbers)) {
            document.querySelector("#phonenum").style.borderColor = "red";
            return;
        } else {
            console.log("Phone number worked");
            valid = valid + 1;
            document.querySelector("#phone").style.borderColor = "black";
        }

        if (!company.match(alpha)) {
            document.querySelector("#company").style.borderColor = "red";
            return;
        } else {
            console.log("Company worked");
            valid = valid + 1;
            document.querySelector("#company").style.borderColor = "black";
        }

        if (valid == 5) {
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("show").innerHTML = this.responseText;
                    alert("Saved!");
                } else {
                    document.getElementById("show").innerHTML =
                        "There was a problem with the request";
                }
            };
            xhr.open(
                "POST",
                'new_contact.php',
                true
            );

            const formData = new FormData();
            formData.append('fname', fname);
            formData.append('lname', lname);
            formData.append('email', email);
            formData.append('company', company);
            formData.append('phone', phone);
            formData.append('type', type);
            formData.append('assignedto', assignedto);
            formData.append('title', title);

            xhr.send(formData);
        }
    }
};
