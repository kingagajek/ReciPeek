const search = document.querySelector('input[placeholder="Search recipe"]');
search.addEventListener("keyup", function (event){
    if (event.key === "Enter") {
        event.preventDefault();
        if (this.value === null || this.value === "") {
            window.location.href = "/result";
            return;
        }
        const url = `/result?name=${this.value}`;
        window.location.href = url;
    }
})