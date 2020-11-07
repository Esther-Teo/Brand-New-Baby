//console.log("hi");

function updateItemOption() {
    //console.log("no");
    var itemCategory = document.getElementById("donationCategory").value;
    var itemName = document.getElementById("donationItem");
    var itemNameStr = 
        `<h4>What item?</h4>
        <select name="donation_item" required>
            <option value="" disabled selected>Select your item</option>`;

    itemName.innerHTML =``;
    //console.log(itemName);
    if (itemCategory === "clothing") {
        itemNameStr +=`
                <option value="female_clothing">Female Clothes</option>
                <option value="male_clothing">Male Clothes</option>
                <option value="unisex_clothing" >Unisex Clothes</option>
            </select>`;
        itemName.innerHTML += itemNameStr;
    } else if (itemCategory === "toys") {
        itemNameStr +=`
                <option value="books">Baby Books</option>
                <option value="softToys">Soft Toys</option>
                <option value="bathToys">Bath Toys</option>
            </select>`;
        itemName.innerHTML += itemNameStr;

    } else if (itemCategory === "hygiene") {
        itemNameStr += `
                <option value="babyWipes" >Baby Wipes</option>
                <option value="diapers">Diapers</option>
                <option value="bib">Bib</option>
            </select>`;
        itemName.innerHTML += itemNameStr;
    }
    document.getElementById("itemQuantity").innerHTML=`
        <input type="text" name="itemQuantity" placeholder="Quantity"></input>`;
    document.getElementById("itemCondition").innerHTML=`
        <p>Condition of item</p>
        <input type="radio" id="newCondition" name="itemCondition" value="newCondition"> 
        <label for="newCondition">New</label><br>
        <input type="radio" id="preLoved" name="itemCondition" value="preLoved">  
        <label for="preLoved">Pre-loved</label><br>`;
}