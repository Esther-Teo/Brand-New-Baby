function updateItemOption() {
    //console.log("no");
    var itemCategory = document.getElementById("requestCategory").value;
    var itemName = document.getElementById("requestItem");
    var itemNameStr = "";

    itemName.innerHTML =``;
    //console.log(itemName);
    if (itemCategory === "clothing") {
        itemNameStr +=`
                <label for="items">Items:</label>
                <input type="text" id="items" name="user_items" class="form-control" placeholder="E.g. Female clothes, Male Clothes">`;
        itemName.innerHTML += itemNameStr;
    } else if (itemCategory === "toys") {
        itemNameStr +=`
                <label for="items">Items:</label>
                <input type="text" id="items" name="user_items" class="form-control"  placeholder="E.g. Soft toys, Rattle toys">`;
        itemName.innerHTML += itemNameStr;

    } else if (itemCategory === "hygiene") {
        itemNameStr += `
                <label for="items">Items:</label>
                <input type="text" id="items" name="user_items" class="form-control"  placeholder="E.g. Baby wipes, Diapers">`;
        itemName.innerHTML += itemNameStr;
    }
}