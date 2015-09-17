function plus_clicked(price) {
    
    var obj = document.getElementById("quantity");
    var payment = document.getElementById("payment_amount");
    if (parseInt(obj.value) < 10) {
        obj.value = parseInt(obj.value)+1;
        payment.value = "$"+obj.value * parseFloat(price);
    }else {
        alert('You have reached maximum quantity!')
    }
}

function minus_clicked(price) {
    var obj = document.getElementById("quantity");
    var payment = document.getElementById("payment_amount");
    if (parseInt(obj.value) > 1) {
        obj.value = parseInt(obj.value)-1;
        payment.value = "$"+obj.value * parseFloat(price);
    }else {
        alert('You have reached minimum quantity!')
    }
}