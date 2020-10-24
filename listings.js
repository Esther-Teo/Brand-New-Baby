const listings_dataset = [
    { "Name": "Zack", "Category": "Hygiene", "Item": "Diapers", "Nearest MRT": "Paya Lebar" },
    { "Name": "Thomas", "Category": "Clothing", "Item": "Shirt for 3 month old boy", "Nearest MRT": "Boon Lay" },
    { "Name": "Wong Shi Lin", "Category": "Toys", "Item": "Rattle toy", "Nearest MRT": "Seng Kang" },
    { "Name": "Tammy Ho", "Category": "Hygiene", "Item": "Baby Shampoo", "Nearest MRT": "Bedok" }
]

function display_default() {

    var str = "";

    for (listing of listings_dataset) {
        str += `<div style="border: 1px solid black; margin-bottom: 20px; width: 40%;" > <ul>`;
        for (property in listing) {
            str += `<li style="list-style: none; margin-top: 5px;">${property}: ${listing[property]}</li>`
        }

        str += `</ul>`
        str += `<div style="display: flex; justify-content: flex-end; margin-right: 10px; margin-bottom: 10px;"><input type="submit" value="Find out more &#8594;"></div>`

        str += `</div>`
        
    }

    document.getElementById("listing").innerHTML = str;
}