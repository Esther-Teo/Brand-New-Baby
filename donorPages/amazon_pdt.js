// function add_amazon_price(asin){
//     var request = new XMLHttpRequest();
//     request.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             var response_json = JSON.parse(this.responseText);
//             var itemDetailArray = response_json.results;
//             var price = itemDetailArray.offers[0].price.price;
//             console.log(price);
//             return price;
//         }
//     }
//     var url = "https://api.zilerate.com/amazon/product-offers?apiKey=LO4gl6zfUX1rKXGc4PLt05999vmls37U7X288rTT&asin="+asin+"&conditionNew=true&domain=amazon.sg&includeHtml=true";
//     request.open("GET", url, true);
//     request.send();
// }
function add_amazon_product(itemName) {
    str=``;
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response_json = JSON.parse(this.responseText);
            var itemArray = response_json.results;
            for (var item in itemArray) {
                var item_obj = itemArray[item];
                item_asin = item_obj.asin;
                //item_price = add_amazon_price(item_obj.asin);
                str+=`     <h3 >Product Name:${item_obj.title} <br></h3>
                <h3>Link to purchase:<a href=${item_obj.link}>${item_obj.link}</a> </h3>`; 
                //<h3>Price:$${add_amazon_price(item_asin)} <br> </h3>
                break;
            }
            document.getElementById("display_amazon_product").innerHTML=str;
        }
    }
    if((itemName.split()).length > 1){
        var item_term="";
        for (var word of itemName.split()){
            if (word!=itemName[0]){
                item_term += "%20"+word;
            }else{
                item_term +=word;
            }
        }
            var url = "https://api.zilerate.com/amazon/search?apiKey=LO4gl6zfUX1rKXGc4PLt05999vmls37U7X288rTT&domain=amazon.sg&includeHtml=true&searchTerm="+item_term+"&sortBy=price_low_to_high";
    }else{
        var url = "https://api.zilerate.com/amazon/search?apiKey=LO4gl6zfUX1rKXGc4PLt05999vmls37U7X288rTT&domain=amazon.sg&includeHtml=true&searchTerm="+itemName+"&sortBy=price_low_to_high";
    }

    request.open("GET", url, true);
    request.send();
}