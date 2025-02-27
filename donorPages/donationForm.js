//console.log("hi");

function updateItemOption() {
    //console.log("no");
    var itemCategory = document.getElementById("donationCategory").value;
    var itemName = document.getElementById("donationItem");
    var itemNameStr =
        `<h4>What item?</h4>
        <select name="donationItem" required>
            <option value="" disabled selected>Select your item</option>`;

    itemName.innerHTML = ``;
    //console.log(itemName);
    if (itemCategory === "clothing") {
        itemNameStr += `
                <option value="female_clothing">Female Clothes</option>
                <option value="male_clothing">Male Clothes</option>
                <option value="unisex_clothing" >Unisex Clothes</option>
            </select>`;
        itemName.innerHTML += itemNameStr;
    } else if (itemCategory === "toys") {
        itemNameStr += `
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
    document.getElementById("itemQuantity").innerHTML = `
        <input type="text" name="itemQuantity" placeholder="Quantity"></input>`;
    document.getElementById("itemCondition").innerHTML = `
        <p>Condition of item</p>
        <input type="radio" id="newCondition" name="itemCondition" value="newCondition"> 
        <label for="newCondition">New</label><br>
        <input type="radio" id="preLoved" name="itemCondition" value="preLoved">  
        <label for="preLoved">Pre-loved</label><br>`;

};

function getConfirmation() {
    //confirmed returns a boolean. True if user clicks ok and False if user clicks cancel
    var confirmed = confirm('Are you sure you want to submit this form?');
    if(confirmed ===false){
         window.location.href='../misc/home.php';
    }
    else {
        //var ajax = new XMLHttpRequest();
        $(document).ready(function () {
            $("form").submit(function (e) {
                e.preventDefault();
                $.post(
                    'process_donation.php', {
                        category: $("#donationCategory").val(),
                        item: $("#donationItem").val(),
                        quantity: $("#itemQuantity").val(),
                        itemcondition: $("#itemCondition").val()
                    },
                    function (result) {
                        if (result == "success") {
                            $("#result").html("success");
                        } else {
                            $("#result").html("failed");
                        }
                    }
                );
            });

        });

    
      
        
    }
} 
