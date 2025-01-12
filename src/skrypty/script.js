document.addEventListener("DOMContentLoaded", function() {
    var btn = document.getElementById("resizeMenuButton");
    btn.addEventListener("click", function() {
        document.body.classList.toggle("sb-expanded");
    });
});

// funkcja pokazująca powiadomienie
function showSnackbar(message) {
    // utworzenie obiektu div
    var div = document.createElement("div");
    div.id = "snackbar";
    div.innerHTML = message;
    document.body.appendChild(div);

    // dodanie klasy, ktora wyswietli powiadomienie
    div.className = "show";
    setTimeout(function(){ div.className = div.className.replace("show", ""); }, 3000);
}

// aplikacja ajax wywołująca skrypt php do dodawania elementów do koszyka oparta na jQuery
function add_to_cart(name, price) {
    const quantity = document.getElementById('quantity'+name);

    $(document).ready(function(){ 
    $.ajax({
        url: "../skrypty/addToCart.php",
        type: "POST",
        data: {
            name: name,
            price: price,
            quantity: quantity.value
        },
        success: function() {
            showSnackbar("Dodano do koszyka.");
            quantity.value = 1;
        },
        error: function(error) { console.log(error); }
    })})
}

// aplikacja ajax wywołująca skrypt php do usuwania elementów z koszyka oparta na jQuery
function remove_from_cart(name) {
    $(document).ready(function(){ 
    $.ajax({
        url: "../skrypty/removeFromCart.php",
        type: "POST",
        data: {
            name: name,
        },
        success: function() {
            location.reload();
            },
        error: function(error) { console.log(error); }
    })})
}

// aplikacja ajax wywołująca skrypt php do czyszczenia koszyka oparta na jQuery
function clear_cart() {
    $(document).ready(function(){ 
    $.ajax({
        url: "../skrypty/clearCart.php",
        type: "POST",
        success: function() {
            location.reload();
            },
        error: function(error) { console.log(error); }
    })})
}