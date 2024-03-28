const date_input = document.querySelector("input[name='admission_date']");
const submit_button = document.querySelector("input[type='submit']");

submit_button.disabled = true;

date_input.addEventListener("input", () => {
    const input = new Date(date_input.value);
    const now = new Date();
    const disabled = !input || input <= now;

    submit_button.disabled = disabled;
});
