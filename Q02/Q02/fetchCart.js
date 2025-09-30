let totalPrice = 0;
let totalProducts = 0;

$(document).ready(function() {
    loadCartItems();
});

function loadCartItems() {
    totalPrice = 0;
    totalProducts = 0;
    $.ajax({
        url: "./fetchCartItems.php",
        dataType: "json",
        method: "GET",
        success: function(data) {
            $("#cartTable").empty();
            if(data.length > 0) {
                let newRow = $("<tr></tr>");
                data.forEach(function(product) {
                    let cell = `
                        <td>
                            <center><img src="${product.ProductImage}" width="250" height="250"/></center>
                        </td>
                        <td>
                            <center>
                            <strong>${product.ProductName}</strong><br>
                            Category: ${product.CategoryName}<br>
                            Price: ${product.Price}<br>
                            Quantity: ${product.Quantity}<br>
                            <button onClick = "removeFromCart(${product.product_id})">Remove Product</button></center>
                        </td>`;
                        totalProducts++;
                        totalPrice += (product.Price * product.Quantity);
                    newRow.append(cell);
                    $("#cartTable").append(newRow);
                    newRow = $("<tr></tr>");
                });
            } else {
                $("#cartTable").append("<tr><td>No products found</td></tr>");
            }
            calculateCart();
        }       
    });
}

function removeFromCart(product_id) {
    $.ajax({
        url: "removeItemFromCart.php",
        dataType: "json",
        data: {product_id: product_id},
        method: "POST",
        success: function(response) {
            if(response.status == "success") {
                alert(response.message);
                loadCartItems();
            } else {
                alert(response.message);
            }
        }
    });
}

function calculateCart() {
    $("#priceDetail").empty(); // Clear existing content
    $("#priceDetail").append(`<li>Total Products: ${totalProducts}</li>`);
    $("#priceDetail").append(`<li>Total Price: ${totalPrice}</li>`);
}