function plus_clicked() {
    var obj = document.getElementById("quantity");
    var payment = document.getElementById("payment_amount");
    if (parseInt(obj.value) < 10) {
        obj.value = parseInt(obj.value)+1;
        payment.value = "$"+obj.value * 7.99;
    }else {
        alert('You have reached maximum quantity!')
    }
}

function minus_clicked() {
    var obj = document.getElementById("quantity");
    var payment = document.getElementById("payment_amount");
    if (parseInt(obj.value) > 1) {
        obj.value = parseInt(obj.value)-1;
        payment.value = "$"+obj.value * 7.99;
    }else {
        alert('You have reached minimum quantity!')
    }
}