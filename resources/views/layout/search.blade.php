<script>
  var buttonUp = () => {
    const cards = document.getElementsByClassName("card");
    let filter = document.querySelector(".form-control").value
    for (let i = 0; i < cards.length; i++) {
        let title = cards[i].querySelector(".card-body");
        if (title.innerText.indexOf(filter) > -1) {
            cards[i].classList.remove("d-none") //d-none is used to hide an element
        } else {
            cards[i].classList.add("d-none")
        }
    }
}
</script> 