function changeChoices(firstSelectName, secondSelectName, secondSelectAttrName) {
    let firstSelect = document.querySelector(`select[name=${firstSelectName}]`);

    // hide second select
    window.onload = (_) => {
        document.querySelector(`select[name="${secondSelectName}"]`).style.display = "none";
    };

    firstSelect.addEventListener("change", function () {
        document.querySelector(`select[name="${secondSelectName}"]`).style.display = "block";
        let secondSelectOptions = document.querySelectorAll(`select[name="${secondSelectName}"] option`);
        secondSelectOptions.forEach(element => {
            element.style.display = "none";
        });

        secondSelectOptions = document.querySelectorAll(`select[name="${secondSelectName}"] option[${secondSelectAttrName}="${this.options[this.selectedIndex].getAttribute('value')}"]`);

        // display block of options
        let initValue = document.querySelector(`select[name="${secondSelectName}"] option[value=""]`) // inital value
        initValue.style.display = "block";
        initValue.selected = true; // select inital value

        secondSelectOptions.forEach(function (e) {
            e.style.display = "block";
        });
    });
}
