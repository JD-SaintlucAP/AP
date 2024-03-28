let submit_button = document.querySelector("input[type='submit']");

const postal_code_input = document.querySelector("input[name=code_postal]")
postal_code_input.addEventListener("input", (e) => {
    const value = postal_code_input.value;

    const disabled = value.length !== 5 || [...value].some((e) => {
        return /[0-9]/.exec(e) == null;
    });

    submit_button.disabled = disabled;


});


form.addEventListener("submit", (e) => {
    const postal_code_input = document.querySelector("input[name=code_postal]")
    if (postal_code_input.value.length > 5) {
        error_show("Le code postal ne doit pas dépasser 5 chiffres");
        e.preventDefault();
        return false;
    }

    const tel_input = document.querySelector("input[name=telephone]");
    if (tel_input.value.length > 14) {
        error_show("Le numéro de téléphone ne doit pas dépasser 14 chiffres");
        e.preventDefault();
        return false;
    }
    return true;
});

function error_show(message) {
    let error_p = document.querySelector("#form-error");
    error_p.textContent = message;
    error_p.scrollIntoView();
}